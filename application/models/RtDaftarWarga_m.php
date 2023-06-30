<?php 
    class RtDaftarWarga_m extends CI_Model{
        public function tambahdata($data, $table)
        {
            
            $this->db->insert($table, $data);
            
        }

        public function updatedata($where, $data, $table){
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        public function hapusdata($where, $table)
        {
            $this->db->where($where);
            $this->db->delete($table);
        }
    }

?>