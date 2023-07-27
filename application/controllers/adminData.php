<?php  

    class adminData extends CI_Controller{
        
        public function __construct()
        {
            parent::__construct();

            if($this->session->userdata('role') != '2'){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Anda belum login!
              </div>');
                redirect('auth/login');
            }
        }
        
        public function index()
        {
            if($this->session->userdata('email') == 'bendahara9@gmail.com'){
                $dari   = $this->input->post('dari');
                $sampai = $this->input->post('sampai');

                $this->_rules();

                if ($this->form_validation->run() == FALSE){
                    $status="status='3' AND rt='9'";
                    $data['total'] = $this->db->from("detail_transaksi")->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi')->join('warga', 'warga.id_warga = transaksi.id_warga')->where($status)->get()->num_rows();
                    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.rt='9' ORDER BY tr.id_transaksi DESC")->result();
                    $this->load->view('adminData', $data);
                }else{
                    $status="status='3' AND rt='9' AND date(tanggal_pembayaran) >='$dari' AND date(tanggal_pembayaran) <='$sampai'";
                    $data['total'] = $this->db->from("detail_transaksi")->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi')->join('warga', 'warga.id_warga = transaksi.id_warga')->where($status)->get()->num_rows();
                    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.rt='9' AND date(tanggal_pembayaran) >='$dari' AND date(tanggal_pembayaran) <='$sampai'")->result();
                    $this->load->view('adminData', $data);
                }
            }elseif($this->session->userdata('email') == 'bendahara8@gmail.com'){
                $dari   = $this->input->post('dari');
                $sampai = $this->input->post('sampai');

                $this->_rules();

                if ($this->form_validation->run() == FALSE){
                    $status="status='3' AND rt='8'";
                    $data['total'] = $this->db->from("detail_transaksi")->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi')->join('warga', 'warga.id_warga = transaksi.id_warga')->where($status)->get()->num_rows();
                    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.rt='8' ORDER BY tr.id_transaksi DESC")->result();
                    $this->load->view('adminData', $data);
                }else{
                    $status="status='3' AND rt='9' AND date(tanggal_pembayaran) >='$dari' AND date(tanggal_pembayaran) <='$sampai'";
                    $data['total'] = $this->db->from("detail_transaksi")->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi')->join('warga', 'warga.id_warga = transaksi.id_warga')->where($status)->get()->num_rows();
                    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.rt='8' AND date(tanggal_pembayaran) >='$dari' AND date(tanggal_pembayaran) <='$sampai'")->result();
                    $this->load->view('adminData', $data);
                }
            }


            // $dari   = $this->input->post('dari');
            // $sampai = $this->input->post('sampai');

            // $this->_rules();

            // if ($this->form_validation->run() == FALSE){
            //     $data['transaksi'] = $this->AdminData_m->tampil('transaksi')->result();
            //     $this->load->view('adminData', $data);
            // }else{
            //     $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND date(tanggal_pembayaran) >='$dari' AND date(tanggal_pembayaran) <='$sampai'")->result();
            //     $this->load->view('adminData', $data);
            // }
        }

        public function pdf()
        {
            $dari   = $this->input->get('dari');
            $sampai = $this->input->get('sampai');
            $this->load->library('dompdf_gen');
                
            // $data['transaksi'] = $this->AdminData_m->tampil('transaksi')->result();
            // $this->load->view('adminData_pdf', $data);

            // $this->_rules();

            if($this->session->userdata('email') == 'bendahara9@gmail.com'){
                if (empty($dari) && empty($sampai)){
                    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.rt='9'")->result();
                    $this->load->view('adminData_pdf', $data);
                }else{
                    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.rt='9' AND date(tanggal_pembayaran) >='$dari' AND date(tanggal_pembayaran) <='$sampai'")->result();
                    $this->load->view('adminData_pdf', $data);
                }
            }elseif($this->session->userdata('email') == 'bendahara8@gmail.com'){
                if (empty($dari) && empty($sampai)){
                    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.rt='8'")->result();
                    $this->load->view('adminData_pdf', $data);
                }else{
                    $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.rt='8' AND date(tanggal_pembayaran) >='$dari' AND date(tanggal_pembayaran) <='$sampai'")->result();
                    $this->load->view('adminData_pdf', $data);
                }
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