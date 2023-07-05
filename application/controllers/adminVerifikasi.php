<?php  

    class adminVerifikasi extends CI_Controller{
        
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
                $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.rt='9' ORDER BY tr.id_transaksi DESC")->result();
                
                if($this->input->post('pencarian')){
                    $pencarian = $this->input->post('pencarian', true);
                    $rt = 9;
                    //tidak dipakai-- $this->db->like('nama_warga', $pencarian);
                    //tidak dipakai-- $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.nama_warga='$pencarian'")->result();
                    $data['transaksi'] = $this->AdminVerifikasi_m->caridata($pencarian, $rt);
                }

                $this->load->view('adminVerifikasi', $data);
            }elseif($this->session->userdata('email') == 'bendahara8@gmail.com'){
                $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.rt='8' ORDER BY tr.id_transaksi DESC")->result();
                
                if($this->input->post('pencarian')){
                    $pencarian = $this->input->post('pencarian', true);
                    $rt = 8;
                    //tidak dipakai-- $this->db->like('nama_warga', $pencarian);
                    //tidak dipakai-- $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.nama_warga='$pencarian'")->result();
                    $data['transaksi'] = $this->AdminVerifikasi_m->caridata($pencarian, $rt);
                }
                
                $this->load->view('adminVerifikasi', $data);
            }



            // $data['transaksi'] = $this->AdminVerifikasi_m->tampil('transaksi')->result();
            
            // if($this->input->post('pencarian')){
                // $pencarian = $this->input->post('pencarian', true);
                //tidak dipakai-- $this->db->like('nama_warga', $pencarian);
                //tidak dipakai-- $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.nama_warga='$pencarian'")->result();
                // $data['transaksi'] = $this->AdminVerifikasi_m->caridata($pencarian);
            // }
            
            // $this->load->view('adminVerifikasi', $data);
        }

        public function tambah()
        {
            if($this->session->userdata('email') == 'bendahara9@gmail.com'){
                $data['transaksi']          = $this->AdminVerifikasi_m->tampil('transaksi')->result();
                $data['detail_transaksi']   = $this->AdminDetail_m->tampil('detail_transaksi')->result();
                $data['warga']              = $this->db->query("SELECT * FROM warga wg WHERE wg.rt='9' AND wg.role='3'")->result();
                $data['iuran']              = $this->AdminIuran_m->tampil('iuran')->result();
                $this->load->view('adminVerifikasi_tambah', $data);
            }elseif($this->session->userdata('email') == 'bendahara8@gmail.com'){
                $data['transaksi']          = $this->AdminVerifikasi_m->tampil('transaksi')->result();
                $data['detail_transaksi']   = $this->AdminDetail_m->tampil('detail_transaksi')->result();
                $data['warga']              = $this->db->query("SELECT * FROM warga wg WHERE wg.rt='8' AND wg.role='3'")->result();
                $data['iuran']              = $this->AdminIuran_m->tampil('iuran')->result();
                $this->load->view('adminVerifikasi_tambah', $data);
            }


            // $data['transaksi']          = $this->AdminVerifikasi_m->tampil('transaksi')->result();
            // $data['detail_transaksi']   = $this->AdminDetail_m->tampil('detail_transaksi')->result();
            // $data['warga']              = $this->AdminWarga_m->tampil('warga')->result();
            // $data['iuran']              = $this->AdminIuran_m->tampil('iuran')->result();
            // $this->load->view('adminVerifikasi_tambah', $data);
        }

        public function tambahdata()
        {
            $this->_rules();

            if ($this->form_validation->run() == FALSE){
                $this->tambah();
            }else{
                $id_iuran           = $this->input->post('id_iuran');
                $id_warga           = $this->input->post('id_warga');
                $atas_nama          = $this->input->post('atas_nama');
                $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
                $pembayaran_bulan   = $this->input->post('pembayaran_bulan');
                
                $bukti_pembayaran   = $_FILES['bukti_pembayaran']['name'];
                if ($bukti_pembayaran = ''){
                    $this->tambahdata();
                } else {
                    $config['upload_path']      = './assets/img/bukti';
                    $config['allowed_types']    = 'jpg|jpeg|png';

                    $this->upload->initialize($config);

                    if(!$this->upload->do_upload('bukti_pembayaran')){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show text-small" role="alert">
                       Gambar gagal diupload! <strong>Format gambar salah.</strong> Upload gambar berformat JPG, JPEG, atau PNG.
                        <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('adminVerifikasi/tambah');
                    } else {
                        $bukti_pembayaran = $this->upload->data('file_name');
                    }
                }
            
                $keterangan         = $this->input->post('keterangan');
                $status             = $this->input->post('status');
            
                $data = array(
                    'id_warga'              => $id_warga,
                    'atas_nama'             => $atas_nama,
                    'tanggal_pembayaran'    => $tanggal_pembayaran,
                    'pembayaran_bulan'      => $pembayaran_bulan
                );
                $this->db->insert('transaksi', $data);

                $data2 = array(
                    'id_iuran'          => $id_iuran,
                    'bukti_pembayaran'  => $bukti_pembayaran,
                    'keterangan'        => $keterangan,
                    'status'            => $status
                );
                $this->AdminDetail_m->tambahdata($data2, 'detail_transaksi');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data <strong>Berhasil</strong> ditambahkan!
                <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              redirect('adminVerifikasi');
            }
        }
        
        public function verifikasi($id)
        {
            $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND tr.id_transaksi='$id'")->result();
            $this->load->view('adminVerifikasi_detail', $data);
        }

        public function update()
        {
            $id     = $this->input->post('id_transaksi');
            $status = $this->input->post('status');

            $data = array(
                'status' => $status,
            );

            $where = array(
                'id_transaksi' => $id,
            );

            $this->db->update('detail_transaksi', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data <strong>Berhasil</strong> diverifikasi!
            <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
          redirect('adminVerifikasi');
        }

        public function edit($id)
        {
            if($this->session->userdata('email') == 'bendahara9@gmail.com'){
                $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND tr.id_transaksi='$id'")->result();
                $data['warga']              = $this->db->query("SELECT * FROM warga wg WHERE wg.rt='9' AND wg.role='3'")->result();
                $data['iuran'] = $this->AdminIuran_m->tampil('iuran')->result();
                $data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                $this->load->view('adminVerifikasi_edit', $data);
            }elseif($this->session->userdata('email') == 'bendahara8@gmail.com'){
                $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND tr.id_transaksi='$id'")->result();
                $data['warga']              = $this->db->query("SELECT * FROM warga wg WHERE wg.rt='8' AND wg.role='3'")->result();
                $data['iuran'] = $this->AdminIuran_m->tampil('iuran')->result();
                $data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                $this->load->view('adminVerifikasi_edit', $data);
            }

            // $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND tr.id_transaksi='$id'")->result();
            // $data['warga'] = $this->AdminWarga_m->tampil('warga')->result();
            // $data['iuran'] = $this->AdminIuran_m->tampil('iuran')->result();
            // $data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            // $this->load->view('adminVerifikasi_edit', $data);
        }

        public function editdata()
        {
            $id_transaksi       = $this->input->post('id_transaksi');
            $bukti_pembayaran   = $_FILES['bukti_pembayaran']['name'];

            $config['upload_path']      = './assets/img/bukti';
            $config['allowed_types']    = 'jpg|jpeg|png';

            $this->upload->initialize($config);

            if($bukti_pembayaran != null){
                if(!$this->upload->do_upload('bukti_pembayaran')){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show text-small" role="alert">
                       Gambar gagal diupload! <strong>Format gambar salah.</strong> Upload gambar berformat JPG, JPEG, atau PNG.
                        <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('adminVerifikasi');
                }else{
                    $id_iuran           = $this->input->post('id_iuran');
                    $id_warga           = $this->input->post('id_warga');
                    $atas_nama          = $this->input->post('atas_nama');
                    $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
                    $pembayaran_bulan   = $this->input->post('pembayaran_bulan');
                    $bukti_pembayaran   = $_FILES['bukti_pembayaran']['name'];
                    $bukti_pembayaran   = $this->upload->data('file_name');
                    $keterangan         = $this->input->post('keterangan'); 
                
                    $data = array(
                        'id_iuran'         => $id_iuran,
                        'bukti_pembayaran' => $bukti_pembayaran,
                        'keterangan'       => $keterangan,
                    );
    
                    $where = array(
                        'id_transaksi' => $id_transaksi
                    );
    
                    $this->AdminDetail_m->updatedata($where, $data, 'detail_transaksi');
    
                    $data2 = array(
                        'id_warga'           => $id_warga,
                        'atas_nama'          => $atas_nama,
                        'tanggal_pembayaran' => $tanggal_pembayaran,
                        'pembayaran_bulan'   => $pembayaran_bulan,
                    );
    
                    $where2 = array(
                        'id_transaksi' => $id_transaksi
                    );
    
                    $this->AdminVerifikasi_m->updatedata($where2, $data2, 'transaksi');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data <strong>Berhasil</strong> diedit!
                        <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('adminVerifikasi');
                }
            }else{
                    $id_iuran           = $this->input->post('id_iuran');
                    $id_warga           = $this->input->post('id_warga');
                    $atas_nama          = $this->input->post('atas_nama');
                    $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
                    $pembayaran_bulan   = $this->input->post('pembayaran_bulan');
                    $bukti_pembayaran   = $this->upload->data('file_name');
                    $keterangan         = $this->input->post('keterangan'); 
                    
                    $data = array(
                        'id_iuran'         => $id_iuran,
                        'keterangan'       => $keterangan,
                    );
        
                    $where = array(
                        'id_transaksi' => $id_transaksi
                    );
        
                    $this->AdminDetail_m->updatedata($where, $data, 'detail_transaksi');
        
                    $data2 = array(
                        'id_warga'           => $id_warga,
                        'atas_nama'          => $atas_nama,
                        'tanggal_pembayaran' => $tanggal_pembayaran,
                        'pembayaran_bulan'   => $pembayaran_bulan,
                    );
        
                    $where2 = array(
                        'id_transaksi' => $id_transaksi
                    );
        
                    $this->AdminVerifikasi_m->updatedata($where2, $data2, 'transaksi');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>Berhasil</strong> diedit!
                    <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                  redirect('adminVerifikasi');
                
            }
        }
        
        public function hapus($id)
        {
            $where = array('id_transaksi' => $id);
            $this->AdminVerifikasi_m->hapusdata($where, 'transaksi');
            $this->AdminDetail_m->hapusdata($where, 'detail_transaksi');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data <strong>Berhasil</strong> dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('adminVerifikasi');
        }

        public function _rules()
        {
            $this->form_validation->set_rules('id_iuran', 'Jenis Iuran', 'required');
            $this->form_validation->set_rules('id_warga', 'Nama Warga', 'required');
            $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required');
            $this->form_validation->set_rules('tanggal_pembayaran', 'Tanggal Pembayaran', 'required');
            $this->form_validation->set_rules('pembayaran_bulan', 'Pembayaran Bulan', 'required');
            $this->form_validation->set_rules('status', 'Status', 'required');
        }
    }

?>