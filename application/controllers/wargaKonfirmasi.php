<?php 
    class wargaKonfirmasi extends CI_Controller{

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
            $email = $this->session->userdata('email');
            $data['warga'] = $this->db->query("SELECT * FROM warga wg WHERE wg.email='$email'")->result();



            $data['iuran'] = $this->AdminIuran_m->tampil('iuran')->result();
        
            $this->load->view('wargaKonfirmasi', $data);
        }

        public function tambahdata()
        {
            $this->_rules();

            if($this->form_validation->run() == FALSE){
                $this->load->view('wargaKonfirmasi');
            }else{
                $id_warga           = $this->input->post('id_warga');
                $id_iuran           = $this->input->post('id_iuran');
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
                $status             = '0';

                $data = array(
                    'id_warga'              => $id_warga,
                    'atas_nama'             => $atas_nama,
                    'tanggal_pembayaran'    => $tanggal_pembayaran,
                    'pembayaran_bulan'      => $pembayaran_bulan,
                    
                );
                $this->db->insert('transaksi', $data);

                $data2 = array(
                    'id_iuran'              => $id_iuran,
                    'bukti_pembayaran'      => $bukti_pembayaran,
                    'keterangan'            => $keterangan,
                    'status'                => $status,
                    
                );
                $this->AdminDetail_m->tambahdata($data2, 'detail_transaksi');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Konfirmasi pembayaran anda <strong>Berhasil</strong>
                <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              redirect('wargaKonfirmasi');
            }
        }

        public function _rules()
        {
            $this->form_validation->set_rules('id_iuran', 'Jenis Iuran', 'required');
            $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required');
            $this->form_validation->set_rules('tanggal_pembayaran', 'Tanggal Pembayaran', 'required');
            $this->form_validation->set_rules('pembayaran_bulan', 'Pembayaran Bulan', 'required');
        }
    }

?>