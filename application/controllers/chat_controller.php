<?php defined('BASEPATH') or exit('No direct script access allowed');

class chat_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        //$this->load->model('auth_model');
    }

    public function index()
    {
        // $data['inisial'] = $this->db->get_where('tabel di database', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = 'Chat';
        $data['profile'] = site_url('chat_controller/profile');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('chat', $data);
        // echo 'Helo ' . $data['user']['name'];
    }

    //profile
    public function profile()
    {
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = "Profile";
        $data['subheader'] = "Welcome, " . $data['user']['name'];
        $data['profile'] = site_url('chat_controller/profile');
        $data['linkback'] = site_url('chat_controller/index');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('profile', $data);
    }
}
