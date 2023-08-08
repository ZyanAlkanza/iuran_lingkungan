<?php  
    class wargaForm extends CI_Controller{
        public function index()
        {
            $email = $this->session->userdata('email');
            $data['warga'] = $this->db->query("SELECT * FROM warga wg WHERE wg.email='$email'")->result();

            $data['iuran'] = $this->AdminIuran_m->tampil('iuran')->result();
            $this->load->view('wargaForm', $data);
        }

        public function tambahdata()
        {
            
                $id_warga           = $this->input->post('id_warga');
                $id_iuran           = $this->input->post('id_iuran');
                $atas_nama          = $this->input->post('atas_nama');
                $tanggal_pembayaran = $this->input->post('tanggal_pembayaran');
                // $pembayaran_bulan   = implode(',', $this->input->post( 'pembayaran_bulan' , TRUE ) );
                $bulan1             = $this->input->post('bulan1');
                $bulan2             = $this->input->post('bulan2');
                $bulan3             = $this->input->post('bulan3');
                $bulan4             = $this->input->post('bulan4');
                $bulan5             = $this->input->post('bulan5');
                $bulan6             = $this->input->post('bulan6');
                $bulan7             = $this->input->post('bulan7');
                $bulan8             = $this->input->post('bulan8');
                $bulan9             = $this->input->post('bulan9');
                $bulan10             = $this->input->post('bulan10');
                $bulan11             = $this->input->post('bulan11');
                $bulan12             = $this->input->post('bulan12');

                $bukti_pembayaran   = $_FILES['bukti_pembayaran']['name'];
                if ($bukti_pembayaran = ''){
                    $this->tambahdata();
                } else {
                    $config['upload_path']      = './assets/img/bukti';
                    $config['allowed_types']    = 'jpg|jpeg|png';

                    $this->upload->initialize($config);

                    if(!$this->upload->do_upload('bukti_pembayaran')){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show text-small" role="alert">
                       Gambar gagal diupload! <strong>Format gambar salah.</strong> Upload gambar berformat JPG, JPEG, atau PNG.
                        <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('wargaForm');
                    } else {
                        $bukti_pembayaran = $this->upload->data('file_name');
                    }
                }

                $keterangan         = $this->input->post('keterangan');
                $status             = '0';

            //METODE CHECKBOX
            if($bulan1){
                $data = array(
                    'id_warga'          => $id_warga,
                    'atas_nama'         => $atas_nama,
                    'tanggal_pembayaran'=> $tanggal_pembayaran,
                    'pembayaran_bulan'  => $bulan1,                    
                );
                $this->db->insert('transaksi', $data);

                $data2 = array(
                    'id_iuran'          => $id_iuran,
                    'bukti_pembayaran'  => $bukti_pembayaran,
                    'keterangan'        => $keterangan,
                    'status'            => $status,
                );
                $this->AdminDetail_m->tambahdata($data2, 'detail_transaksi');
            }

            if($bulan2){
                $data3 = array(
                    'id_warga'          => $id_warga,
                    'atas_nama'         => $atas_nama,
                    'tanggal_pembayaran'=> $tanggal_pembayaran,
                    'pembayaran_bulan'  => $bulan2,                    
                );
                $this->db->insert('transaksi', $data3);

                $data4 = array(
                    'id_iuran'          => $id_iuran,
                    'bukti_pembayaran'  => $bukti_pembayaran,
                    'keterangan'        => $keterangan,
                    'status'            => $status,
                );
                $this->AdminDetail_m->tambahdata($data4, 'detail_transaksi');
            }

            if($bulan3){
                $data5 = array(
                    'id_warga'          => $id_warga,
                    'atas_nama'         => $atas_nama,
                    'tanggal_pembayaran'=> $tanggal_pembayaran,
                    'pembayaran_bulan'  => $bulan3,                    
                );
                $this->db->insert('transaksi', $data5);

                $data6 = array(
                    'id_iuran'          => $id_iuran,
                    'bukti_pembayaran'  => $bukti_pembayaran,
                    'keterangan'        => $keterangan,
                    'status'            => $status,
                );
                $this->AdminDetail_m->tambahdata($data6, 'detail_transaksi');
            }

            if($bulan4){
                $data7 = array(
                    'id_warga'          => $id_warga,
                    'atas_nama'         => $atas_nama,
                    'tanggal_pembayaran'=> $tanggal_pembayaran,
                    'pembayaran_bulan'  => $bulan4,                    
                );
                $this->db->insert('transaksi', $data7);

                $data8 = array(
                    'id_iuran'          => $id_iuran,
                    'bukti_pembayaran'  => $bukti_pembayaran,
                    'keterangan'        => $keterangan,
                    'status'            => $status,
                );
                $this->AdminDetail_m->tambahdata($data8, 'detail_transaksi');
            }

            if($bulan5){
                $data9 = array(
                    'id_warga'          => $id_warga,
                    'atas_nama'         => $atas_nama,
                    'tanggal_pembayaran'=> $tanggal_pembayaran,
                    'pembayaran_bulan'  => $bulan5,                    
                );
                $this->db->insert('transaksi', $data9);

                $data10 = array(
                    'id_iuran'          => $id_iuran,
                    'bukti_pembayaran'  => $bukti_pembayaran,
                    'keterangan'        => $keterangan,
                    'status'            => $status,
                );
                $this->AdminDetail_m->tambahdata($data10, 'detail_transaksi');
            }

            if($bulan6){
                $data11 = array(
                    'id_warga'          => $id_warga,
                    'atas_nama'         => $atas_nama,
                    'tanggal_pembayaran'=> $tanggal_pembayaran,
                    'pembayaran_bulan'  => $bulan6,                    
                );
                $this->db->insert('transaksi', $data11);

                $data12 = array(
                    'id_iuran'          => $id_iuran,
                    'bukti_pembayaran'  => $bukti_pembayaran,
                    'keterangan'        => $keterangan,
                    'status'            => $status,
                );
                $this->AdminDetail_m->tambahdata($data12, 'detail_transaksi');
            }

            if($bulan7){
                $data13 = array(
                    'id_warga'          => $id_warga,
                    'atas_nama'         => $atas_nama,
                    'tanggal_pembayaran'=> $tanggal_pembayaran,
                    'pembayaran_bulan'  => $bulan7,                    
                );
                $this->db->insert('transaksi', $data13);

                $data14 = array(
                    'id_iuran'          => $id_iuran,
                    'bukti_pembayaran'  => $bukti_pembayaran,
                    'keterangan'        => $keterangan,
                    'status'            => $status,
                );
                $this->AdminDetail_m->tambahdata($data14, 'detail_transaksi');
            }

            if($bulan8){
                $data15 = array(
                    'id_warga'          => $id_warga,
                    'atas_nama'         => $atas_nama,
                    'tanggal_pembayaran'=> $tanggal_pembayaran,
                    'pembayaran_bulan'  => $bulan8,                    
                );
                $this->db->insert('transaksi', $data15);

                $data16 = array(
                    'id_iuran'          => $id_iuran,
                    'bukti_pembayaran'  => $bukti_pembayaran,
                    'keterangan'        => $keterangan,
                    'status'            => $status,
                );
                $this->AdminDetail_m->tambahdata($data16, 'detail_transaksi');
            }

            if($bulan9){
                $data17 = array(
                    'id_warga'          => $id_warga,
                    'atas_nama'         => $atas_nama,
                    'tanggal_pembayaran'=> $tanggal_pembayaran,
                    'pembayaran_bulan'  => $bulan9,                    
                );
                $this->db->insert('transaksi', $data17);

                $data18 = array(
                    'id_iuran'          => $id_iuran,
                    'bukti_pembayaran'  => $bukti_pembayaran,
                    'keterangan'        => $keterangan,
                    'status'            => $status,
                );
                $this->AdminDetail_m->tambahdata($data18, 'detail_transaksi');
            }

            if($bulan10){
                $data19 = array(
                    'id_warga'          => $id_warga,
                    'atas_nama'         => $atas_nama,
                    'tanggal_pembayaran'=> $tanggal_pembayaran,
                    'pembayaran_bulan'  => $bulan10,                    
                );
                $this->db->insert('transaksi', $data19);

                $data20 = array(
                    'id_iuran'          => $id_iuran,
                    'bukti_pembayaran'  => $bukti_pembayaran,
                    'keterangan'        => $keterangan,
                    'status'            => $status,
                );
                $this->AdminDetail_m->tambahdata($data20, 'detail_transaksi');
            }

            if($bulan11){
                $data21 = array(
                    'id_warga'          => $id_warga,
                    'atas_nama'         => $atas_nama,
                    'tanggal_pembayaran'=> $tanggal_pembayaran,
                    'pembayaran_bulan'  => $bulan11,                    
                );
                $this->db->insert('transaksi', $data21);

                $data22 = array(
                    'id_iuran'          => $id_iuran,
                    'bukti_pembayaran'  => $bukti_pembayaran,
                    'keterangan'        => $keterangan,
                    'status'            => $status,
                );
                $this->AdminDetail_m->tambahdata($data22, 'detail_transaksi');
            }

            if($bulan12){
                $data23 = array(
                    'id_warga'          => $id_warga,
                    'atas_nama'         => $atas_nama,
                    'tanggal_pembayaran'=> $tanggal_pembayaran,
                    'pembayaran_bulan'  => $bulan12,                    
                );
                $this->db->insert('transaksi', $data23);

                $data24 = array(
                    'id_iuran'          => $id_iuran,
                    'bukti_pembayaran'  => $bukti_pembayaran,
                    'keterangan'        => $keterangan,
                    'status'            => $status,
                );
                $this->AdminDetail_m->tambahdata($data24, 'detail_transaksi');
            }

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Konfirmasi pembayaran anda <strong>Berhasil</strong>
                <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('wargaForm');

                


            // METODE REGULER

            //     $data = array(
            //         'id_warga'          => $id_warga,
            //         'atas_nama'         => $atas_nama,
            //         'tanggal_pembayaran'=> $tanggal_pembayaran,
            //         'pembayaran_bulan'  => $pembayaran_bulan,
            //     );
            //     $this->db->insert('transaksi', $data);
                    
            //     $data2 = array(
            //         'id_iuran'          => $id_iuran,
            //         'bukti_pembayaran'  => $bukti_pembayaran,
            //         'keterangan'        => $keterangan,
            //         'status'            => $status,
            //     );
            //     $this->AdminDetail_m->tambahdata($data2, 'detail_transaksi');

            //     $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            //     Konfirmasi pembayaran anda <strong>Berhasil</strong>
            //     <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
            //       <span aria-hidden="true">&times;</span>
            //     </button>
            //   </div>');
            //   redirect('wargaForm');


                // METODE SELECT OPTION

                // $data = array(
                //     'id_warga'          => $id_warga,
                //     'atas_nama'         => $atas_nama,
                //     'tanggal_pembayaran'=> $tanggal_pembayaran,
                //     'pembayaran_bulan'  => $pembayaran_bulan,
                    
                // );
                // $this->db->insert('transaksi', $data);

                // $data2 = array(
                //     'id_iuran'          => $id_iuran,
                //     'bukti_pembayaran'  => $bukti_pembayaran,
                //     'keterangan'        => $keterangan,
                //     'status'            => $status,
                // );
                // $this->AdminDetail_m->tambahdata($data2, 'detail_transaksi');

                // if($bulan2){
                //     $data3 = array(
                //         'id_warga'          => $id_warga,
                //         'atas_nama'         => $atas_nama,
                //         'tanggal_pembayaran'=> $tanggal_pembayaran,
                //         'pembayaran_bulan'  => $bulan2,
                //     );
                //     $this->db->insert('transaksi', $data3);

                //     $data4 = array(
                //         'id_iuran'          => $id_iuran,
                //         'bukti_pembayaran'  => $bukti_pembayaran,
                //         'keterangan'        => $keterangan,
                //         'status'            => $status,
                //     );
                //     $this->AdminDetail_m->tambahdata($data4, 'detail_transaksi');
                // }

                // if($bulan3){
                //     $data5 = array(
                //         'id_warga'          => $id_warga,
                //         'atas_nama'         => $atas_nama,
                //         'tanggal_pembayaran'=> $tanggal_pembayaran,
                //         'pembayaran_bulan'  => $bulan3,
                //     );
                //     $this->db->insert('transaksi', $data5);

                //     $data6 = array(
                //         'id_iuran'          => $id_iuran,
                //         'bukti_pembayaran'  => $bukti_pembayaran,
                //         'keterangan'        => $keterangan,
                //         'status'            => $status,
                //     );
                //     $this->AdminDetail_m->tambahdata($data6, 'detail_transaksi');
                // }

                // $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                //     Konfirmasi pembayaran anda <strong>Berhasil</strong>
                //     <button type="button" class="close pesan" data-dismiss="alert" aria-label="Close">
                //     <span aria-hidden="true">&times;</span>
                //     </button>
                //     </div>');
                // redirect('wargaForm');


                
        }
    }
    


?>