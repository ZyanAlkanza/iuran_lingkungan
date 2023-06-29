<?php 
    class RtDaftarWarga_m extends CI_Model{
        public function tambahdata($data, $table)
        {
            
            $this->db->insert($table, $data);
            
        }
    }

?>