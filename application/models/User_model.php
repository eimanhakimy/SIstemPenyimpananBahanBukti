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

    public function get_rack()
    {
        // Assuming you have a database connection already configured
        $query = $this->db->select('rack')->get('rack_menu');
    
        // Check if the query was successful
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); // Return an empty array if no results found
        }
    }

    public function get_category()
    {
        // Assuming you have a database connection already configured
        $query = $this->db->select('category')->get('category_menu');
    
        // Check if the query was successful
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); // Return an empty array if no results found
        }
    }

    public function delete_dataBahanBukti($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_dataBahanBukti($data, $table)
    {
        $this->db->where('id',$data['id']);
        $this->db->update($table, $data);
    }

    public function getAnggotaEmail($anggotaName) {
        $this->db->select('anggota_email'); // Correct the column name to 'anggota_email'
        $this->db->where('anggota_name', $anggotaName);
        $query = $this->db->get('anggota_menu'); // Use the correct table name
    
        if ($query->num_rows() > 0) {
            return $query->row()->anggota_email; // Correct the property name to 'anggota_email'
        } else {
            return null; // Handle the case where no email is found for the given 'anggota_name'
        }
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