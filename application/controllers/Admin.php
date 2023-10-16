<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 

{

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Admin_model');
    }

    



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
      $data['title'] = 'Urus jabatan';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['department'] = $this->Admin_model->getDepartmentData('department_menu')->result();

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

    //manage account
    public function staff()
    {
      $data['title'] = 'Urus Akaun';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['staff'] = $this->Admin_model->getStaffData('user')->result();
     

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/staff', $data);
      $this->load->view('templates/footer', $data);

    }

    public function addStaff()
    {
        $data['title'] = 'Tambah Akaun Staf';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    
        // Load your Admin_model and call the get_role method
        $this->load->model('Admin_model');
        $data['roles'] = $this->Admin_model->get_role(); // Ensure that the method returns role data
    
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah_staff', $data); // Pass $data to the view
        $this->load->view('templates/footer', $data);
    }

    public function _rulesStaff ()
    {
      $this->form_validation->set_rules('name', 'Nama', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
      $this->form_validation->set_rules('email', 'Email', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
      $this->form_validation->set_rules('password', 'Kata Laluan', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
      $this->form_validation->set_rules('role', 'Role', 'required', array(
        'required' => '%s Wajib diisi !!'
      ));
    }

    public function addStaff_action()
{
    $this->_rulesStaff();

    if ($this->form_validation->run() == FALSE) {
        $this->addStaff();
    } else {
        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // You can adjust the maximum file size as needed

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            // Handle the file upload error, if any
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            // File uploaded successfully
            $upload_data = $this->upload->data();

            // Map the role name to role_id
            $selectedRole = $this->input->post('role');
            $role_id = ($selectedRole == 'admin') ? 1 : 2; // Assuming 'admin' maps to role_id 1 and 'staff' maps to role_id 2

            $email = $this->input->post('email');
            $data = array(
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $role_id, // Set role_id based on the selected role
                'image' => $upload_data['file_name'], // Store the file name in the database
                'date_created' => time()
            );

            $this->Admin_model->insert_dataStaff($data, 'user');

            // Email token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            // Insert the user_token data
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Akaun Baru Berjaya Ditambah!</h4>
                <p>Akaun baru berjaya ditambah ke dalam sistem. Anda boleh lihat dalam table.</p>
                <hr>
            </div>');
            redirect('admin/staff');
        }
    }
}



    private function _sendEmail($token, $type)
    {
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'eimanhakimy83@gmail.com',
            'smtp_pass' => 'nifbyjqkuwyqrxgr',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
          );

        $this->load->library('email', $config);
       

        $this->email->from('example@gmail.com', 'Admin IPD Kedah');
        $this->email->to($this->input->post('email'));


            $type == 'verify';
            $this->email->subject('Account Verification');
            $this->email->message('Admin telah menciptakan akaun untuk anda untuk menggunakan "Sistem Penyimpanan Barang Kes". Dibawah ini disertakan dengan maklumat akaun anda.:<br><br>
            Emel: ' . $this->input->post('email') . '<br>
            Kata Laluan: ' . $this->input->post('password') . '<br><br>
            Sebelum boleh menggunakan sistem ini, anda perlu mengaktifkan akaun anda terlebih dahulu: <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan Akaun Anda</a>');
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('auth');
        }
    }
    

    

  





}