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

    public function delete_dataCategory($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getAnggotaData($table)
    {
        return $this->db->get($table);
    }

    public function getBahanBuktiData($table)
    {
        return $this->db->get($table);
    }

    public function insert_dataBahanBukti($data, $table)
    {
        $this->db->insert($table, $data);

    }


   

}


?>