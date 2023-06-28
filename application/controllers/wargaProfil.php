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

        public function edit()
        {
            $warga = $this->session->userdata('email');

            $data['warga'] = $this->db->query("SELECT * FROM warga WHERE warga.email='$warga'")->result();
            
            $this->load->view('wargaProfil_edit', $data);
        }

        public function editdata()
        {
            $this->_rules();

            if($this->form_validation->run() == FALSE){
                $this->edit();
            }else{

            $id_warga   = $this->input->post('id_warga');
            $nama_warga = $this->input->post('nama_warga');
            $email      = $this->input->post('email');
            $blok_rumah = $this->input->post('blok_rumah');
            $telepon    = $this->input->post('telepon');

            $data = array(
                'nama_warga'    => $nama_warga,
                'email'         => $email,
                'blok_rumah'    => $blok_rumah,
                'telepon'       => $telepon,
            );

            $where = array(
                'id_warga'      => $id_warga,
            );

            $this->WargaProfil_m->updatedata($where, $data, 'warga');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <strong>Berhasil</strong> diedit!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('wargaProfil');
            }
        }

        public function gantisandi()
        {
            $warga = $this->session->userdata('email');

            $data['warga'] = $this->db->query("SELECT * FROM warga WHERE warga.email='$warga'")->result();
            $this->load->view('wargaProfil_gantisandi', $data);
        }

        public function gantisandibaru()
        {
            $id_warga         = $this->input->post('id_warga');
            $sandi_baru       = $this->input->post('sandi_baru');
            $konfirmasi_sandi = $this->input->post('konfirmasi_sandi');

            $this->form_validation->set_rules('sandi_baru', 'Kata Sandi Baru', 'required');
            $this->form_validation->set_rules('konfirmasi_sandi', 'Konfirmasi', 'required|matches[sandi_baru]');

            if($this->form_validation->run() == FALSE){
                $this->gantisandi();
            }else{
            $data = array(
                'password'      => $sandi_baru,
            );

            $where = array(
                'id_warga'      => $id_warga,
            );

            $this->WargaProfil_m->updatesandi($where, $data, 'warga');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Kata Sandi <strong>Berhasil</strong> diubah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('wargaProfil');
            }
        }

        public function _rules()
        {
            $this->form_validation->set_rules('nama_warga', 'Nama Warga', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('blok_rumah', 'Blok Rumah', 'required');
            $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');
        }
    }

?>