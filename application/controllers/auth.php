<?php 
    class auth extends CI_Controller{
        public function login()
        {
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Kata Sandi', 'required');

            if($this->form_validation->run() == FALSE){
                $this->load->view('login');
            }else{
                $auth = $this->Auth_m->cek_login();

                if($auth == FALSE){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    E-mail atau Kata Sandi anda salah!
                  </div>');
                    redirect('auth/login');
                }else{
                    $this->session->set_userdata('email', $auth->email);
                    $this->session->set_userdata('role', $auth->role);

                    switch ($auth->role) {
                        case 1:
                            redirect('rtData');
                            break;
                        case 2:
                            redirect('adminVerifikasi');
                            break;
                        case 3:
                            redirect('wargaProfil');
                            break;
                        case 4:
                            redirect('rwData');
                        default:
                            break;
                    }
                }
            }
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect('auth/login');
        }
    }

?>