<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getCategorydata($table)
    {
        return $this->db->get($table);
    }

    public function insert_dataCategory($data, $table)
    {
        $this->db->insert($table, $data);

    }

    public function update_dataCategory($data, $table)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($table, $data);
    }

}


?>