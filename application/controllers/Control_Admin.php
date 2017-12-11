<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_Admin extends CI_Controller {

    public function __construct() {
        
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('model_admin');
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {
        
        $result['result'] = $this->model_admin->getUser();

        $this->load->view('dashboard', $result);
    }

    public function view($page = 'dashboard') {

        if(!file_exists(APPPATH.'views/'.$page.'.php')) {
            show_404();
        }

        if ($page == 'dashboard' || $page == 'user') {

            $result['result'] = $this->model_admin->getUser();
            
            $this->load->view($page, $result);

        } else if ($page == 'books') {

            $data['filter'] = 'all';

            $result['result'] = $this->model_admin->getBook($data);

            $this->load->view($page, $result);

        } else if ($page == 'peminjaman' || $page == 'pengembalian' || $page == 'donasi') {

            $result['result'] = $this->model_admin->getTransaction($page);

            $this->load->view($page, $result);

        }
    }

    public function logout() {
        
        $this->session->sess_destroy();
        redirect('home');
    }

    public function createBook() {

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('isbn', 'ISBN', 'trim|required|integer');
        $this->form_validation->set_rules('category', 'Category', 'trim|required|alpha');
        $this->form_validation->set_rules('language', 'Language', 'trim|required|alpha');
        $this->form_validation->set_rules('penulis', 'Penulis', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('halaman', 'Halaman', 'trim|required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|numeric');

        $config['upload_path'] = realpath(APPPATH .'../assets/img/cover');;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            
            $data = array(
                'createBook' => false,
                'error_message' => ""
            ); 
            $this->load->view('createBook', $data);

        } else {

            if (!$this->upload->do_upload('file')) {

                $data = array(
                    'createBook' => false,
                    'error_message' => $this->upload->display_errors()
                );

                $this->load->view('createBook', $data);

            } else {

                $upload_data = $this->upload->data();
                
                $data = array(
                    'isbn' => $this->input->post('isbn'),
                    'image' => $upload_data['file_name'],
                    'judul' => $this->input->post('title'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'penulis' => $this->input->post('penulis'),
                    'penerbit' => $this->input->post('penerbit'),
                    'tgl_terbit' => $this->input->post('tanggal'),
                    'halaman' => $this->input->post('halaman'),
                    'kategori' => $this->input->post('category'),
                    'bahasa' => $this->input->post('language'),
                    'stock' => $this->input->post('stock')
                );
                
                $result = $this->model_admin->createBook($data);
                
                if ($result == true) {
                    
                    $data['createBook'] = true;
                    $this->load->view('createBook', $data);
                
                } else {
                    $data = array(
                        'createBook' => false,
                        'error_message' => ""
                    );
                    $this->load->view('createBook', $data);
                }
            }
        }
    }

    public function editBook($isbn) {

        $data = array (
            'filter' => 'isbn',
            'isbn' => $isbn
        );

        $result['result'] = $this->model_admin->getBook($data);

        if ($result['result'] == false) {
            show_404();
        } else {
            $this->load->view('editBook', $result);
        }
    }

    public function updateBook() {

        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('isbn', 'ISBN', 'trim|required|integer');
        $this->form_validation->set_rules('category', 'Category', 'trim|required|alpha');
        $this->form_validation->set_rules('language', 'Language', 'trim|required|alpha');
        $this->form_validation->set_rules('penulis', 'Penulis', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'trim|required|alpha_numeric_spaces');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('halaman', 'Halaman', 'trim|required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|numeric');

        if ($this->form_validation->run() == false) {
            
            $filter['filter'] = 'all';
            
            $data = array(
                'editBook' => false,
                'error_message' => "",
                'filter' => 'all',
                'result' => $this->model_admin->getBook($filter),
                'error_message' => ''
            );

            $this->load->view('books', $data);

        } else {

            $data = array(
                'isbn' => $this->input->post('isbn'),
                'judul' => $this->input->post('title'),
                'deskripsi' => $this->input->post('deskripsi'),
                'penulis' => $this->input->post('penulis'),
                'penerbit' => $this->input->post('penerbit'),
                'tgl_terbit' => $this->input->post('tanggal'),
                'halaman' => $this->input->post('halaman'),
                'kategori' => $this->input->post('category'),
                'bahasa' => $this->input->post('language'),
                'stock' => $this->input->post('stock')
            );
            
            $result = $this->model_admin->updateBook($data);
            
            if ($result == true) {

                $filter['filter'] = 'all';

                $data = array(
                    'editBook' => true,
                    'error_message' => "",
                    'result' => $this->model_admin->getBook($filter)
                );

                $this->load->view('books', $data);

            } else {

                $filter['filter'] = 'all';

                $data = array(
                    'editBook' => false,
                    'error_message' => "",
                    'filter' => 'all',
                    'result' => $this->model_admin->getBook($filter)
                );

                $this->load->view('books', $data);

            }
        }
    }

    public function deleteBook($isbn) {

        $result = $this->model_admin->deleteBook($isbn);

        if ($result == true) {

            $filter['filter'] = 'all';

            $data = array(
                'deleteBook' => true,
                'error_message' => "",
                'result' => $this->model_admin->getBook($filter)
            );

            $this->load->view('books', $data);

        } else {

            $filter['filter'] = 'all';

            $data = array(
                'deleteBook' => false,
                'error_message' => "",
                'result' => $this->model_admin->getBook($filter)
            );
            
            $this->load->view('books', $data);

        }
    }

    public function deleteUser($username) {

        $result = $this->model_admin->deleteUser($username);

        if ($result == true) {

            $data = array(
                'deleteUser' => true,
                'error_message' => "",
                'result' => $this->model_admin->getUser()
            );

            $this->load->view('user', $data);

        } else {

            $data = array(
                'deleteUser' => false,
                'error_message' => "",
                'result' => $this->model_admin->getUser()
            );

            $this->load->view('user', $data);

        }
    }
}
?>