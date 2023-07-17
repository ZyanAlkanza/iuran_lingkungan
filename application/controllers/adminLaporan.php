<?php 
    class adminLaporan extends CI_Controller{
        public function index()
        {
            $data['bulan']  = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            $data['warga']  = $this->db->query("SELECT * FROM warga wg WHERE wg.role='3'")->result();
            $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, detail_transaksi dt WHERE dt.id_transaksi=tr.id_transaksi")->result();
            $this->load->view('adminLaporan', $data);
        }
    }

?>