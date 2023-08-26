<?php 
    class adminPengeluaran_m extends CI_Model{
        public function tampil()
        {
            return $this->db->get('pengeluaran');
        }

        public function tambahpengeluaran($data, $table)
        {
            $this->db->insert($table, $data);
        }

        public function totalPengeluaran()
        {
            $query = $this->db->select_sum('biaya_pengeluaran')->get('pengeluaran');
            return $query->row()->biaya_pengeluaran;
        }

        public function totalPengeluaran_filter($dari, $sampai)
        {
            $this->db->select_sum('biaya_pengeluaran');
            $this->db->where('tanggal_pengeluaran >=', $dari);
            $this->db->where('tanggal_pengeluaran <=', $sampai);
            $query = $this->db->get('pengeluaran');
            return $query->row()->biaya_pengeluaran;
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