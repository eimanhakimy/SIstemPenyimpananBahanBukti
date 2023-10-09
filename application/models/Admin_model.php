<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model{

    public function getDepartmentData($table)
    {
        return $this->db->get($table);
    }






}

?>




