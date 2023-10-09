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


    public function editCategory($id_category)
{
    $data['title'] = 'Edit Kategori';
    $this->_rulesCategory();
      
    if ($this->form_validation->run() == FALSE) {
        $this->category();
    } else {
        $data = array(
            'id' => $id_category,
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


    public function deleteCategory($id_category) 
    {
        $where = array('id' => $id_category);

        $this->User_model->delete_dataCategory($where, 'category_menu');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Kategori Berjaya Dihapus!</h4>
            <p>Kategori berjaya dihapus dari database. Anda boleh lihat dalam table.</p>
            <hr>
            </div>');
        redirect('user/category');
    }

    public function printCategory()
    {
      $data['category'] = $this->User_model->getCategorydata('category_menu')->result();
      $this->load->view('user/print_category', $data);
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


    public function rack()
    {
      $data['title'] = 'Urus Rak';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['rack'] = $this->User_model->getRackdata('rack_menu')->result();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/rack', $data);
      $this->load->view('templates/footer', $data);

    }

    public function _rulesRack ()
    {
      $this->form_validation->set_rules('rack', 'No Rak', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
      
    }

    public function addRack()
    {
        $data['title'] = 'Tambah Rak';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tambah_rack'); // Load the view
        $this->load->view('templates/footer', $data);
    }

    public function addRack_action()
    {
        $this->_rulesRack();

        if ($this->form_validation->run() == FALSE) {
          $this->addRack();
        } else {
          $data = array(
            'rack' => $this->input->post('rack'),


          );

          $this->User_model->insert_dataRack($data,'rack_menu');
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Rak Baru Berjaya Ditambah!</h4>
          <p>Rak baru berjaya ditambah ke dalam sistem. Anda boleh lihat dalam table.</p>
          <hr>
        </div>');
          redirect('user/rack');
        }
      
    }

    public function editRack($id_rack)
{
    $data['title'] = 'Kemaskini Rak';
    $this->_rulesRack();
      
    if ($this->form_validation->run() == FALSE) {
        $this->rack();
    } else {
        $data = array(
            'id' => $id_rack,
            'rack' => $this->input->post('rack'),
        );

        $this->User_model->update_dataRack($data, 'rack_menu');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Rak Berjaya Dikemaskini!</h4>
            <p>Rak berjaya diubah ke dalam sistem. Anda boleh lihat dalam table.</p>
            <hr>
            </div>');
        redirect('user/rack');
    }
}

    public function deleteRack($id_rack) 
    {
        $where = array('id' => $id_rack);

        $this->User_model->delete_dataRack($where, 'rack_menu');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Rak Berjaya Dihapus!</h4>
            <p>Rak berjaya dihapus dari database. Anda boleh lihat dalam table.</p>
            <hr>
            </div>');
        redirect('user/rack');
    }

    public function printRack()
    {
      $data['rack'] = $this->User_model->getRackdata('rack_menu')->result();
      $this->load->view('user/print_rack', $data);
    }


    public function bahanbukti()
    {
      $data['title'] = 'Penyimpanan Bahan Bukti';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['evidences'] = $this->User_model->getBahanBuktiData('evidences')->result();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/bahanbukti', $data);
      $this->load->view('templates/footer', $data);

    }

    public function _rulesBahanBukti ()
    {
      $this->form_validation->set_rules('item_name', 'Nama Bahan Bukti', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
      $this->form_validation->set_rules('case_no', 'Nombor Kes', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
    }

    public function addBahanBukti()
    {
        $data['title'] = 'Tambah Bahan Bukti';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['status_messages'] = $this->User_model->get_status_messages();

        $data['anggota_name'] = $this->User_model->get_anggota_name();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tambah_bahanbukti'); // Load the view
        $this->load->view('templates/footer', $data);
    }

    public function addBahanBukti_action()
    {
        $this->_rulesBahanBukti();

        if ($this->form_validation->run() == FALSE) {
            $this->addBahanBukti();
        } else {
            $data = array(
                'item_name' => $this->input->post('item_name'),
                'case_no' => $this->input->post('case_no'),
                'item_quantity' => $this->input->post('item_quantity'),
                'item_weight' => $this->input->post('item_weight')
            );

            $this->User_model->insert_dataBahanBukti($data, 'evidences');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Kategori Baru Berjaya Ditambah!</h4>
            <p>Kategori baru berjaya ditambah ke dalam sistem. Anda boleh lihat dalam table.</p>
            <hr>
            </div>');
            redirect('user/bahanbukti');
        }
    }

    public function anggota()
    {
      $data['title'] = 'Senarai Anggota';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['anggota'] = $this->User_model->getAnggotaData('anggota_menu')->result();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/anggota', $data);
      $this->load->view('templates/footer', $data);

    }

    public function printAnggota()
    {
      $data['anggota'] = $this->User_model->getAnggotaData('anggota_menu')->result();
      $this->load->view('user/print_anggota', $data);
    }

    

      

}