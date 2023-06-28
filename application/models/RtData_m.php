<?php 
    class RtData_m extends CI_Model{
        public function tampil()
        {
            $this->db->select('*');
            $this->db->from('transaksi tr');
            $this->db->join('warga wg', 'wg.id_warga = tr.id_warga', 'LEFT');
            $this->db->join('detail_transaksi dt', 'dt.id_transaksi = tr.id_transaksi', 'LEFT');
            $this->db->join('iuran iu', 'dt.id_iuran = iu.id_iuran');
            $this->db->order_by('tr.id_transaksi', 'DESC');
            $query = $this->db->get();
            return $query;
        }
    }

?>