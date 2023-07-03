<?php 
    class rwData extends CI_Controller{
        
        public function __construct()
        {
            parent::__construct();

            if($this->session->userdata('role') != '4'){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Anda belum login!
              </div>');
                redirect('auth/login');
            }
        }

        public function index()
        {
            $bulan  = $this->input->post('bulan');
            $rt     = $this->input->post('rt');

            $this->_rules();

            if ($this->form_validation->run() == FALSE){
                // $data['transaksi'] = $this->AdminData_m->tampil('transaksi')->result();
                $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND tr.pembayaran_bulan='Januari' AND wg.rt='9'")->result();
                $this->load->view('rwData', $data);
            }else{
                $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND tr.pembayaran_bulan='$bulan' AND wg.rt='$rt' ORDER BY wg.blok_rumah ASC")->result();
                $this->load->view('rwData', $data);
            }

            // $data['transaksi'] = $this->RtData_m->tampil('transaksi')->result();
            // $this->load->view('rwData', $data);
        }

        public function _rules()
        {
            $this->form_validation->set_rules('bulan', 'Field Bulan', 'required');
            $this->form_validation->set_rules('rt', 'Field RT', 'required');
        }
    }

?>