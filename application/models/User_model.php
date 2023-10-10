<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model {


    // category
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

    public function get_status_messages()
{
    // Assuming you have a database connection already configured
    $query = $this->db->select('status_message')->get('status_menu');

    // Check if the query was successful
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return array(); // Return an empty array if no results found
    }
}

// anggota

    public function get_anggota_name()
    {
    // Assuming you have a database connection already configured
    $query = $this->db->select('anggota_name')->get('anggota_menu');

    // Check if the query was successful
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return array(); // Return an empty array if no results found
    }
    }

    public function insert_dataAnggota($data, $table)
    {
        $this->db->insert($table, $data);

    }


    public function getAnggotaData($table)
    {
        return $this->db->get($table);
    }

    public function get_department_name()
    {
        // Assuming you have a database connection already configured
        $query = $this->db->select('department_name')->get('department_menu');
    
        // Check if the query was successful
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); // Return an empty array if no results found
        }
    }

    public function update_dataAnggota($data, $table)
    {
        $this->db->where('anggota_id',$data['anggota_id']);
        $this->db->update($table, $data);
    }

    //bahan bukti

    public function getBahanBuktiData($table)
    {
        return $this->db->get($table);
    }

    public function insert_dataBahanBukti($data, $table)
    {
        $this->db->insert($table, $data);

    }

    //Rack
    public function insert_dataRack($data, $table)
    {
        $this->db->insert($table, $data);

    }

    public function getRackdata($table)
    {
        return $this->db->get($table);
    }

    public function update_dataRack($data, $table)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($table, $data);
    }

    public function delete_dataRack($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


   



   

}


?>