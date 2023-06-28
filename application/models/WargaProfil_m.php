<?php 
    class WargaProfil_m extends CI_Model{
        public function updatedata($where, $data, $table){
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        public function updateemail($where, $data, $table){
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        public function updatesandi($where, $data, $table){
            $this->db->where($where);
            $this->db->update($table, $data);
        }
    }

?>