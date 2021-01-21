<?php defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    //--------------------------------------------------------------
    public function index()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            redirect(ADMIN_PATH . '/dashboard');
        } else {
            redirect(ADMIN_PATH . '/admin/login');
        }
    }

    //-------------------------------------------------------
    function list() {
        if (!$this->session->has_userdata('admin_id')) {
            redirect(ADMIN_PATH . '/admin/login', 'refresh');
        }
        $data['records'] = $this->Admin_model->get_admin_list();
        $data['view']    = 'admin/auth/admin_list';
        $this->load->view('admin/layout', $data);
    }

    //--------------------------------------------------------------
    public function login()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            redirect('admin/dashboard');
        }
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == false) {
                $this->load->view('admin/auth/login');
            } else {
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                );
                $result = $this->Admin_model->login($data);
                if ($result) {
                    if ($result['status'] == 0) {
                        $this->session->set_flashdata('warning', 'Your Account has been Banned!');
                        redirect(ADMIN_PATH . '/admin/login');
                        //redirect(base_url('admin/auth/login'));
                        exit;
                    }
                    if ($result['status'] == 1) {
                        $admin_data = array(
                            'admin_id'       => $result['id'],
                            'firstname'      => $result['firstname'],
                            'lastname'       => $result['lastname'],
                            'username'       => $result['username'],
                            'role'           => $result['role'],
                            'is_admin_login' => true,

                        );
                        $this->session->set_userdata($admin_data);
                        redirect(ADMIN_PATH . '/dashboard', 'refresh');
                        //redirect(base_url('admin/dashboard'), 'refresh');
                    }
                } else {
                    // $data['msg'] = 'Invalid Username or Password!';
                    $this->session->set_flashdata('warning', 'Invalid Username or Password!');
                    $this->load->view('admin/auth/login', $data);
                }
            }
        } else {

            $this->load->view('admin/auth/login');
        }
    }

    //-------------------------------------------------------
    public function register()
    {
        if (!$this->session->has_userdata('admin_id')) {
            redirect(ADMIN_PATH . '/admin/login', 'refresh');
        }

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[admin.username]');
            $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('role', 'Role', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');

            if ($this->form_validation->run() == false) {
                $data['view'] = 'admin/auth/register';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    'username'        => $this->input->post('username'),
                    'firstname'       => $this->input->post('firstname'),
                    'lastname'        => $this->input->post('lastname'),
                    'email'           => $this->input->post('email'),
                    'password'        => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'role'            => $this->input->post('role'),
                    'status'          => $this->input->post('status'),
                    'created_at'      => date('Y-m-d : h:m:s'),
                    'updated_at'      => date('Y-m-d : h:m:s'),
                    'last_login_date' => '',
                    'last_ip'         => $this->input->ip_address(),

                );
                $data   = $this->security->xss_clean($data);
                $result = $this->Admin_model->register($data);
                if ($result) {
                    $this->session->set_flashdata('success', 'Admin User has been added successfully!');
                    redirect(ADMIN_PATH . '/admin/list');
                }
            }
        } else {
            $data['view'] = 'admin/auth/register';
            $this->load->view('admin/layout', $data);
        }

    }

    //--------------------------------------------------------
    // Edit Admin user
    public function edit($id = 0)
    {
        //  if($id==superadmin_developer_id){
        //     redirect(ADMIN_PATH . '/admin/list');
        //  }
        if (!$this->session->has_userdata('admin_id')) {
            redirect(ADMIN_PATH . '/admin/login', 'refresh');
        }

        // if ($this->session->userdata('role') !== "1") {
        //     redirect(ADMIN_PATH . '/dashboard', 'refresh');
        // }

        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('firstname', 'Firstname', 'trim|required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
            $this->form_validation->set_rules('role', 'Role', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required');

            if ($this->form_validation->run() == false) {
                $data = array(
                    'errors' => validation_errors(),
                );

                $this->session->set_flashdata('error', $data['errors']);
                redirect(ADMIN_PATH . '/admin/edit/' . $id, 'refresh');

            } else {

                $data = array(
                    'username'   => $this->input->post('username'),
                    'firstname'  => $this->input->post('firstname'),
                    'lastname'   => $this->input->post('lastname'),
                    'email'      => $this->input->post('email'),
                    'role'       => $this->input->post('role'),
                    'status'     => $this->input->post('status'),
                    'updated_at' => date('Y-m-d : h:m:s'),
                    'last_ip'    => $this->input->ip_address(),
                );
                $data = $this->security->xss_clean($data);

                $this->Admin_model->update($data, $id);

                $this->session->set_flashdata('success', 'Congratulation! Admin User has been Updated successfully');
                 redirect(ADMIN_PATH . '/admin/list/', 'refresh');

            }
        } else {

            $data['info']  = $info  = $this->Admin_model->get_admin_user_detail($id);
            $data['title'] = 'Edit Admin User';
            $data['view']  = 'admin/auth/update';
            $this->load->view('admin/layout', $data);
        }
    }

    //-------------------------------------------------------------------------
    public function update_admin_password()
    {
        if (!$this->session->has_userdata('admin_id')) {
            redirect(ADMIN_PATH . '/admin/login', 'refresh');
        }

        if ($this->session->userdata('role') !== "1") {
            redirect(ADMIN_PATH . '/dashboard', 'refresh');
        }

        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('id', 'Username', 'trim|required');
            if ($this->form_validation->run() == false) {
                $data['admin_user'] = $this->Admin_model->get_admin_list();
                $data['view']       = 'admin/auth/update_any_admin_password';
                $this->load->view('admin/layout', $data);
            } else {
                $id   = $this->input->post('id');
                $data = array(
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                );
                $data   = $this->security->xss_clean($data);
                $result = $this->Admin_model->update_any_admin_password($data, $id);
                if ($result) {
                    $this->session->set_flashdata('success', 'Password has been changed successfully!');
                    redirect(ADMIN_PATH . '/admin/list', 'refresh');
                }
            }
        } else {
            $data['admin_user'] = $this->Admin_model->get_admin_list();
            $data['title']      = 'Change Password';
            $data['view']       = 'admin/auth/update_any_admin_password';
            $this->load->view('admin/layout', $data);
        }
    }

    //--------------------------------------------------------------------------------------
    public function change_password_old()
    {
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect(ADMIN_PATH . '/admin/login', 'refresh');
        }
        if ($this->input->post('update_password')) {
            $id = $this->session->userdata('admin_id');
            $this->form_validation->set_rules('old_password', 'old password', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('new_password', 'new password', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required|min_length[3]|matches[new_password]');
            if ($this->form_validation->run() == false) {
                $data = array(
                    'errors' => validation_errors(),
                );
                $this->session->set_flashdata('error_update_password', $data['errors']);
                redirect(ADMIN_PATH . '/admin/change_password', 'refresh');

            } else {
                $data = array(
                    'id'           => $id,
                    'old_password' => $this->input->post('old_password'),
                    'password'     => $this->input->post('new_password'),
                );

                $result = $this->Admin_model->update_password($data, $id);

                if ($result) {
                    $this->session->set_flashdata('success', 'password has been Successfully updated');

                    redirect(ADMIN_PATH . '/admin/change_password', 'refresh');
                } else {
                    $this->session->set_flashdata('errors', 'Old Password is incorrect');
                    redirect(ADMIN_PATH . '/admin/change_password', 'refresh');
                }
            }
        } else {
            $id            = $this->session->userdata('admin_id');
            $data['title'] = 'Change Password';
            $data['view']  = 'admin/auth/change_password';
            $this->load->view('admin/layout', $data);
        }
    }

    //-------------------------------------------------------------------------
    public function change_password()
    {
         if (!$this->session->has_userdata('admin_id')) {
            redirect(ADMIN_PATH . '/admin/login', 'refresh');
        }
        
        $id = $this->session->userdata('admin_id');
        if ($this->input->post('update_password')) {
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_pwd', 'Confirm Password', 'trim|required|matches[password]');
            if ($this->form_validation->run() == false) {
              
                $data['view'] = 'admin/auth/change_password';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                );
                $data   = $this->security->xss_clean($data);
                $result = $this->Admin_model->change_password($data, $id);
                if ($result) {
                    $this->session->set_flashdata('success', 'Password has been changed successfully!');
                    redirect(ADMIN_PATH . '/admin/change_password', 'refresh');
                }
            }
        } else {
             
            $data['title'] = 'Change Password';
            $data['view']  = 'admin/auth/change_password';
            $this->load->view('admin/layout', $data);
        }
    }

    //-------------------------------------------------------
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(ADMIN_PATH . '/admin/login', 'refresh');
    }
} // end class
