<?php defined('BASEPATH') or exit('No direct script access allowed');

class test_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('test_model');
        $this->load->model('product_model');
        $this->load->library('user_agent');
    }

    public function index()
    {
        // $data['inisial'] = $this->db->get_where('tabel di database', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = 'Test';
        $data['profile'] = site_url('test_controller/profile');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('test', $data);
        // echo 'Helo ' . $data['user']['name'];
    }

    //profile
    public function profile()
    {
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = "Profile";
        $data['subheader'] = "Welcome, " . $data['user']['name'];
        $data['profile'] = site_url('test_controller/profile');
        $data['linkback'] = site_url('test_controller/index');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('profile', $data);
    }

    ///////////////////////////// TEST SCRIPT ///////////////////////////////////

    public function testScript()
    {
        // $data['inisial'] = $this->db->get_where('tabel di database', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = 'Test Script';
        $data['subheader'] = 'Test / Test Script';
        $data['profile'] = site_url('test_controller/profile');
        $data['linkback'] = site_url('test_controller/index');
        $data['testscript'] = $this->test_model->getTestScript();
        $data['appProduct'] = $this->product_model->getAppProduct();
        // $data = $this->test_model->getBuildDate();
        // var_dump($data['testscript']);
        // die;
        $data['os'] = $this->test_model->getOs();
        // get data browser
        $data['browser'] = $this->agent->browser();
        $data['browser_version'] = $this->agent->version();
        // $data['os'] = $this->agent->platform();
        // $data['ip_address'] = $this->input->ip_address();

        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('testScript', $data);
        // echo 'Helo ' . $data['user']['name'];
    }

    function getBuildDate()
    {
        $id = $this->input->post('id');
        // var_dump($id);
        // die;
        $data = $this->test_model->getBuildDate($id);
        echo json_encode($data);
    }

    public function formTestEvaluation()
    {
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = 'Test Script';
        $data['subheader'] = 'Test / Test Script';
        $data['profile'] = site_url('test_controller/profile');
        $data['linkback'] = site_url('test_controller/testScript');
        $data['programmer'] = $this->test_model->getProgrammer();
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('formTestEvaluation', $data);
    }

    //list
    public function testEvaluation()
    {
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = 'Test Script';
        $data['subheader'] = 'Test / Test Script';
        $data['profile'] = site_url('test_controller/profile');
        $data['linkback'] = site_url('test_controller/testScript');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('testEvaluation', $data);
    }

    // Insert Test Script
    public function insertTestScript()
    {
        // $employee= $this->input->post('EMPLOYEE_ID');
        $password = $this->input->post('PASSWORD');
        $appId = $this->input->post('APPLICATION_ID');
        $softAppBuildId = $this->input->post('BUILD_DATE');
        $serverOs = $this->input->post('SERVER_OS_ID');
        $os = $this->input->post('OS_ID');
        $serverDetail = $this->input->post('SERVER_DETAIL');
        $workstationDetail = $this->input->post('WORKS_DETAIL');
        $note = $this->input->post('NOTE');
        $browser = $this->input->post('BROWSER');
        $browser_version = $this->input->post('VERSION_BROW');

        $data = array(
            'TEST_ID' => time(),
            'APPLICATION_ID' => $appId,
            'SOFT_APP_BUILD_ID' => $softAppBuildId,
            'SERVER_OS_ID' => $serverOs,
            'OS_ID' => $os,
            'WORKS_DETAIL' => $workstationDetail,
            'SERVER_DETAIL' => $serverDetail,
            'NOTE' => $note,
            'PASSWORD' => $password,
            'BROWSER' => $browser,
            'VERSION_BROW' => $browser_version
            // ,'EMPLOYEE_ID' => $employee
        );
        $this->test_model->insert_test_script($data, 'soft_test');
        // redirect($_SERVER['HTTP_REFERER'], $data);
        redirect('test_controller/formTestEvaluation');
    }

    // Delete Test Script
    public function deleteTestScript($id)
    {
        $data['testscript'] = $this->product_model->delete_test_script($id);
        $this->load->view('testScript', $data);
        redirect($_SERVER['HTTP_REFERER'], $data);
    }

    // Update Test Script
    public function updateTestScript()
    {
        $appBuildId = $this->input->post('SOFT_APP_BUILD_ID');
        $appId = $this->input->post('APPLICATION_ID');
        $buildDate = $this->input->post('BUILD_DATE');

        $data = array(
            'APPLICATION_ID' => $appId,
            'BUILD_DATE' => $buildDate
        );
        // var_dump($appBuildId);
        // die;
        // $this->db->where('SOFT_APP_BUILD', $appBuildId);
        // $this->db->update('SOFT_APP_BUILD', $data);

        $this->product_model->update_test_script($appBuildId, $data);
        redirect($_SERVER['HTTP_REFERER'], $data);
        // redirect('software_controller/applicationBuild');
    }


    ///////////////////////////// VIEW RESULT ///////////////////////////////////

    public function viewResult()
    {
        // $data['inisial'] = $this->db->get_where('tabel di database', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = 'View Result';
        $data['profile'] = site_url('test_controller/profile');
        $data['subheader'] = 'Test / View Result';
        $data['linkback'] = site_url('test_controller/index');
        $data['appProduct'] = $this->product_model->getAppProduct();
        $data['programmer'] = $this->test_model->getProgrammer();
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('viewResult', $data);
        // echo 'Helo ' . $data['user']['name'];
    }


    ///////////////////////////// TEST REPORT ///////////////////////////////////

    public function testReport()
    {
        // $data['inisial'] = $this->db->get_where('tabel di database', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = 'Test Report';
        $data['subheader'] = 'Test / Test Report';
        $data['profile'] = site_url('test_controller/profile');
        $data['linkback'] = site_url('test_controller/index');
        $data['appProduct'] = $this->product_model->getAppProduct();
        $data['programmer'] = $this->test_model->getProgrammer();
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('testReport', $data);
        // echo 'Helo ' . $data['user']['name'];
    }
}
