<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Model_User extends CI_Model {

    public function validateUser($data) {
        
        $query = $this->db->get_where('user', array('username' => $data['username']), 1);

        $row = $query->row();
        $hashPassword = $row->password;

        if (password_verify($data['password'], $hashPassword)) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserInformation($username) {
        
        $query = $this->db->get_where('user', array('username' => $username), 1);
        
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function createUser($data) {

        $query = $this->db->get_where('user', array('username' => $data['username']), 1);

        if ($query->num_rows() == 0) {

            $this->db->insert('user', $data);

            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function getBook($data) {

        if ($data['filter'] == "all") {

            $query = $this->db->get('book');

            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        } else {

            $this->db->like('judul', $data['filter']);
            $this->db->or_like('deskripsi', $data['filter']);
            $this->db->or_like('penulis', $data['filter']);
            $this->db->or_like('tgl_terbit', $data['filter']);
            $this->db->or_like('halaman', $data['filter']);
            $this->db->or_like('kategori', $data['filter']);
            $this->db->or_like('bahasa', $data['filter']);

            $query = $this->db->get('book');

            if ($query->num_rows() > 0) {
                return $query->result();
            } else {
                return false;
            }
        }
    }

    public function getDetails($data) {

        $query = $this->db->get_where('book', array('isbn' => $data['isbn']), 1);

        if ($query->num_rows() == 1) {
            
            $this->db->where(array('username' => $data['username'], 'isbn' => $data['isbn']));
            $this->db->order_by('id', 'DESC');
            $this->db->limit(1);
            $transaction = $this->db->get('transaction');

            $row = $transaction->row();

            if ($transaction->num_rows() == 1) {
                
                return array(
                    'result' => $query->result(),
                    'transaction' => true,
                    'type' => $row->type,
                    'verified' => $row->verified
                );
            } else {
                
                return array(
                    'result' => $query->result(),
                    'transaction' => false,
                );
            }
        } else {
            return false;
        }
    }

    public function updateProfile($data) {

        $query = $this->db->get_where('user', array('username' => $data['username']), 1);

        $row = $query->row();
        $hashPassword = $row->password;

        if (password_verify($data['oldPassword'], $hashPassword)) {

            $update = array(
                'nickname' => $data['nickname'],
                'password' => password_hash($data['newPassword'], PASSWORD_DEFAULT)
            );

            $this->db->where('username', $data['username']);
            $this->db->update('user', $update);

            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function createTransaction($data) {

        $query = $this->db->get_where('transaction', array('username' => $data['username'], 'isbn' => $data['isbn'], 'type' => $data['type']), 1);

        if ($query->num_rows() == 1) {
            return false;
        } else {

            $this->db->insert('transaction', $data);

            if ($this->db->affected_rows() > 0) {

                $this->db->select('stock');
                $query = $this->db->get('book');

                $row = $query->row();
                $stock = $row->stock;
                $update;

                if ($data['type'] == "Peminjaman") {
                    $update['stock'] = $stock - 1;
                } else {
                    $update['stock'] = $stock + 1;
                }

                $this->db->where('isbn', $data['isbn']);
                $this->db->update('book', $update);

                return true;
            } else {
                return false;
            }
        }
    }
}

?>