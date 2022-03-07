<?php defined('BASEPATH') or exit('No direct script access allowed');

class test_model extends CI_Model
{
    // show data list test script to testScript view
    public function getTestScript()
    {
        return $this->db->select("*")
            ->from('soft_product')
            ->join('soft_application', 'soft_application.PRODUCT_ID = soft_product.PRODUCT_ID')
            ->join('soft_app_build', 'soft_application.APPLICATION_ID = soft_app_build.APPLICATION_ID')
            ->join('soft_test', 'soft_test.APPLICATION_ID = soft_app_build.APPLICATION_ID')
            ->join('soft_os', 'soft_test.OS_ID = soft_os.OS_ID')
            // ->where('soft_test.TEST_ID' and 'soft_test.APPLICATION_ID')
            ->group_by('soft_test.TEST_ID')
            ->get()->result_array();

        // return $this->db->select("*")
        //     ->from('soft_test')
        //     ->group_by('soft_test.TEST_ID')
        //     ->get()->result_array();
    }

    // show data list OS to dropdown
    public function getOs()
    {
        return $this->db->select("*")
            ->from('soft_os')
            ->get()->result_array();
    }

    // show data list BUILD DATE to dropdown
    public function getBuildDate($id)
    {
        return $this->db->select("*")
            ->from('soft_test')
            ->join('soft_app_build', 'soft_test.APPLICATION_ID = soft_app_build.APPLICATION_ID')
            ->where('soft_test.APPLICATION_ID', $id)
            ->order_by('soft_app_build.BUILD_DATE')
            ->group_by('soft_app_build.BUILD_DATE')
            ->get()->result_array();
    }

    // insert test script
    public function insert_test_script($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // Delete Test Script
    public function delete_test_script($id)
    {
        return $this->db->delete('soft_test', ['TEST_ID' => $id]);
    }

    // Update Test Script
    public function update_test_script($testId, $data)
    {
        $this->db->where('TEST_ID', $testId);
        $this->db->update('soft_test', $data);
    }

    ///////////////////////TEST EVALUATION/////////////////////////////

    // Show name and version in header project
    public function getProject()
    {
        return $this->db->select("*")
            ->from('soft_test')
            ->join('soft_product');
    }
    // show data hr_employee to dropdown programmer
    public function getProgrammer()
    {
        return $this->db->select("*")
            ->from('hr_employee')
            ->get()->result_array();
    }
}
