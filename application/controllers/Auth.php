<?php defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'auth_model');
        $this->load->library('mailer'); // load custom mailer library
        $this->load->helper('email');

        // $global_data['general_settings'] = $this->setting_model->get_general_settings();
        // $this->general_settings          = $global_data['general_settings'];
    }

    //-------------------------------------------------------------------
    // login functionality
    public function login()
    {
        if ($this->session->userdata('user_id')) {
           // redirect(site_url('profile'));
            redirect(base_url());
        }

        if ($this->input->post('login')) {
            //validate inputs
            $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[3]|valid_email');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[3]');

            if ($this->form_validation->run() == false) {
                $data = array(
                    'errors' => validation_errors(),
                );

                $this->session->set_flashdata('error_login', $data['errors']);
                redirect(base_url('auth/login'), 'refresh');
            } else {

                $data = array(
                    'email'    => $this->input->post('email'),
                    'password' => $this->input->post('password'),
                );

                $data = $this->security->xss_clean($data); // XSS Clean

                $result = $this->auth_model->login($data);
                 if ($result['status'] == 0) {
                        $this->session->set_flashdata('warning', 'Your Account has been Banned!');
                        redirect(base_url('auth/login'));
                        exit;
                    }
                 if ($result['is_verify'] == 0) {
                        $this->session->set_flashdata('warning', 'Please Verify your Email!');
                        redirect(base_url('auth/login'));
                        exit;
                    }


                if ($result) {
                    $login_data = array(
                        'user_id'       => $result['id'],
                        'email'         => $result['email'],
                        'password'      => $result['password'],
                        'username'      => $result['firstname'],
                        'is_user_login' => true,
                    );

                    $this->session->set_userdata($login_data);

                    // redirected to last request page
                    if (!empty($this->session->userdata('last_request_page'))) {
                        $back_to = $this->session->userdata('last_request_page');
                        redirect($back_to);
                    } else {
                        redirect(base_url('profile'), 'refresh');
                    }
                } else {
                    $this->session->set_flashdata('error_login', 'invalid email or password');
                    redirect(base_url('auth/login'), 'refresh');
                }
            }
        } else {
            $data['title']            = 'Login';
            $data['meta_description'] = 'User Login Pannel';
            $data['keywords']         = 'User Login';

            $data['main'] = 'auth/login_page';
            $this->load->view('index', $data);
        }
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
            $this->form_validation->set_rules('termsncondition', 'terms n condition', 'required');

            if ($this->form_validation->run() == false) {
                $data = array(
                    'errors' => validation_errors(),
                );
                $this->session->set_flashdata('validation_errors', $data['errors']);
                redirect(base_url('auth/registration'));
            } else {
                $rand_no        = rand(0, 1000);
                $acivation_code = md5($rand_no);
                $data           = array(
                    'firstname'       => $this->input->post('firstname'),
                    'lastname'        => $this->input->post('lastname'),
                    'email'           => $this->input->post('email'),
                    'password'        => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'source'          => 'direct',
                    'activation_code' => $acivation_code,
                    'created_date'    => date('Y-m-d : h:m:s'),
                    'updated_date'    => date('Y-m-d : h:m:s'),
                );

                $data = $this->security->xss_clean($data); // XSS Clean Data

                $result = $this->auth_model->insert_into_users($data);
                if ($result) {
                    // --- sending email
                    $name           = $data['firstname'] . ' ' . $data['lastname'];
                    $email          = $data['email'];
                    $acivation_link = base_url('auth/email_verify/' . $acivation_code);
                    $body           = $this->mailer->email_verification($name, $acivation_link);

                    $this->load->helper('email_helper');
                    $to      = $email;
                    $subject = 'Verify your email';
                    $message = $body;
                    $email   = sendEmail($to, $subject, $message, $file = '', $cc = '');
                    // print_r($email); exit();
                    if ($email) {
                        $this->session->set_flashdata('success', 'We have sent instructions for resetting your password to your email');

                        // redirect(base_url('auth/forgot_password'));
                        echo "mail send";
                    } else {
                        $this->session->set_flashdata('error', 'There is the problem on your email');
                        echo "not send";
                        //redirect(base_url('auth/forgot_password'));
                    }
                }
            }
        } else {
            $data['title']  = 'Registration';
            $data['layout'] = 'auth/registration_page';
            $this->load->view('layout', $data);
        }
    }

    //--------------------------------------------------
    public function forgot_password()
    {
        if ($this->input->post('submit')) {

            //validate inputs
            $this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
            if ($this->form_validation->run() == false) {
                $data = array(
                    'errors' => validation_errors(),
                );
                $this->session->set_flashdata('error', $data['errors']);
                redirect(base_url('auth/forgot_password'));
            }
            $email = $this->input->post('email');

            $response = $this->auth_model->check_user_mail($email); // check if email exist

            if ($response) {
                $rand_no        = rand(0, 1000);
                $pwd_reset_code = md5($rand_no . $response['id']);
                $this->auth_model->update_reset_code($pwd_reset_code, $response['id']);

                // --- sending email
                $name       = $response['firstname'] . ' ' . $response['lastname'];
                $email      = $response['email'];
                $reset_link = base_url('auth/reset_password/' . $pwd_reset_code);
               // $logo       = base_url($this->general_settings['logo']);
                $logo       = "http://localhost/classified/user_upload/images/classi.jpg";
               // print_r($logo); exit();
                $body       = $this->mailer->pwd_reset_link($name, $reset_link, $logo);

                $this->load->helper('email_helper');
                $to      = $email;
                $subject = 'Reset your password';
                $message = $body;
                $email   = sendEmail($to, $subject, $message, $file = '', $cc = '');

                if ($email) {
                    $this->session->set_flashdata('success', 'We have sent instructions for resetting your password to your email');

                    redirect(base_url('auth/forgot_password'));
                } else {
                    $this->session->set_flashdata('error', 'There is the problem on your email');
                    redirect(base_url('auth/forgot_password'));
                }
            } else {
                $this->session->set_flashdata('error', 'The Email that you provided are invalid');
                redirect(base_url('auth/forgot_password'));
            }
        } else {
            $data['title']            = 'Forget Password';
            $data['meta_description'] = 'your meta description here';
            $data['keywords']         = 'meta tags here';

            $data['layout'] = 'auth/forget_password_page';
            $this->load->view('layout', $data);
        }
    }

    //----------------------------------------------------------------
    public function reset_password($id = 0)
    {
        // check the activation code in database
        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

            if ($this->form_validation->run() == false) {
                $result             = false;
                $data['reset_code'] = $id;
                $data['title']      = 'Reseat Password';
                $data['layout']     = 'auth/reset_password_page';
                $this->load->view('layout', $data);
            } else {
                $new_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
                $this->auth_model->reset_password($id, $new_password);
                $this->session->set_flashdata('success', 'New password has been Updated successfully.Please login below');
                redirect(base_url('auth/login'));
            }
        } else {
            $result = $this->auth_model->check_password_reset_code($id);
            if ($result) {
                $data['reset_code'] = $id;
                $data['title']      = 'Reseat Password';
                $data['layout']     = 'auth/reset_password_page';
                $this->load->view('layout', $data);
            } else {
                $this->session->set_flashdata('error', 'Password Reset Code is either invalid or expired.');
                redirect(base_url('auth/forgot_password'));
            }
        }
    }

    //----------------------------------------------------------------------------
    // Logout Function
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }

    public function email_verify($activation_code)
    {
        if ($this->auth_model->email_verification($activation_code) == true) {
            redirect('register/successed/');
        } else {
            redirect('register/failed/');
        }
    }

    /**
     * Connect with Facebook
     */
    public function connect_with_facebook_old()
    {
        //include facebook login
        require_once APPPATH . "third_party/facebook/vendor/autoload.php";

        $fb_url = "https://www.facebook.com/v3.3/dialog/oauth?client_id=" . $this->general_settings->facebook_app_id . "&redirect_uri=" . base_url() . "facebook-callback&scope=email&state=" . generate_unique_id();

        $this->session->set_userdata('fb_login_referrer', $this->agent->referrer());
        redirect($fb_url);
        exit();
    }

    public function connect_with_facebook()
    {
        //include facebook login
        require_once APPPATH . "third_party/facebook/vendor/autoload.php";

        $fb_url = "https://www.facebook.com/v3.3/dialog/oauth?client_id=347336248630932&redirect_uri=" . base_url() . "facebook-callback&scope=email&state=" . generate_unique_id();

        $this->session->set_userdata('fb_login_referrer', $this->agent->referrer());
        redirect($fb_url);
        exit();
    }

    /**
     * Facebook Callback
     */
    public function facebook_callback()
    {
        //include facebook login
        require_once APPPATH . "third_party/facebook/vendor/autoload.php";

        $fb = new \Facebook\Facebook([
            'app_id'=>'347336248630932',
            'app_secret'=>'3b4d902a47a7fbe7000ed5c9d5eeda71',
            //'app_id' => $this->general_settings->facebook_app_id,
          //  'app_secret' => $this->general_settings->facebook_app_secret,
            'default_graph_version' => 'v2.10',
        ]);
        try {
            $helper = $fb->getRedirectLoginHelper();
            $permissions = ['email'];
            if (isset($_GET['state'])) {
                $helper->getPersistentDataHandler()->set('state', $_GET['state']);
            }
            $accessToken = $helper->getAccessToken();
            $response = $fb->get('/me?fields=name,email', $accessToken);
        } catch (\Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (\Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $user = $response->getGraphUser();
        $fb_user = new stdClass();
        $fb_user->id = $user->getId();
        $fb_user->email = $user->getEmail();
        $fb_user->name = $user->getName();

        $this->auth_model->login_with_facebook($fb_user);

        if (!empty($this->session->userdata('fb_login_referrer'))) {
            redirect($this->session->userdata('fb_login_referrer'));
        } else {
            redirect(base_url());
            //redirect(base_url . '/classified', 'refresh');
        }
    }


} // endClass
