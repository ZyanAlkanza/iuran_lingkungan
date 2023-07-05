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
            if($this->session->userdata('email') == 'bendahara9@gmail.com'){
                $data['warga'] = $this->db->query("SELECT * FROM warga wg WHERE wg.rt='9' AND wg.role='3' ORDER BY wg.blok_rumah ASC")->result();
                $this->load->view('adminWarga', $data);
            }elseif($this->session->userdata('email') == 'bendahara8@gmail.com'){
                $data['warga'] = $this->db->query("SELECT * FROM warga wg WHERE wg.rt='8' AND wg.role='3' ORDER BY wg.blok_rumah ASC")->result();
                $this->load->view('adminWarga', $data);
            }

            // $data['warga'] = $this->AdminWarga_m->tampil('warga')->result();

            // $data['warga'] = $this->db->query("SELECT * FROM warga WHERE warga.role='3'")->result();
            // $this->load->view('adminWarga', $data);
        }
    }

?>