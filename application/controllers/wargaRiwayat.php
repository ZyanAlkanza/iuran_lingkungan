<?php 
    class wargaRiwayat extends CI_Controller{

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

            $data['warga'] = $this->db->query("SELECT * FROM warga wg, transaksi tr, detail_transaksi dt, iuran iu WHERE wg.id_warga=tr.id_warga AND dt.id_transaksi=tr.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.email='$warga' ORDER BY tr.id_transaksi DESC")->result();
            $this->load->view('wargaRiwayat', $data);
        }
    }

?>