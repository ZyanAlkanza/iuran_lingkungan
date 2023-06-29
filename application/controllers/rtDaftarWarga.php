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
    }

?>