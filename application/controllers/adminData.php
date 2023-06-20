<?php  

    class adminData extends CI_Controller{
        public function index()
        {
            $dari   = $this->input->post('dari');
            $sampai = $this->input->post('sampai');

            $this->_rules();

            if ($this->form_validation->run() == FALSE){
                $data['transaksi'] = $this->AdminData_m->tampil('transaksi')->result();
                $this->load->view('adminData', $data);
            }else{
                $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND date(tanggal_pembayaran) >='$dari' AND date(tanggal_pembayaran) <='$sampai'")->result();
                $this->load->view('adminData', $data);
            }
        }

        public function pdf()
        {
            $dari   = $this->input->get('dari');
            $sampai = $this->input->get('sampai');
            $this->load->library('dompdf_gen');
                
            // $data['transaksi'] = $this->AdminData_m->tampil('transaksi')->result();
            // $this->load->view('adminData_pdf', $data);

            // $this->_rules();

            if (empty($dari) && empty($sampai)){
                $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran")->result();
                $this->load->view('adminData_pdf', $data);
            }else{
                $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND date(tanggal_pembayaran) >='$dari' AND date(tanggal_pembayaran) <='$sampai'")->result();
                $this->load->view('adminData_pdf', $data);
            }

            $paper_size = 'A4';
            $orientation = 'potrait';
            $html = $this->output->get_output();

            $this->dompdf->set_paper($paper_size, $orientation);
            $this->dompdf->load_html($html);
            $this->dompdf->render();
            $this->dompdf->stream("laporan_iuran.pdf", array('Attachment' => 0));

        }

        public function _rules()
        {
            $this->form_validation->set_rules('dari', 'Dari tanggal', 'required');
            $this->form_validation->set_rules('sampai', 'Sampai  tanggal', 'required');
        }
    }

?>