<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 

{


    public function index() 
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();
       

       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
      /*   $this->load->view('templates/footer'); */

    }


    public function category() 
    {
        $data['title'] = 'Manage Category';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        // Load the form validation library
        $this->load->library('form_validation');
    
        // Set validation rules for the "category" input field
        $this->form_validation->set_rules('category', 'Category', 'required');
    
        if ($this->form_validation->run() == false) {
            // Validation failed, load the view with the form
            $data['category'] = $this->db->get('category_menu')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/category', $data);
            $this->load->view('templates/footer', $data);
        } else {
            // Validation passed, insert the category into the database
            $category_data = array(
                'category' => $this->input->post('category')
            );
    
            $this->db->insert('category_menu', $category_data);
    
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Category added!</div>');
            redirect('user/category'); // Assuming "user" is your controller and "category" is the method
        }
    }
    

    public function rack() 
    {
        $data['title'] = 'Manage Rack';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();

        $this->load->library('form_validation');

        $this->form_validation->set_rules('rackNo', 'Rack', 'required');

      if($this->form_validation->run() == false) {

        $data['rack'] = $this->db->get('rack_menu')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/rack', $data);
        $this->load->view('templates/footer', $data);
      
      } else {

        $rack_data = array(
          'rackNo' => $this->input->post('rackNo')
        
        );

        $this->db->insert('rack_menu', $rack_data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Rack added!</div>');
        redirect('user/rack');
      }

        

    }

      

}