<?php 
    class AdminIuran_m extends CI_Model{
        public function tampil(){
            return $this->db->get('iuran');
        }

        public function tambahiuran($data, $table){
            $this->db->insert($table, $data);
        }

        public function editdata($where, $table){
            return $this->db->get_where($table, $where);
        }

        public function updatedata($where, $data, $table){
            $this->db->where($where);
            $this->db->update($table, $data);
        }

        public function hapusdata($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }
    }

?>