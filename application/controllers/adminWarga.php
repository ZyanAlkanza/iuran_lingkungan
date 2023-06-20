<?php  

    class adminWarga extends CI_Controller{
        public function index()
        {   
            $data['warga'] = $this->AdminWarga_m->tampil('warga')->result();
            $this->load->view('adminWarga', $data);
        }
    }

?>