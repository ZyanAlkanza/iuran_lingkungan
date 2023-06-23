<?php 
    class wargaProfil extends CI_Controller{
        public function index()
        {
            $warga = $this->session->userdata('email');

            $data['warga'] = $this->db->query("SELECT * FROM warga WHERE warga.email='$warga'")->result();
            $this->load->view('wargaProfil', $data);
        }
    }

?>