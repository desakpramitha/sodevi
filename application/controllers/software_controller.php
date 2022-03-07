<?php defined('BASEPATH') or exit('No direct script access allowed');

class software_controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
    }

    public function index()
    {
        // $data['inisial'] = $this->db->get_where('tabel di database', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = "Software";
        $data['profile'] = site_url('software_controller/profile');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar', $data);
        $this->load->view('software', $data);
        // echo 'Helo ' . $data['user']['name'];
    }

    //profile
    public function profile()
    {
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = "Profile";
        $data['subheader'] = "Welcome, " . $data['user']['name'];
        $data['profile'] = site_url('software_controller/profile');
        $data['linkback'] = site_url('software_controller/index');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('profile', $data);
    }

    //notification
    public function notification()
    {
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = "Notification";
        $data['subheader'] = "Welcome, " . $data['user']['name'];
        $data['linkback'] = site_url('software_controller/index');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('notification', $data);
    }


    //////////////////////////// SUB MENU PRODUCT //////////////////////////////////////
    public function product()
    {
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = "Product";
        $data['subheader'] = "Software / Product";
        $data['profile'] = site_url('software_controller/profile');
        $data['linkback'] = site_url('software_controller/index');

        // count all data product
        $data['total_product'] = $this->product_model->countProduct();

        // PAGINATION
        $this->load->library('pagination');

        //get searching keyword
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // config pagination
        $this->db->like('NAME', $data['keyword']);
        $this->db->from('soft_product');

        //$config['total_rows'] = $this->product_model->countProduct();
        $config['total_rows'] = $this->db->count_all_results();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;

        // initialize
        $this->pagination->initialize($config);

        // LOAD PRODUCT LIST
        $data['start'] = $this->uri->segment(3);
        $data['product'] = $this->product_model->getAllProducts($config['per_page'], $data['start'], $data['keyword']);

        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('product', $data);
    }

    //Insert product
    public function insertProduct()
    {
        $code  = $this->input->post('PRODUCT_CODE');
        $name  = $this->input->post('NAME');
        $abbreviation = $this->input->post('ABBREVIATION');
        $description = $this->input->post('DESCRIPTION');

        $data = array(
            'PRODUCT_id' => time(),
            'PRODUCT_CODE' => $code,
            'NAME' => $name,
            'ABBREVIATION' => $abbreviation,
            'DESCRIPTION' => $description
        );
        $this->product_model->insert_product($data, 'soft_product');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success add product</div>');
        redirect('software_controller/product');
    }

    // Get Data Product want to edit
    public function editProduct($id)
    {
        $data['product'] = $this->product_model->getProductById($id);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('product', $data);
        // redirect('software_controller/product');
    }

    // Delete Product
    public function deleteProduct($id)
    {
        $data['product'] = $this->product_model->delete_product($id);
        $this->load->view('product', $data);
        redirect('software_controller/product');
    }

    // Update Data Product
    public function updateProduct()
    {
        $code  = $this->input->post('PRODUCT_CODE');
        $productid = $this->input->post('PRODUCT_id');
        $name  = $this->input->post('NAME');
        $abbreviation = $this->input->post('ABBREVIATION');
        $description = $this->input->post('DESCRIPTION');

        $data = array(
            'PRODUCT_id' => $productid,
            'PRODUCT_CODE' => $code,
            'NAME' => $name,
            'ABBREVIATION' => $abbreviation,
            'DESCRIPTION' => $description
        );
        $this->db->where('PRODUCT_id', $productid);
        $this->db->update('soft_product', $data);
        // $this->product_model->update_product($productid, $data);
        redirect('software_controller/product');
    }


    //////////////////////////// APPLICATION  //////////////////////////////////////

    // button Edit Application in product
    public function application($id)
    {
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = "Application";
        $data['subheader'] = "Software / Application";
        $data['profile'] = site_url('software_controller/profile');
        $data['linkback'] = site_url('software_controller/product/');
        $data['PRODUCT_ID'] = $this->session->userdata('PRODUCT_ID');
        $data['product'] = $this->product_model->getProductById($id);
        $data['apps'] = $this->product_model->getApplication($id);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('application', $data);
    }

    // insert application
    public function insertApplication()
    {
        $id  = $this->input->post('PRODUCT_ID');
        $version  = $this->input->post('VERSION');
        $build_date = $this->input->post('BUILD_DATE');

        $data = array(
            'APPLICATION_ID' => time(),
            'PRODUCT_ID' => $id,
            'VERSION' => $version,
            'BUILD_DATE' => $build_date
        );

        $this->product_model->insert_application($data, 'soft_application');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success add Application</div>');
        $this->session->set_userdata('PRODUCT_ID', $data['PRODUCT_ID']);
        redirect($_SERVER['HTTP_REFERER'], $data);
    }

    // Get Data Product want to edit
    public function editApplication($id)
    {
        $data['apps'] = $this->product_model->getApplicationById($id);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('application', $data);
    }

    // Delete Application
    public function deleteApplication($id)
    {
        $data['apps'] = $this->product_model->delete_application($id);
        $this->load->view('application', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Update Data Application
    public function updateApplication()
    {
        $applicationId = $this->input->post('APPLICATION_ID');
        $version  = $this->input->post('VERSION');
        $build_date = $this->input->post('BUILD_DATE');

        $data = array(
            'APPLICATION_ID' => $applicationId,
            'VERSION' => $version,
            'BUILD_DATE' => $build_date
        );

        $this->product_model->update_application($applicationId, $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    //////////////////////////// APPLICATION MODULE //////////////////////////////////////

    // button LIST MODULE load list of module by application id
    public function applicationModule($id)
    {
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = "Application";
        $data['subheader'] = "Software / Application / Module";
        $data['profile'] = site_url('software_controller/profile');
        $data['linkback'] = $_SERVER['HTTP_REFERER'];
        $data['product'] = $this->product_model->getProductByAppsId($id);
        $data['moduleId'] = $this->product_model->generateModuleId();
        $data['module'] = $this->product_model->getModule($id);
        $data['dropdownModule'] = $this->product_model->getIdModule($id);
        $data['modItemId'] = $this->product_model->generateModItemId();
        // var_dump($data['module']);
        // die;
        // $data['apps'] = $this->product_model->getApplicationById($id);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('applicationModule', $data);
    }

    // insert Module
    public function insertModule()
    {
        $moduleId = $this->input->post('MODULE_ID');
        $applicationId  = $this->input->post('APPLICATION_ID');
        $nameModule  = $this->input->post('NAME');

        $data = array(
            'MODULE_ID' => $moduleId,
            'APPLICATION_ID' => $applicationId,
            'NAME' => $nameModule
        );

        $this->product_model->insert_module($data, 'soft_module');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success add Module</div>');
        //$this->session->set_userdata('PRODUCT_ID', $data['PRODUCT_ID']);
        redirect($_SERVER['HTTP_REFERER'], $data);
    }

    // Get Data Module want to edit
    public function editModule($id)
    {
        $data['module'] = $this->product_model->getModuleById($id);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('applicationModule', $data);
    }

    // Delete Module
    public function deleteModule($id)
    {
        $data['module'] = $this->product_model->delete_module($id);
        $this->load->view('applicationModule', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Update Data Module
    public function updateModule()
    {
        $moduleId = $this->input->post('MODULE_ID');
        $nameModule  = $this->input->post('NAME');

        $data = array(
            'NAME' => $nameModule
        );

        // $this->db->where('MODULE_ID', $moduleId);
        // $this->db->update('soft_module', $data);
        $this->product_model->update_module($moduleId, $data);
        //$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success Update Module</div>');
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Insert Test Item 
    public function insertModuleItem()
    {
        $modItemId  = $this->input->post('MOD_ITEM_ID');
        $moduleId = $this->input->post('MODULE_ID');
        $itemName  = $this->input->post('ITEM_NAME');

        // Insert to soft_mod_item
        $data = array(
            'MOD_ITEM_ID' => $modItemId,
            'MODULE_ID' => $moduleId,
            'ITEM_NAME' => $itemName
        );
        $this->product_model->insert_module_item($data, 'soft_mod_item');

        //insert to soft_test_item
        $data2 = array(
            'TEST_ITEM_ID' => time(),
            'MODULE_ID' => $moduleId,
            'ITEM_NAME' => $itemName
        );
        $this->product_model->insert_test_item($data2, 'soft_test_item');
        // var_dump($data);
        // die;
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success add Module Test Item</div>');
        //$this->session->set_userdata('PRODUCT_ID', $data['PRODUCT_ID']);
        redirect($_SERVER['HTTP_REFERER'], $data);
    }

    // Get Data Item want to edit
    public function editModuleItem($id)
    {
        $data['module'] = $this->product_model->getModuleItemById($id);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('applicationModule', $data);
    }

    // Delete Module Item
    public function deleteModuleItem($id)
    {
        $data['module'] = $this->product_model->delete_module_item($id);
        $this->load->view('applicationModule', $data);
        redirect($_SERVER['HTTP_REFERER'], $data);
    }

    // Update Module Item
    public function updateModuleItem()
    {
        $modItemId = $this->input->post('MOD_ITEM_ID');
        $modItemName  = $this->input->post('ITEM_NAME');

        $data = array(
            'ITEM_NAME' => $modItemName
        );

        $this->db->where('MOD_ITEM_ID', $modItemId);
        $this->db->update('soft_mod_item', $data);
        // $this->product_model->update_module_item($modItemId, $data);
        redirect($_SERVER['HTTP_REFERER']);
    }


    ///////////////////////////// TEST ITEM TEST CASE ///////////////////////////////////////

    // button edit text case in software/application/module
    public function testItem($id)
    {
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = "Application";
        $data['subheader'] = "Software / Test Item";
        $data['profile'] = site_url('software_controller/profile');
        $data['linkback'] = $_SERVER['HTTP_REFERER'];
        $data['moduleId'] = $this->product_model->generateModuleId();
        $data['modItemId'] = $this->product_model->generateModItemId();
        $data['product'] = $this->product_model->getDataProductByItemId($id);
        $data['item'] = $this->product_model->getItem($id);
        // var_dump($data['item']);
        // die;
        // $data['apps'] = $this->product_model->getApplicationById($id);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('testItem', $data);
    }

    // Insert Test Item 
    public function insertTestItem()
    {
        $modItemId  = $this->input->post('MOD_ITEM_ID');
        $moduleId = $this->input->post('MODULE_ID');
        $itemName  = $this->input->post('ITEM_NAME');

        // Insert to soft_mod_item
        $data = array(
            'MOD_ITEM_ID' => $modItemId,
            'MODULE_ID' => $moduleId,
            'ITEM_NAME' => $itemName
        );
        $this->product_model->insert_module_item($data, 'soft_mod_item');

        //insert to soft_test_item
        $data2 = array(
            'TEST_ITEM_ID' => time(),
            'MODULE_ID' => $moduleId,
            'ITEM_NAME' => $itemName
        );
        $this->product_model->insert_test_item($data2, 'soft_test_item');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Success add Module Test Item</div>');
        //$this->session->set_userdata('PRODUCT_ID', $data['PRODUCT_ID']);
        redirect($_SERVER['HTTP_REFERER'], $data);
    }

    // Delete Test Item
    public function deleteTestItem($id)
    {
        $data['item'] = $this->product_model->delete_test_item($id);
        $this->load->view('applicationModule', $data);
        redirect($_SERVER['HTTP_REFERER'], $data);
    }

    // Update Test Item
    public function updateTestItem()
    {
        $itemId = $this->input->post('TEST_ITEM_ID');
        $itemName  = $this->input->post('ITEM_NAME');

        $data = array(
            'ITEM_NAME' => $itemName
        );

        $this->product_model->update_test_item($itemId, $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Insert Test Case
    public function insertTestCase()
    {
        $testItemId = $this->input->post('TEST_ITEM_ID');
        $testCase = $this->input->post('TEST_CASE');
        $testScenario = $this->input->post('TEST_SCENARIO');
        $expectedResult = $this->input->post('TEST_RESULT');
        $dataInput = $this->input->post('DATA_INPUT');

        $data = array(
            'TEST_ITEM_ID' => $testItemId,
            'TEST_CASE_ID' => time(),
            'TEST_CASE' => $testCase,
            'TEST_SCENARIO' => $testScenario,
            'TEST_RESULT' => $expectedResult,
            'DATA_INPUT' => $dataInput
        );
        $this->product_model->insert_test_case($data, 'soft_test_case');
        redirect($_SERVER['HTTP_REFERER'], $data);
    }

    // Delete Test case
    public function deleteTestCase($id)
    {
        $data['item'] = $this->product_model->delete_test_case($id);
        $this->load->view('applicationModule', $data);
        redirect($_SERVER['HTTP_REFERER'], $data);
    }

    // Update Test Case
    public function updateTestCase()
    {
        $caseId = $this->input->post('TEST_CASE_ID');
        $itemId = $this->input->post('TEST_ITEM_ID');
        $testCase  = $this->input->post('EDIT_TEST_CASE');
        $testScenario  = $this->input->post('EDIT_TEST_SCENARIO');
        $dataInput  = $this->input->post('EDIT_DATA_INPUT');
        $testResult  = $this->input->post('EDIT_TEST_RESULT');

        $data = array(
            'TEST_ITEM_ID' => $itemId,
            'TEST_CASE' => $testCase,
            'TEST_SCENARIO' => $testScenario,
            'DATA_INPUT' => $dataInput,
            'TEST_RESULT' => $testResult
        );
        // var_dump($caseId);
        // die;
        $this->db->where('TEST_CASE_ID', $caseId);
        $this->db->update('soft_test_case', $data);

        // $this->product_model->update_test_case($caseId, $data);
        redirect($_SERVER['HTTP_REFERER']);
    }


    ///////////////////////////// LOAD SUBMENU APPLICATION BUILD ///////////////////////////////////////

    public function applicationBuild()
    {
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = "Application Build";
        $data['subheader'] = "Software / Application Build";
        $data['profile'] = site_url('software_controller/profile');
        $data['linkback'] = site_url('software_controller/index');
        $data['appBuild'] = $this->product_model->getAppBuild();
        $data['appProduct'] = $this->product_model->getAppProduct();
        // var_dump($data['appBuild']);
        // die;
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('applicationBuild', $data);
    }

    public function saveEvaluation()
    {
        $data['user'] = $this->db->get_where('app_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['header'] = "Application Build";
        $data['subheader'] = "Software / Application Build / Save Evaluation";
        $data['profile'] = site_url('software_controller/profile');
        $data['linkback'] = site_url('software_controller/applicationBuild');
        $data['appProduct'] = $this->product_model->getAppProduct();
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar2', $data);
        $this->load->view('save', $data);
    }

    // Insert Application Build
    public function insertAppBuild()
    {
        $appId = $this->input->post('APPLICATION_ID');
        $buildDate = $this->input->post('BUILD_DATE');

        $data = array(
            'APPLICATION_ID' => $appId,
            'SOFT_APP_BUILD_ID' => time(),
            'BUILD_DATE' => $buildDate
        );
        $this->product_model->insert_app_build($data, 'soft_app_build');
        // redirect($_SERVER['HTTP_REFERER'], $data);
        redirect('software_controller/applicationBuild');
    }

    // Delete Application Build
    public function deleteAppBuild($id)
    {
        $data['appBuild'] = $this->product_model->delete_app_build($id);
        $this->load->view('applicationBuild', $data);
        redirect($_SERVER['HTTP_REFERER'], $data);
    }

    // Update Application Build
    public function updateAppBuild()
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

        $this->product_model->update_app_build($appBuildId, $data);
        redirect('software_controller/applicationBuild');
    }
}
