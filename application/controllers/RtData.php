<?php 
    class rtData extends CI_Controller{
        
        public function __construct()
        {
            parent::__construct();

            if($this->session->userdata('role') != '1'){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Anda belum login!
              </div>');
                redirect('auth/login');
            }
        }
        public function index()
        {
            $data['transaksi'] = $this->RtData_m->tampil('transaksi')->result();
            $this->load->view('rtData', $data);
        }
    }

?>