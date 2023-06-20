<?php 
    class AdminDetail_m extends CI_Model{
        public function tampil(){
            return $this->db->get('detail_transaksi');
        }

        public function tambahdata($data2, $table)
        {
            $this->db->insert($table, $data2);
        }

        public function hapusdata($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }

        public function updatedata($where, $data, $table){
            $this->db->where($where);
            $this->db->update($table, $data);
        }

    }

?>