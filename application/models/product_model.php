<?php defined('BASEPATH') or exit('No direct script access allowed');

class product_model extends CI_Model
{
    // show product list & pagination
    public function getAllProducts($limit, $start, $keyword = null)
    {
        if ($keyword) {

            $this->db->or_like('NAME', $keyword);
        }
        return $this->db->get('soft_product', $limit, $start)->result_array();
    }

    // count all product
    public function countproduct()
    {
        return $this->db->get('soft_product')->num_rows();
    }

    // Get Product by ID
    public function getProductById($id)
    {
        return $this->db->get_where('soft_product', ['PRODUCT_id' => $id])->row_array();
    }

    // Delete product 
    public function delete_product($id)
    {
        // $this->db->where('PRODUCT_id', $id);
        // $this->db->delete('soft_product');
        return $this->db->delete('soft_product', ['PRODUCT_id' => $id]);
    }

    // Insert product
    public function insert_product($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // Update data product in form
    public function update_product($productid, $data)
    {
        $this->db->where('PRODUCT_id', $productid);
        $this->db->update('soft_product', $data);
    }


    //////////////////// APPLICATION  /////////////////////////

    // show application data by Id Product
    public function getApplication($id)
    {
        return $this->db->get_where('soft_application', ['PRODUCT_id' => $id])->result_array();
    }


    // Get Application by application ID
    public function getApplicationById($id)
    {
        return $this->db->get_where('soft_application', ['APPLICATION_ID' => $id])->row_array();
    }

    // Insert Application
    public function insert_application($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // Delete Application 
    public function delete_application($id)
    {
        return $this->db->delete('soft_application', ['APPLICATION_ID' => $id]);
    }

    // Update data application in form
    public function update_application($applicationId, $data)
    {
        $this->db->where('APPLICATION_ID', $applicationId);
        $this->db->update('soft_application', $data);
    }


    //////////////////// APPLICATION MODULE ///////////////////////

    public function generateModuleId()
    {
        $this->db->select('RIGHT(soft_module.MODULE_ID,3) as kode', FALSE);
        $this->db->order_by('MODULE_ID', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('soft_module');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = date('Ymd') . $kodemax;    // "ODJ-9921-" hasilnya ODJ-9921-0001 dst.
        return $kodejadi;
    }

    public function getProductByAppsId($id)
    {
        return $this->db->select("*")
            ->from('soft_application')
            ->join('soft_product', 'soft_application.PRODUCT_ID = soft_product.PRODUCT_id')
            ->where('soft_application.APPLICATION_ID', $id)
            ->get()->result_array();
    }

    // show all data list module
    public function getModule($id)
    {
        // return $this->db->get_where('soft_module', ['APPLICATION_ID' => $id])->result_array();
        return $this->db->select('*')
            ->from('soft_mod_item')
            ->join('soft_module', 'soft_module.MODULE_ID = soft_mod_item.MODULE_ID', 'right ')
            ->join('soft_application', 'soft_application.APPLICATION_ID = soft_module.APPLICATION_ID')
            ->where('soft_module.APPLICATION_ID', $id)->order_by(
                'soft_module.MODULE_ID'
            )
            ->get()->result_array();

        // return $this->db->query('SELECT *  
        // from `soft_mod_item` FULL JOIN `soft_module`
        // INNER JOIN `soft_application` on soft_module.APPLICATION_ID = soft_application.APPLICATION_ID')->result_array();
    }

    // show to dropdown
    public function getIdModule($id)
    {
        return $this->db->select('*')
            ->from('soft_mod_item')
            ->join('soft_module', 'soft_module.MODULE_ID = soft_mod_item.MODULE_ID', 'right ')
            ->join('soft_application', 'soft_application.APPLICATION_ID = soft_module.APPLICATION_ID')
            ->where('soft_module.APPLICATION_ID', $id)
            ->group_by(
                'soft_module.MODULE_ID'
            )
            ->get()->result_array();
    }

    // Get MODULE by module ID
    public function getModuleById($id)
    {
        return $this->db->get_where('soft_module', ['MODULE_ID' => $id])->row_array();
    }

    //insert Module
    public function insert_module($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // Delete Module 
    public function delete_module($id)
    {
        return $this->db->delete('soft_module', ['MODULE_ID' => $id]);
    }

    // Update data module in form
    public function update_module($moduleId, $data)
    {
        $this->db->where('MODULE_ID', $moduleId);
        $this->db->update('soft_module', $data);
    }

    // Generate Mod_item_id 
    public function generateModItemId()
    {
        $this->db->select('RIGHT(soft_mod_item.MOD_ITEM_ID,3) as kode', FALSE);
        $this->db->order_by('MOD_ITEM_ID', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('soft_mod_item');      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //jika kode ternyata sudah ada.      
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            //jika kode belum ada      
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $kodejadi = date('Ymd') . $kodemax;    // "ODJ-9921-" hasilnya ODJ-9921-0001 dst.
        return $kodejadi;
    }

    // Get MODULE item by module ID
    public function getModuleItemById($id)
    {
        return $this->db->get_where('soft_mod_item', ['MOD_ITEM_ID' => $id])->row_array();
    }

    //insert Module Item
    public function insert_module_item($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // Delete Module Item
    public function delete_module_item($id)
    {
        return $this->db->delete('soft_mod_item', ['MOD_ITEM_ID' => $id]);
        //     ->query('CREATE TRIGGER `delete_test_item` AFTER DELETE ON `soft_test_item` FOR EACH ROW BEGIN
        // DELETE FROM soft_test_item WHERE soft_test_item.TEST_ITEM_ID = old.TEST_ITEM_ID
        // END DELIMITER$$');
    }

    // Update Module Item
    public function update_module_item($modItemId, $data)
    {
        $this->db->where('MOD_ITEM_ID', $modItemId);
        $this->db->update('soft_mod_item', $data);
    }

    //insert Test Item
    public function insert_test_item($data2, $table)
    {
        $this->db->insert($table, $data2);
    }

    // Delete Test Item
    public function delete_test_item($id)
    {
        return $this->db->delete('soft_test_item', ['TEST_ITEM_ID' => $id]);
        //     ->query('CREATE TRIGGER `delete_mod_item` AFTER DELETE ON `soft_test_item` FOR EACH ROW BEGIN
        // DELETE FROM soft_mod_item WHERE soft_mod_item.MOD_ITEM_ID = old.MOD_ITEM_ID
        // END')->result_array();
    }

    // Update Test Item
    public function update_test_item($itemId, $data)
    {
        $this->db->where('TEST_ITEM_ID', $itemId);
        $this->db->update('soft_test_item', $data);
    }

    //show data product test item header
    public function getDataProductByItemId($id)
    {
        return $this->db->select("soft_product.NAME, soft_product.ABBREVIATION, soft_application.VERSION, soft_module.NAME as MODULE_NAME")
            ->from('soft_product')
            ->join('soft_application', 'soft_application.PRODUCT_ID = soft_product.PRODUCT_id')
            ->join('soft_module', 'soft_module.APPLICATION_ID = soft_application.APPLICATION_ID')
            ->join('soft_mod_item', 'soft_module.MODULE_ID = soft_mod_item.MODULE_ID')
            ->where('soft_mod_item.MOD_ITEM_ID', $id)
            ->get()->result_array();
    }

    // show all data list Item
    public function getItem($id)
    {
        // return $this->db->get_where('soft_test_item', ['TEST_ITEM_ID' => $id])->result_array();
        // return $this->db->select("*")
        //     ->from('soft_mod_item')
        //     ->join('soft_test_item', 'soft_mod_item.MODULE_ID = soft_test_item.MODULE_ID')
        //     ->join('soft_test_case', 'soft_test_item.TEST_ITEM_ID = soft_test_case.TEST_ITEM_ID', 'right')
        //     ->where('soft_mod_item.MOD_ITEM_ID', $id)
        //     ->get()->result_array();

        return $this->db->select("soft_test_item.ITEM_NAME, soft_mod_item.MODULE_ID, soft_test_case.TEST_CASE, TEST_CASE_ID, TEST_CASE, DATA_INPUT, TEST_RESULT, TEST_SCENARIO, soft_test_item.TEST_ITEM_ID")
            ->from('soft_test_case')
            ->join('soft_test_item', 'soft_test_case.TEST_ITEM_ID = soft_test_item.TEST_ITEM_ID', 'right')
            ->join('soft_mod_item', 'soft_test_item.MODULE_ID = soft_mod_item.MODULE_ID')
            ->where('soft_mod_item.MOD_ITEM_ID', $id)
            ->get()->result_array();

        // yess 

        // JANGAN DIUBAH KALO DIUBAH MATI AJA KAU BODAT
        // return $this->db->select("*")
        //     ->from('soft_mod_item')
        //     ->join('soft_test_item', 'soft_mod_item.MODULE_ID = soft_test_item.MODULE_ID')
        //     ->where('soft_mod_item.MOD_ITEM_ID', $id)
        //     ->get()->result_array();
        //
    }

    //insert Test Case
    public function insert_test_case($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // Delete Test Case
    public function delete_test_case($id)
    {
        return $this->db->delete('soft_test_case', ['TEST_CASE_ID' => $id]);
        //     ->query('CREATE TRIGGER `delete_mod_item` AFTER DELETE ON `soft_test_item` FOR EACH ROW BEGIN
        // DELETE FROM soft_mod_item WHERE soft_mod_item.MOD_ITEM_ID = old.MOD_ITEM_ID
        // END')->result_array();
    }

    // Update Test Case
    public function update_test_case($caseId, $data)
    {
        $this->db->where('TEST_CASE_ID', $caseId);
        $this->db->update('soft_test_case', $data);
    }

    //////////////////////////////// APPLICATION BUILD /////////////////////////////////////

    // show application product in dropdown
    public function getAppBuild()
    {
        return $this->db->select("SOFT_APP_BUILD_ID, soft_app_build.APPLICATION_ID, soft_app_build.BUILD_DATE, soft_application.APPLICATION_ID, VERSION, soft_product.NAME ")
            ->from('soft_app_build')
            ->join('soft_application', 'soft_application.APPLICATION_ID = soft_app_build.APPLICATION_id')
            ->join('soft_product', 'soft_application.PRODUCT_ID = soft_product.PRODUCT_id')
            ->get()->result_array();
    }

    // show application product in dropdown
    public function getAppProduct()
    {
        return $this->db->select("*")
            ->from('soft_application')
            ->join('soft_product', 'soft_application.PRODUCT_ID = soft_product.PRODUCT_id')
            ->get()->result_array();
    }

    //insert Application Build
    public function insert_app_build($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // Delete Application Build
    public function delete_app_build($id)
    {
        return $this->db->delete('soft_app_build', ['SOFT_APP_BUILD_ID' => $id]);
    }

    // Update Application Build
    public function update_app_build($appBuildId, $data)
    {
        $this->db->where('SOFT_APP_BUILD_ID', $appBuildId);
        $this->db->update('soft_app_build', $data);
    }
}
