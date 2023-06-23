<?php 
    class wargaProfil extends CI_Controller{

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
            $warga = $this->session->userdata('email');

            $data['warga'] = $this->db->query("SELECT * FROM warga WHERE warga.email='$warga'")->result();
            $this->load->view('wargaProfil', $data);
        }
    }

?>