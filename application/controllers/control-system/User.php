<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['records'] = $this->User_model->get_all_user();
        $data['view']    = 'admin/users/index';
        $this->load->view('admin/layout', $data);

    }

    public function show($id)
    {
        $data['user'] = $this->User_model->get_info($id);
        $data['view'] = 'admin/users/show';
        $this->load->view('admin/layout', $data);
    }

    public function suspend($id = '')
    {
        $this->User_model->change_status($id);
        redirect($this->agent->referrer());
        // redirect(ADMIN_PATH . '/users', 'refresh');
    }

    public function soft_delete($id)
    {
        $this->User_model->soft_delete($id);
        $this->session->set_flashdata('message', 'Trashed');
        redirect(ADMIN_PATH . '/category', 'refresh');
    }
    //-------------------------------------------------------------------------------
    // Registration Functionality
    public function registration()
    {
        if ($this->input->post('submit')) {
            //validate inputs
            $this->form_validation->set_rules('firstname', 'firstname', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('lastname', 'lastname', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[5]|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('confirmpassword', 'confirm password', 'trim|required|min_length[3]|matches[password]');

            if ($this->form_validation->run() == false) {
                $data = array(
                    'errors' => validation_errors(),
                );
                $this->session->set_flashdata('validation_errors', $data['errors']);
                redirect(ADMIN_PATH . '/user/registration', 'refresh');
            } else {

                $data = array(
                    'firstname'    => $this->input->post('firstname'),
                    'lastname'     => $this->input->post('lastname'),
                    'email'        => $this->input->post('email'),
                    'password'     => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'source'       => 'added_by_admin',
                    'created_date' => date('Y-m-d : h:m:s'),
                    'updated_date' => date('Y-m-d : h:m:s'),
                );

                $data = $this->security->xss_clean($data); // XSS Clean Data

                $result = $this->User_model->registration($data);
                if ($result) {

                    $this->session->set_flashdata('success', 'User has been added successfully !');

                    redirect(ADMIN_PATH . '/user', 'refresh');
                }
            }

        } else {
            $data['title']  = 'User Registration';
            $data['view'] = 'admin/users/registration';
            $this->load->view('admin/layout', $data);
        }
    }

}
