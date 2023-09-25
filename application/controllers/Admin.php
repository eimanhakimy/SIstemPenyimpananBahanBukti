<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 

{


    public function index() 
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();
       

       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
      /*   $this->load->view('templates/footer'); */

    }

   // Controller method to load the department addition page
   public function add_department_page() {
    $data['title'] = 'Add Department';
    $data['page_content'] = 'admin/add_department'; // Path to your specific content view
    $this->load->view('common_layout', $data);

    
}





}