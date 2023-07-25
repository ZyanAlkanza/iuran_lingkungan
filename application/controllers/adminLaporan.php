<?php 
    class adminLaporan extends CI_Controller{

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
                $data['bulan']  = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                $data['warga']  = $this->db->query("SELECT * FROM warga wg WHERE wg.role='3' AND wg.rt='9'")->result();
                $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, detail_transaksi dt WHERE dt.id_transaksi=tr.id_transaksi")->result();
                $this->load->view('adminLaporan', $data);
            }elseif($this->session->userdata('email') == 'bendahara8@gmail.com'){
                $data['bulan']  = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                $data['warga']  = $this->db->query("SELECT * FROM warga wg WHERE wg.role='3' AND wg.rt='8'")->result();
                $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, detail_transaksi dt WHERE dt.id_transaksi=tr.id_transaksi")->result();
                $this->load->view('adminLaporan', $data);
            }
        }
    }

?>