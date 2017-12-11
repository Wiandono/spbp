<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Model_Admin extends CI_Model {

    public function getUser() {

        $query = $this->db->get_where('user', array('privilege' => 'member'));

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getBook($data) {

        if ($data['filter'] == 'all') {

            $query = $this->db->get('book');

            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        } else {
            $query = $this->db->get_where('book', array('isbn' => $data['isbn']), 1);

            if ($query->num_rows() == 1) {
                return $query->result();
            } else {
                return false;
            }
        }
    }

    public function createBook($data) {

        $query = $this->db->get_where('book', array('isbn' => $data['isbn']), 1);
        
        if ($query->num_rows() == 1) {

            $this->db->select('stock');
            $query = $this->db->get('book');

            $row = $query->row();
            $stock = $row->stock;

            $update['stock'] = $stock + 1;
            $this->db->where('isbn', $data['isbn']);
            $this->db->update('book', $update);

            return true;

        } else {

            $this->db->insert('book', $data);
            
            return true;

        }
    }
    
    public function updateBook($data) {

        $this->db->where('isbn', $data['isbn']);
        $this->db->update('book', $data);

        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteBook($isbn) {

        $this->db->where('isbn', $isbn);
        $this->db->delete('book');

        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($username) {

        $this->db->where('username', $username);
        $this->db->delete('transaction');

        $this->db->where('username', $username);
        $this->db->delete('user');

        if ($this->db->affected_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getTransaction($page) {

        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->join('book', 'book.isbn = transaction.isbn');
        $this->db->where(array('type' => $page, 'verified' => 0));
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}

?>