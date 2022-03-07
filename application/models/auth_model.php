<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    private $table = "app_user";
    private $primary_key = "id";

    public function insert_user($data)
    {
        $this->db->insert('app_user', $data);
    }

    function login_user($email, $password)
    {
        $query = $this->db->get_where('app_user', array('email' => $email));
        if ($query->num_rows() > 0) {
            $data_user = $query->row();
            if (password_verify($password, $data_user->password)) {
                $this->session->set_userdata('email', $data_user->email);
                // $this->session->set_userdata('nama_pegawai',$data_user->nama_pegawai);
                // $this->session->set_userdata('email',$data_user->email);
                // $this->session->set_userdata('foto',$data_user->foto);
                // $this->session->set_userdata('id_pegawai',$data_user->id_pegawai);

                $this->session->set_userdata('is_login', TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function cek_login()
    {
        if (empty($this->session->userdata('is_login'))) {
            redirect('auth_controller');
        }
    }
}
