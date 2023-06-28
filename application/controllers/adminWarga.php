<?php  

    class adminWarga extends CI_Controller{
        public function __construct()
        {
            parent::__construct();

            if($this->session->userdata('role') != '2'){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Anda belum login!
              </div>');
                redirect('auth/login');
            }
        }
        
        public function index()
        {   
            $data['warga'] = $this->db->query("SELECT * FROM warga WHERE warga.role='3'")->result();
            // $data['warga'] = $this->AdminWarga_m->tampil('warga')->result();
            $this->load->view('adminWarga', $data);
        }
    }

?>