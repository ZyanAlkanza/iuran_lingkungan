<?php 
    class AdminData_m extends CI_Model{
        public function tampil()
        {
            $this->db->select('*');
            $this->db->from('transaksi tr');
            $this->db->join('warga wg', 'tr.id_warga = wg.id_warga', 'LEFT');
            $this->db->join('detail_transaksi dt', 'tr.id_transaksi = dt.id_transaksi', 'LEFT');
            $this->db->join('iuran iu', 'iu.id_iuran = dt.id_iuran', 'LEFT');
            $this->db->order_by("tr.id_transaksi", 'DESC');
            $query = $this->db->get();
            return $query;
        }
    }

?>