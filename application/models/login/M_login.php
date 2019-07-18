<?php 

class M_login extends CI_Model{

    public function cekLogin()
    {
        $data = [];
        $flag_cocok = 0;
        $cekUsername = $this->db->select('*')
                                ->from('auth_user')
                                ->where('username', $this->input->post('username'))                                
                                ->get()->result_array();

        if ($cekUsername == null){
            return [
                'metaData' => [
                    'code' => 201,
                    'message' => 'Nama User tidak terdaftar'
                ],
                'result' => null
            ];   
            exit();
        }

        foreach ($cekUsername as $cuser){
            if (password_verify($this->input->post('password') , $cuser['password'])){                                
                $data = $cuser;
                $flag_cocok = 1;
                break;                
            } 
        }        

        if ($flag_cocok == 1){        
            $this->session->set_userdata([
                'isLogin' => 1,
                'idUser' => $data['id_auth_user'],
                'username' => $data['username'],
                'idRole' => $data['id_role_user']
            ]);
            unset($data['password']);
            return [
                'metaData' => [
                    'code' => 200,
                    'message' => 'ok'
                ],
                'result' => $data
            ];            
        } else {
            return [
                'metaData' => [
                    'code' => 202,
                    'message' => 'Password Tidak Cocok'
                ],
                'result' => $this->input->post('username')
            ];            
        }
    }

    
    public function getUser()    
    {   
        $this->db->where('flag_active', 1);
        return $this->db->get('auth_user')->result_array();   
    }

    public function selectRole()
    {        
        $this->db->where('flag_active', 1);
        return $this->db->get('role_user')->result_array();   
    }

    public function createAkun()
    {
        $data = [
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'id_role_user' => $this->input->post('role')
        ];
        $this->db->insert('auth_user', $data);
        return [
            'metaData' => [
                'code' => 200,
                'message' => 'ok'
            ],
            'result' => $this->db->get('auth_user')->result_array()
        ];
    }
}

?>