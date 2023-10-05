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

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Department' , 'required');

        if($this->form_)

        $data['department'] = $this->db->get('department_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/department', $data);
        $this->load->view('templates/footer', $data);
      

        
    }

    public function role() 
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email') ])->row_array();
       
        $data['role'] = $this->db->get('roles')->result_array();
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer', $data);
      /*   $this->load->view('templates/footer'); */

    }

    public function roleAccess($role_id)
    {
      $this->load->helper('wpu_helper'); // Load the custom helper.
        $data['title'] = 'Role Access';
        // kalo mau mengambil data dari user berdasarkan email yang ada di session
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        


        // query
        $data['role'] = $this->db->get_where('roles', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1); // menghilangkan view admin di role access
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success"role="alert">Access Changed!</div>');
    }

  





}