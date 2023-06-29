<?php 
    class rtDaftarWarga extends CI_Controller{
        public function index()
        {
            $data['warga'] = $this->db->query("SELECT * FROM warga WHERE warga.role='3'")->result();
            $this->load->view('rtDaftarWarga', $data);
        }

        public function tambah()
        {
            $this->load->view('rtDaftarWarga_tambah');
        }

        public function tambahdata()
        {
            $this->_rules();

            if($this->form_validation->run() == FALSE){
                $this->tambah();
            }else{
                $nama_warga = $this->input->post('nama_warga');
                $email      = $this->input->post('email');
                $blok_rumah = $this->input->post('blok_rumah');
                $rt         = $this->input->post('rt');
                $rw         = '18';
                $telepon    = $this->input->post('telepon');
                $password   = '123';
                $role       = '3';

                $data = array(
                    'nama_warga'    => $nama_warga,
                    'email'         => $email,
                    'blok_rumah'    => $blok_rumah,
                    'rt'            => $rt,
                    'rw'            => $rw,
                    'telepon'       => $telepon,
                    'password'      => $password,
                    'role'          => $role,
                );

                $this->RtDaftarWarga_m->tambahdata($data, 'warga');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>Berhasil</strong> ditambahkan!
                    <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('rtDaftarWarga');
            }
        }

        public  function hapus($id)
        {
            $where = array('id_warga' => $id);
            $this->RtDaftarWarga_m->hapusdata($where, 'warga');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <strong>Berhasil</strong> dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('rtDaftarWarga');
        }

        public function _rules()
        {
            $this->form_validation->set_rules('nama_warga', 'Nama Warga', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('blok_rumah', 'Blok Rumah', 'required');
            $this->form_validation->set_rules('rt', 'RT', 'required');
            $this->form_validation->set_rules('telepon', 'Telepon', 'required|numeric');
        }
    }

?>