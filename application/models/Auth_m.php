<?php 
    class Auth_m extends CI_Model{
        public function cek_login()
        {
            $email = set_value('email');
            $password = set_value('password');

            $result   = $this->db->where('email', $email)->where('password', $password)->limit(1)->get('warga');

            if($result->num_rows() > 0 ){
                return $result->row();
            }else{
                return array();
            }
        }

    }

?>