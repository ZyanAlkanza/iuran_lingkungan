<?php 
    class rtData extends CI_Controller{
        
        public function __construct()
        {
            parent::__construct();

            if($this->session->userdata('role') != '1'){
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Anda belum login!
              </div>');
                redirect('auth/login');
            }
        }
        public function index()
        {
            if($this->session->userdata('email') == 'rt9@gmail.com'){
                $status="status='3' AND rt='9'";
                $data['total'] = $this->db->from("detail_transaksi")->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi')->join('warga', 'warga.id_warga = transaksi.id_warga')->where($status)->get()->num_rows();
                $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.rt='9' ORDER BY tr.id_transaksi DESC")->result();
                $this->load->view('rtData', $data);
            }elseif($this->session->userdata('email') == 'rt8@gmail.com'){
                $status="status='3' AND rt='8'";
                $data['total'] = $this->db->from("detail_transaksi")->join('transaksi', 'transaksi.id_transaksi = detail_transaksi.id_transaksi')->join('warga', 'warga.id_warga = transaksi.id_warga')->where($status)->get()->num_rows();
                $data['transaksi'] = $this->db->query("SELECT * FROM transaksi tr, warga wg, detail_transaksi dt, iuran iu WHERE tr.id_warga=wg.id_warga AND tr.id_transaksi=dt.id_transaksi AND dt.id_iuran=iu.id_iuran AND wg.rt='8' ORDER BY tr.id_transaksi DESC")->result();
                $this->load->view('rtData', $data);
            }
            
           
        }
    }

?>