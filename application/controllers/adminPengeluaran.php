<?php 
    class adminPengeluaran extends CI_Controller{

        public function index()
        {
            $dari   = $this->input->post('dari');
            $sampai = $this->input->post('sampai');

            $this->_rules();

            if ($this->form_validation->run() == FALSE){
                $data['total_pengeluaran'] = $this->AdminPengeluaran_m->totalPengeluaran();
                $data['pengeluaran'] = $this->AdminPengeluaran_m->tampil('pengeluaran')->result();
                $this->load->view('adminPengeluaran', $data);
            }else{
                $data['total_pengeluaran'] = $this->AdminPengeluaran_m->totalPengeluaran_filter($dari, $sampai);
                $data['pengeluaran'] = $this->db->query("SELECT * FROM pengeluaran WHERE date(tanggal_pengeluaran) >='$dari' AND date(tanggal_pengeluaran) <='$sampai'")->result();
                $this->load->view('adminPengeluaran', $data);
            }

        }

        public function tambah()
        {
            $this->load->view('adminPengeluaran_tambah');
        }

        public function tambahdata()
        {
            $nama_pengeluaran       = $this->input->post('nama_pengeluaran');
            $biaya_pengeluaran      = $this->input->post('biaya_pengeluaran');
            $tanggal_pengeluaran    = $this->input->post('tanggal_pengeluaran');

            $bukti_pengeluaran      = $_FILES['bukti_pengeluaran']['name'];
            if ($bukti_pengeluaran = ''){
                $this->tambahdata();
            } else {
                $config['upload_path']      = './assets/img/buktiPengeluaran';
                $config['allowed_types']    = 'jpg|jpeg|png';

                $this->upload->initialize($config);

                if(!$this->upload->do_upload('bukti_pengeluaran')){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show text-small" role="alert">
                   Gambar gagal diupload! <strong>Format gambar salah.</strong> Upload gambar berformat JPG, JPEG, atau PNG.
                    <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('adminPengeluaran/tambah');
                } else {
                    $bukti_pengeluaran = $this->upload->data('file_name');
                }
            }

            $keterangan_pengeluaran = $this->input->post('keterangan_pengeluaran');

            $data = array(
                'nama_pengeluaran'          => $nama_pengeluaran,
                'biaya_pengeluaran'         => $biaya_pengeluaran,
                'tanggal_pengeluaran'       => $tanggal_pengeluaran,
                'bukti_pengeluaran'         => $bukti_pengeluaran,
                'keterangan_pengeluaran'    => $keterangan_pengeluaran,
            );

            $this->AdminPengeluaran_m->tambahpengeluaran($data, 'pengeluaran');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <strong>Berhasil</strong> ditambahkan!
                <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            redirect('adminPengeluaran');

            // var_dump($data);
            // die();
        }

        public function detail($id)
        {
            $data['pengeluaran'] = $this->db->query("SELECT * FROM pengeluaran p WHERE p.id_pengeluaran='$id'")->result();
            $this->load->view('adminPengeluaran_detail', $data);
        }

        public function edit($id)
        {
            $data['pengeluaran'] = $this->db->query("SELECT * FROM pengeluaran p WHERE p.id_pengeluaran='$id'")->result();
            $this->load->view('adminPengeluaran_edit', $data);
        }

        public function editdata()
        {
            $id_pengeluaran       = $this->input->post('id_pengeluaran');
            $bukti_pengeluaran    = $_FILES['bukti_pengeluaran']['name'];

            $config['upload_path']      = './assets/img/buktiPengeluaran';
            $config['allowed_types']    = 'jpg|jpeg|png';

            $this->upload->initialize($config);

            if($bukti_pengeluaran != null){
                if(!$this->upload->do_upload('bukti_pengeluaran')){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show text-small" role="alert">
                       Gambar gagal diupload! <strong>Format gambar salah.</strong> Upload gambar berformat JPG, JPEG, atau PNG.
                        <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('adminPengeluaran');
                }else{
                    $nama_pengeluaran       = $this->input->post('nama_pengeluaran');
                    $biaya_pengeluaran      = $this->input->post('biaya_pengeluaran');
                    $tanggal_pengeluaran    = $this->input->post('tanggal_pengeluaran');
                    $bukti_pengeluaran      = $_FILES['bukti_pengeluaran']['name'];
                    $bukti_pengeluaran      = $this->upload->data('file_name');
                    $keterangan_pengeluaran = $this->input->post('keterangan_pengeluaran');
                
                    $data = array(
                        'nama_pengeluaran'          => $nama_pengeluaran,
                        'biaya_pengeluaran'         => $biaya_pengeluaran,
                        'tanggal_pengeluaran'       => $tanggal_pengeluaran,
                        'bukti_pengeluaran'         => $bukti_pengeluaran,
                        'keterangan_pengeluaran'    => $keterangan_pengeluaran,
                    );
    
                    $where = array(
                        'id_pengeluaran'            => $id_pengeluaran,
                    );
    
                    $this->AdminPengeluaran_m->updatedata($where, $data, 'pengeluaran');
    
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data <strong>Berhasil</strong> diedit!
                        <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('adminPengeluaran');
                }
            }
            else
            {
                    $nama_pengeluaran       = $this->input->post('nama_pengeluaran');
                    $biaya_pengeluaran      = $this->input->post('biaya_pengeluaran');
                    $tanggal_pengeluaran    = $this->input->post('tanggal_pengeluaran');
                    $bukti_pengeluaran      = $this->upload->data('file_name');
                    $keterangan_pengeluaran = $this->input->post('keterangan_pengeluaran');
                    
                    $data = array(
                        'nama_pengeluaran'          => $nama_pengeluaran,
                        'biaya_pengeluaran'         => $biaya_pengeluaran,
                        'tanggal_pengeluaran'       => $tanggal_pengeluaran,
                        'keterangan_pengeluaran'    => $keterangan_pengeluaran,
                    );
        
                    $where = array(
                        'id_pengeluaran'            => $id_pengeluaran,
                    );
        
                    $this->AdminPengeluaran_m->updatedata($where, $data, 'pengeluaran');
        
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>Berhasil</strong> diedit!
                    <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('adminPengeluaran');
                
            }
        }

        public function hapus($id)
        {
            $where = array('id_pengeluaran' => $id);
            $this->AdminPengeluaran_m->hapusdata($where, 'pengeluaran');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <strong>Berhasil</strong> dihapus!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('adminPengeluaran');
        }

        public function pdf()
        {
            $dari   = $this->input->get('dari');
            $sampai = $this->input->get('sampai');
            $this->load->library('dompdf_gen');
                
            // $data['transaksi'] = $this->AdminData_m->tampil('transaksi')->result();
            // $this->load->view('adminData_pdf', $data);

            // $this->_rules();
                if (empty($dari) && empty($sampai)){
                    $data['total_pengeluaran'] = $this->AdminPengeluaran_m->totalPengeluaran();
                    $data['pengeluaran'] = $this->db->query("SELECT * FROM pengeluaran p")->result();
                    $this->load->view('adminPengeluaran_pdf', $data);
                }else{
                    $data['total_pengeluaran'] = $this->AdminPengeluaran_m->totalPengeluaran_filter($dari, $sampai);
                    $data['pengeluaran'] = $this->db->query("SELECT * FROM pengeluaran p WHERE date(tanggal_pengeluaran) >='$dari' AND date(tanggal_pengeluaran) <='$sampai'")->result();
                    $this->load->view('adminPengeluaran_pdf', $data);
                }


            $paper_size = 'A4';
            $orientation = 'potrait';
            $html = $this->output->get_output();

            $this->dompdf->set_paper($paper_size, $orientation);
            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream("laporan_pengeluaran.pdf", array('Attachment' => 0));

        }

        public function _rules()
        {
            $this->form_validation->set_rules('dari', 'Dari tanggal', 'required');
            $this->form_validation->set_rules('sampai', 'Sampai  tanggal', 'required');
        }
    }

?>