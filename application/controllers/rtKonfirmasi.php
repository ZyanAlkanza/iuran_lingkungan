<?php 
    class rtKonfirmasi extends CI_Controller{
        public function index()
        {
            $email = $this->session->userdata('email');
            $data['warga'] = $this->db->query("SELECT * FROM warga wg WHERE wg.email='$email'")->result();

            $data['iuran'] = $this->AdminIuran_m->tampil('iuran')->result();

            $this->load->view('rtKonfirmasi', $data);
        }
    }

?>