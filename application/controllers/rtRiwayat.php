<?php 
    class rtRiwayat extends CI_Controller{
        public function index()
        {
            $email = $this->session->userdata('email');
            $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.email='$email'")->result();
            $this->load->view('rtRiwayat', $data);
        }
    }

?>