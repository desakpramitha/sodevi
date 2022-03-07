<?php defined('BASEPATH') or exit('No direct script access allowed');
class Obat_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        //if($this->auth_model->cek_login()) redirect(site_url('login'));
    }
}
