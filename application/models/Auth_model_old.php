<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model{

	// registraion
	public function insert_into_users($data)
	{
		$this->db->insert('users',$data);
		return true;
	}

	//is logged in
	public function is_logged_in()
	{
		$user = $this->get_logged_user();
		//check if user logged in
		if ($this->session->userdata('is_user_login') == true && $this->session->userdata('app_key') == $this->config->item('app_key') && !empty($user)) {

			if ($user->status == 0) {
				$this->logout();
				return false;
			} else {
				return true;
			}

		} else {
			$this->logout();
			return false;
		}
	}

	// login function
	public function login($data)
	{
		$query = $this->db->get_where('users', array('email' => $data['email']));
		if ($query->num_rows() == 0){
			return false;
		}
		else{
			//Compare the password attempt with the password we have stored.
			$result = $query->row_array();
		    $validPassword = password_verify($data['password'], $result['password']);
		    if($validPassword){
		        return $result = $query->row_array();
		    }
			
		}
	}

	//login direct
	public function login_direct($user)
	{
		//set user data
		$user_data = array(
			// 'j4t_ses_id' => $user->id,
			// 'j4t_ses_username' => $user->username,
			// 'j4t_ses_email' => $user->email,
			// 'j4t_ses_role' => $user->role,
			// 'j4t_ses_logged_in' => true,
			// 'j4t_ses_app_key' => $this->config->item('app_key'),

			            'user_id'       => $user->id,
                        'email'         => $user->email,
                        'username'      => $user->username,
                        //'username'      => $user['firstname'],
                        'is_user_login' => true,
                        'app_key' => $this->config->item('app_key'),


		);
		$this->session->set_userdata($user_data);
	}


	//login with facebook
	public function login_with_facebook($fb_user)
	{
		if (!empty($fb_user)) {
			$user = $this->get_user_by_email($fb_user->email);
			//check if user registered
			if (empty($user)) {
				if (empty($fb_user->name)) {
					$fb_user->name = "user-" . uniqid();
				}
				$username = $this->generate_uniqe_username($fb_user->name);
				$slug = $this->generate_uniqe_slug($username);
				//add user to database
				$data = array(
					'facebook_id' => $fb_user->id,
					'email' => $fb_user->email,
					'token' => generate_unique_id(),
					'username' => $username,
					'slug' => $slug,
					'avatar' => "https://graph.facebook.com/" . $fb_user->id . "/picture?type=large",
					'user_type' => "facebook",
					'created_at' => date('Y-m-d H:i:s')
				);
				if (!empty($data['email'])) {
					$this->db->insert('users', $data);
					$user = $this->get_user_by_email($fb_user->email);
					$this->login_direct($user);
				}
			} else {
				//login
				$this->login_direct($user);
			}
		}
	}


		//get user by email
	public function get_user_by_email($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		return $query->row();
	}

		//get user by username
	public function get_user_by_username($username)
	{
		$this->db->where('username', $username);
		$query = $this->db->get('users');
		return $query->row();
	}

		//generate uniqe username
	public function generate_uniqe_username($username)
	{
		$new_username = $username;
		if (!empty($this->get_user_by_username($new_username))) {
			$new_username = $username . " 1";
			if (!empty($this->get_user_by_username($new_username))) {
				$new_username = $username . " 2";
				if (!empty($this->get_user_by_username($new_username))) {
					$new_username = $username . " 3";
					if (!empty($this->get_user_by_username($new_username))) {
						$new_username = $username . "-" . uniqid();
					}
				}
			}
		}
		return $new_username;
	}


		//generate uniqe slug
	public function generate_uniqe_slug($username)
	{
		$slug = str_slug($username);
		if (!empty($this->get_user_by_slug($slug))) {
			$slug = str_slug($username . "-1");
			if (!empty($this->get_user_by_slug($slug))) {
				$slug = str_slug($username . "-2");
				if (!empty($this->get_user_by_slug($slug))) {
					$slug = str_slug($username . "-3");
					if (!empty($this->get_user_by_slug($slug))) {
						$slug = str_slug($username . "-" . uniqid());
					}
				}
			}
		}
		return $slug;
	}

	//get user by slug
	public function get_user_by_slug($slug)
	{
		$query = $this->db->get_where('users', array('slug' => $slug));
		return $query->row();
	}


   //--------------------------------------------------------------------
   //Email verification and active the account
	public function email_verification($activation_code)
	{
		$this->db->select('email, is_active');
		$this->db->from('users');
		$this->db->where('activation_code', $activation_code);
		$query = $this->db->get();
		$result= $query->result_array();
		$match = count($result);
		if($match > 0){
			$this->db->where('activation_code', $activation_code);
			$this->db->update('users', array('is_verify' => 1, 'activation_code'=> ''));
			return true;
		}
		else{
			return false;
			}
	}

	//============ Check User Email ============
    function check_user_mail($email)
    {
    	$result = $this->db->get_where('users', array('email' => $email));

    	if($result->num_rows() > 0){
    		$result = $result->row_array();
    		return $result;
    	}
    	else {
    		return false;
    	}
    }

    //============ Update Reset Code Function ===================
    public function update_reset_code($reset_code, $user_id)
    {
    	$data = array('password_reset_code' => $reset_code);
    	$this->db->where('id', $user_id);
    	$this->db->update('users', $data);
    }

    //============ Activation code for Password Reset Function ===================
    public function check_password_reset_code($code)
    {

    	$result = $this->db->get_where('users',  array('password_reset_code' => $code ));
    	if($result->num_rows() > 0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    
    //============ Reset Password ===================
    public function reset_password($id, $new_password){
	    $data = array(
			'password_reset_code' => '',
			'password' => $new_password
	    );
		$this->db->where('password_reset_code', $id);
		$this->db->update('users', $data);
		return true;
    }


}

?>