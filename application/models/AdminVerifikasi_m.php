<?php
    class AdminVerifikasi_m extends CI_Model{
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

        public function caridata($pencarian)
        {
            $this->db->select('*');
            $this->db->from('transaksi tr');
            $this->db->join('warga wg', 'tr.id_warga = wg.id_warga', 'LEFT');
            $this->db->join('detail_transaksi dt', 'tr.id_transaksi = dt.id_transaksi', 'LEFT');
            $this->db->join('iuran iu', 'iu.id_iuran = dt.id_iuran', 'LEFT');
            $this->db->like('nama_warga', $pencarian);
            $this->db->or_like('blok_rumah', $pencarian);
            return $this->db->get()->result();
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