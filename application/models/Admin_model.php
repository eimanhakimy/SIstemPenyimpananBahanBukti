<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model{

    public function getDepartmentData($table)
    {
        return $this->db->get($table);
    }

    //AKaun Staff
    public function getStaffData($table)
    {
        return $this->db->get($table);
    }

    public function get_role()
    {
        // Assuming you have a database connection already configured
        $query = $this->db->select('role')->get('roles');
    
        // Check if the query was successful
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array(); // Return an empty array if no results found
        }
    }

    public function insert_dataStaff($data, $table)
    {
        $this->db->insert($table, $data);

    }

    public function get_user_by_email($email) {
        $query = $this->db->get_where('user', array('email' => $email));
    
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return the user data
        } else {
            return null; // Return null if no user is found
        }
    }

    public function delete_dataStaff($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


    

    
    


    

    







}

?>




