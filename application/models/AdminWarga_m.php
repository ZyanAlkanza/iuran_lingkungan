<?php 
    class AdminWarga_m extends CI_Model{
        public function tampil()
        {
            return $this->db->get('warga');
        }
    }

?>