<?php
    class rtDaftarPetugas extends CI_Controller{
        public function index()
        {
            if($this->session->userdata('email') == 'rt9@gmail.com'){
                $data['warga'] = $this->db->query("SELECT * FROM warga wg WHERE wg.role='2' AND wg.rt='9'")->result();
                $this->load->view('rtDaftarPetugas', $data);
            }elseif($this->session->userdata('email') == 'rt8@gmail.com'){
                $data['warga'] = $this->db->query("SELECT * FROM warga wg WHERE wg.role='2' AND wg.rt='8'")->result();
                $this->load->view('rtDaftarPetugas', $data);
            }
            
        }

        public function tambah()
        {
            $this->load->view('rtDaftarPetugas_tambah');
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
                $role       = '2';

                $data = array(
                    'nama_warga'    => $nama_warga,
                    'email'         => $email,
                    'blok_rumah'    => $blok_rumah,
                    'rt'            => $rt,
                    'rw'            => $rw,
                    'telepon'       => $telepon,
                    'password'      => password_hash($password, PASSWORD_DEFAULT),
                    'role'          => $role,
                );

                $this->RtDaftarWarga_m->tambahdata($data, 'warga');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>Berhasil</strong> ditambahkan!
                    <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('rtDaftarPetugas');
            }
        }

        public function detail($id)
        {
            $data['warga'] = $this->db->query("SELECT * FROM warga wg WHERE wg.id_warga='$id'")->result();
            $this->load->view('rtDaftarPetugas_detail', $data);
        }

        public function reset()
        {
            $id_warga       = $this->input->post('id_warga');
            $password       = '123';

            $data = array(
                'password'  => password_hash($password, PASSWORD_DEFAULT),
            );

            $where = array(
                'id_warga'  => $id_warga,
            );
            
            $this->RtDaftarWarga_m->updatedata($where, $data, 'warga');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Kata Sandi <strong>Berhasil</strong> direset!
                <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('rtDaftarPetugas');
        }

        public function edit($id)
        {
            $data['rt'] = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10'];
            $data['warga'] = $this->db->query("SELECT * FROM warga wg WHERE wg.id_warga='$id'")->result();
            $this->load->view('rtDaftarPetugas_edit', $data);
        }

        public function editdata()
        {
            $id_warga       = $this->input->post('id_warga');
            $nama_warga     = $this->input->post('nama_warga');
            $blok_rumah     = $this->input->post('blok_rumah');
            $rt             = $this->input->post('rt');
            $telepon        = $this->input->post('telepon');

            $data = array(
                'nama_warga'    => $nama_warga,
                'blok_rumah'    => $blok_rumah,
                'rt'            => $rt,
                'telepon'       => $telepon,
            );

            $where = array(
                'id_warga'      => $id_warga,
            );

            $this->RtDaftarWarga_m->updatedata($where, $data, 'warga');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <strong>Berhasil</strong> diedit!
                <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('rtDaftarPetugas');
            
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
            redirect('rtDaftarPetugas');
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