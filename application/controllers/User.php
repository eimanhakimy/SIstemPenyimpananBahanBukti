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
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();

        $data['category'] = $this->db->get('category_menu')->result_array();

        $this->form_validation->set_rules('category', 'Category', 'required');
       


        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/category', $data);
        $this->load->view('templates/footer', $data);
      /*   $this->load->view('templates/footer'); */

        }else {
            $this->db->insert('category_menu', ['category' => $this->input->post('category')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
            redirect('category');
        }

    }

    public function rack() 
    {
        $data['title'] = 'Manage rack';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();

        $data['rack'] = $this->db->get('rack_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/rack', $data);
        $this->load->view('templates/footer', $data);
      /*   $this->load->view('templates/footer'); */

        

    }

      

}