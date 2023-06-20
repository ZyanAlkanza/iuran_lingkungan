<?php  

    class adminIuran extends CI_Controller{
        public function index()
        {
            $data['iuran'] = $this->AdminIuran_m->tampil('iuran')->result();
            $this->load->view('adminIuran', $data);
        }

        public function tambah()
        {
            $data['iuran'] = $this->AdminIuran_m->tampil('iuran')->result();
            $this->load->view('adminIuran_tambah', $data);
        }

        public function tambahdata()
        {
            $this->_rules();

            if($this->form_validation->run() == FALSE){
                $this->tambah();
                
            }else{
                $jenis_iuran    = $this->input->post('jenis_iuran');
                $biaya          = $this->input->post('biaya');

                $data = array(
                    'jenis_iuran'   => $jenis_iuran,
                    'biaya'         => $biaya,
                );

                $this->AdminIuran_m->tambahiuran($data, 'iuran');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <strong>Berhasil</strong> ditambahkan!
                <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('adminIuran');
            }
        }

        public function edit($id)
        {
            $where = array('id_iuran' => $id);
            $data['iuran'] = $this->AdminIuran_m->editdata($where, 'iuran')->result();
            $this->load->view('adminIuran_edit', $data);
        }

        public function update()
        {
            $this->_rules();

            if($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> mengubah data!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('adminIuran');
            }else{
                $id             = $this->input->post('id_iuran');
                $jenis_iuran    = $this->input->post('jenis_iuran');
                $biaya          = $this->input->post('biaya');

                $data = array(
                    'jenis_iuran'   => $jenis_iuran,
                    'biaya'         => $biaya,
                );

                $where = array(
                    'id_iuran'      => $id
                );

            $this->AdminIuran_m->updatedata($where, $data, 'iuran');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data <strong>Berhasil</strong> diedit!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('adminIuran');
            }
        }

        public function hapus($id)
        {
            $where = array('id_iuran' => $id);
            $this->AdminIuran_m->hapusdata($where, 'iuran');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data <strong>Berhasil</strong> dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('adminIuran');
        }

        public function _rules()
        {
            $this->form_validation->set_rules('jenis_iuran', 'Jenis Iuran', 'required');
            $this->form_validation->set_rules('biaya', 'Biaya', 'required|numeric');
        }
    }

?>