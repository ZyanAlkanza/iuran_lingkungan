<?php 
    class wargaKonfirmasi extends CI_Controller{

        public function __construct()
        {
            parent::__construct();

            if($this->session->userdata('role') != '3'){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Anda belum login!
              </div>');
                redirect('auth/login');
            }
        }

        public function index()
        {
            $this->load->view('wargaKonfirmasi');
        }
    }

?>