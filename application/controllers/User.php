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
      $data['status_messages'] = $this->User_model->get_status_messages();

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
      $this->form_validation->set_rules('status_message', 'Status', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
    }

    public function addBahanBukti()
    {
        $data['title'] = 'Tambah Bahan Bukti';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['status_messages'] = $this->User_model->get_status_messages();

        $data['anggota_name'] = $this->User_model->get_anggota_name();

        $data['rack'] = $this->User_model->get_rack();

        $data['category'] = $this->User_model->get_category();


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
        // Handle the file upload
        $config['upload_path'] = './assets/img/barangkes/'; // The path to store uploaded images
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB, you can adjust this as needed

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image_url')) {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            // Handle the error here, such as showing a validation error or a flash message.
        } else {
            $upload_data = $this->upload->data();
            $image_url = 'assets/img/barangkes/' . $upload_data['file_name'];
        }

        // Prepare the data for insertion
        $data = array(
            'item_name' => $this->input->post('item_name'),
            'image_url' => $image_url, // Add the image URL to the data
            'case_no' => $this->input->post('case_no'),
            'category' => $this->input->post('category'),
            'rack' => $this->input->post('rack'),
            'item_quantity' => $this->input->post('item_quantity'),
            'item_weight' => $this->input->post('item_weight'),
            'date' => $this->input->post('date'),
            'time_check_in' => $this->input->post('time_check_in'),
            'anggota_name' => $this->input->post('anggota_name'),
            'status_message' => $this->input->post('status_message'),
            // Add other fields here
        );

        // Insert the data into the 'evidences' table
        $this->User_model->insert_dataBahanBukti($data, 'evidences');

        // Get the email associated with the selected 'anggota_name' from the database
        $recipientEmail = $this->User_model->getAnggotaEmail($this->input->post('anggota_name'));

        // Send an email to the selected 'anggota_name'
        $token = bin2hex(random_bytes(16)); // You can generate a token or use any other identifier
        $this->_sendEmail($token, 'verify', $recipientEmail);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Item Baru Berjaya Ditambah!</h4>
        <p>Item baru berjaya ditambah ke dalam sistem. Anda boleh lihat dalam table.</p>
        <hr>
        </div>');

        redirect('user/bahanbukti');
    }
}

private function _sendEmail($token, $type, $recipientEmail)
{
  $config = Array(
    'protocol' => 'smtp',
    'smtp_host' => 'sandbox.smtp.mailtrap.io',
    'smtp_port' => 2525,
    'smtp_user' => '95736e39646a00',
    'smtp_pass' => 'e3abb65c424280',
    'crlf' => "\r\n",
    'newline' => "\r\n"
  );

    $this->load->library('email', $config);

    $this->email->from('example@gmail.com', 'Admin IPD Kedah');
    $this->email->to($recipientEmail);

    // Update the email subject based on the $type
    if ($type == 'verify') {
        $this->email->subject('Barang Kes Anda Berjaya Disimpan');
    } elseif ($type == 'info') {
        $this->email->subject('Maklumat Mengenai Barang Kes');
    }

    $message = 'Barang Kes anda sudah berjaya disimpan di dalam stor. Dibawah ini adalah maklumat berkenaan dengan barang kes anda:<br>';

    // Fetch and append relevant information from the 'evidences' table based on your needs
    $message .= 'Nama Anggota:' . $this->input->post('anggota_name') . '<br>';
    $message .= 'No Kes: ' . $this->input->post('case_no') . '<br>';
    $message .= 'Date: ' . $this->input->post('date') . '<br>';
    $message .= 'Time Check In: ' . $this->input->post('time_check_in') . '<br>';
    $message .= 'Status Message: ' . $this->input->post('status_message') . '<br>';
    $message .= 'Lihat Gambar: <a href="' . base_url() . 'assets/img/barangkes/' . $this->input->post('image_url') . '">Klik di sini</a>';

    // Add the message to the email
    $this->email->message($message);

    if ($this->email->send()) {
        return true;
    } else {
        echo $this->email->print_debugger();
        die;
    }
}



      public function printBahanBukti()
      {
        $data['evidences'] = $this->User_model->getBahanBuktiData('evidences')->result();
        $this->load->view('user/print_bahanbukti', $data);
      }

      public function deleteBahanBukti($id_bahanbukti) 
      {
          $where = array('id' => $id_bahanbukti);
  
          $this->User_model->delete_dataBahanBukti($where, 'evidences');
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Barang Kes Berjaya Dihapus!</h4>
              <p>Barang Kes berjaya dihapus dari database. Anda boleh lihat dalam table.</p>
              <hr>
              </div>');
          redirect('user/bahanbukti');
      }

//       public function editBahanBukti($id_bahanbukti)
// {
//     $data['title'] = 'Kemaskini Barang Kes';
//     $this->_rulesBahanBukti();

//     if ($this->form_validation->run() == FALSE) {
//         $this->bahanbukti();
//     } else {
//         $data = array(
//             'id' => $id_bahanbukti,
//             'case_no' => $this->input->post('case_no'),
//         );

//         // Validate and convert the date format from 'dd/mm/yyyy' to 'yyyy-MM-dd'
//         $date = $this->input->post('date');
//         $date = DateTime::createFromFormat('d/m/Y', $date);
//         if ($date) {
//             $data['date'] = $date->format('Y-m-d');
//         } else {
//             // Handle an invalid date input (e.g., show an error message).
//         }

//         // Validate and convert the time_check_in format (if needed)
//         $data['time_check_in'] = $this->input->post('time_check_in');

//         // Validate and convert the date_out format (if needed)
//         $dateOut = $this->input->post('date_out');
//         $dateOut = DateTime::createFromFormat('d/m/Y', $dateOut);
//         if ($dateOut) {
//             $data['date_out'] = $dateOut->format('Y-m-d');
//         } else {
//             // Handle an invalid date_out input (e.g., show an error message).
//         }

//         // Validate and convert the time_check_out format (if needed)
//         $data['time_check_out'] = $this->input->post('time_check_out');

//         // Continue with status_message and database update
//         $data['status_message'] = $this->input->post('status_message');

//         $this->User_model->update_dataBahanBukti($data, 'evidences');
//         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
//             <h4 class="alert-heading">Barang Kes Berjaya Dikemaskini!</h4>
//             <p>Barang Kes berjaya diubah ke dalam sistem. Anda boleh lihat dalam table.</p>
//             <hr>
//             </div>');
//         redirect('user/bahanbukti');
//     }
// }

      
      /// ANGGOTA 
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

    public function addAnggota()
    {
        $data['title'] = 'Tambah Anggota';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['department_name'] = $this->User_model->get_department_name();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/tambah_anggota'); // Load the view
        $this->load->view('templates/footer', $data);
    }

    public function _rulesAnggota ()
    {
      $this->form_validation->set_rules('anggota_name', 'Nama Anggota', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
      $this->form_validation->set_rules('no_body', 'Nombor Badan', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
      $this->form_validation->set_rules('anggota_email', 'Emel Anggota', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
      $this->form_validation->set_rules('anggota_phoneNumber', 'Nombor Telefon', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
      $this->form_validation->set_rules('anggota_address', 'Alamat Anggota', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
      $this->form_validation->set_rules('department_name', 'Jabatan', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
    }

    public function addAnggota_action()
    {
        $this->_rulesAnggota();

        if ($this->form_validation->run() == FALSE) {
          $this->addAnggota();
        } else {
          $data = array(
            'anggota_name' => $this->input->post('anggota_name'),
            'no_body' => $this->input->post('no_body'),
            'anggota_email' => $this->input->post('anggota_email'),
            'anggota_phoneNumber' => $this->input->post('anggota_phoneNumber'),
            'anggota_address' => $this->input->post('anggota_address'),
            'department_name' => $this->input->post('department_name'),


          );

          $this->User_model->insert_dataAnggota($data,'anggota_menu');
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Rak Baru Berjaya Ditambah!</h4>
          <p>Rak baru berjaya ditambah ke dalam sistem. Anda boleh lihat dalam table.</p>
          <hr>
        </div>');
          redirect('user/anggota');
        }
      
    }


    public function editAnggota($id_anggota)
{
    $data['title'] = 'Kemaskini Anggota';
    $this->_rulesAnggota();
      
    if ($this->form_validation->run() == FALSE) {
        $this->anggota();
    } else {
        $data = array(
            'anggota_id' => $id_anggota,
            'anggota_name' => $this->input->post('anggota_name'),
            'no_body' => $this->input->post('no_body'),
            'anggota_email' => $this->input->post('anggota_email'),
            'anggota_phoneNumber' => $this->input->post('anggota_phoneNumber'),
            'anggota_address' => $this->input->post('anggota_address'),
            'department_name' => $this->input->post('department_name'),
        );

        $this->User_model->update_dataAnggota($data, 'anggota_menu');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Anggota Berjaya Dikemaskini!</h4>
            <p>Anggota berjaya diubah ke dalam sistem. Anda boleh lihat dalam table.</p>
            <hr>
            </div>');
        redirect('user/anggota');
    }
}

    public function printAnggota()
    {
      $data['anggota'] = $this->User_model->getAnggotaData('anggota_menu')->result();
      $this->load->view('user/print_anggota', $data);
    }


    // Untuk tukar password
    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changePassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changePassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changePassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changePassword');
                }
            }
        }
    }

    

      

}