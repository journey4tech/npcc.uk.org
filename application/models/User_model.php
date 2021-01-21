<?php defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model
{
    //============ Get all users ============
    public function get_all_user()
    {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result_array();
    }
    //============ registraion ===============
    public function registration($data)
    {
        $this->db->insert('users', $data);
        return true;
    }
    //============get user by email============
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

    //============ Check User Email ============
    public function check_user_mail($email)
    {
        $result = $this->db->get_where('users', array('email' => $email));
        if ($result->num_rows() > 0) {
            $result = $result->row_array();
            return $result;
        } else {
            return false;
        }
    }

}
