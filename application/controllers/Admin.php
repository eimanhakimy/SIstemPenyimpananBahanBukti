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

    public function department() 
    {
        $data['title'] = 'Manage department';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();

        $data['department'] = $this->db->get('department_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/department', $data);
        $this->load->view('templates/footer', $data);
      /*   $this->load->view('templates/footer'); */

        
    }

  





}