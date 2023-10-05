<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 

{
    public function __construct()
    {
      parent::__construct();
      $this->load->model('User_model');
    }


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
     

    }


    public function category()
    {
      $data['title'] = 'Urus Kategori';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['category'] = $this->User_model->getCategorydata('category_menu')->result();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/category', $data);
      $this->load->view('templates/footer', $data);

    }

    public function addCategory()
    {
        $data['title'] = 'Tambah Kategori';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tambah_category'); // Load the view
        $this->load->view('templates/footer', $data);
    }

    public function addCategory_action()
    {
        $this->_rulesCategory();

        if ($this->form_validation->run() == FALSE) {
          $this->addCategory();
        } else {
          $data = array(
            'category' => $this->input->post('category'),
            'description' => $this->input->post('description'),

          );

          $this->User_model->insert_dataCategory($data,'category_menu');
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Kategori Baru Berjaya Ditambah!</h4>
          <p>Kategori baru berjaya ditambah ke dalam sistem. Anda boleh lihat dalam table.</p>
          <hr>
        </div>');
          redirect('user/category');
        }
      
    }


    public function editCategory($id)
{
    $data['title'] = 'Edit Kategori';
    $this->_rulesCategory();
      
    if ($this->form_validation->run() == FALSE) {
        $this->category();
    } else {
        $data = array(
            'id' => $id,
            'category' => $this->input->post('category'),
            'description' => $this->input->post('description'),
        );

        $this->User_model->update_dataCategory($data, 'category_menu');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Kategori Berjaya Dikemaskini!</h4>
            <p>Kategori berjaya diubah ke dalam sistem. Anda boleh lihat dalam table.</p>
            <hr>
            </div>');
        redirect('user/category');
    }
}



    public function _rulesCategory ()
    {
      $this->form_validation->set_rules('category', 'Nama Kategori', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
      $this->form_validation->set_rules('description', 'Kategori Description', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
    }

    /* public function category() 
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
    } */


    

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