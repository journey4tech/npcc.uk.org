<?php defined('BASEPATH') or exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function get_admin_list()
    {
        $this->db->select('*');
        $this->db->from('admin');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_admin_user_detail($id)
    {
        $query         = $this->db->get_where('admin', array('id' => $id));
        return $result = $query->row_array();
    }

    //--------------------------------------------------------------------
    public function register($data)
    {
        $this->db->insert('admin', $data);
        return true;
    }

    //-----------------------------------------------------
    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('admin', $data);
        return true;

    }

       //--------------------------------------------------------------------
        public function change_password($data, $id){
            $this->db->where('id', $id);
            $this->db->update('admin', $data);
            return true;
        }

    // login function
    public function login($data)
    {
        $query = $this->db->get_where('admin', array('username' => $data['username']));
        if ($query->num_rows() == 0) {
            return false;
        } else {
            $result        = $query->row_array();
            $validPassword = password_verify($data['password'], $result['password']);
            //generate for new password
            //$p = password_hash($data['password'] , PASSWORD_BCRYPT);
            //print_r($p); exit();
            if ($validPassword) {
                return $result = $query->row_array();
            }
        }
    }

    //-------------------------------------------------------
    // Update New password
    public function update_any_admin_password($data, $id)
    {
        $query  = $this->db->get_where('admin', array('id' => $id));
        $result = $query->row_array();
        // print_r($result); exit();
        if ($result) {
            $this->db->where('id', $id);
            $this->db->update('admin', array('password' => $data['password']));
            return true;
        } else {
            return false;
        }
    }

    //-------------------------------------------------------
    // Update New password
    public function update_password($data, $id)
    {
        $query  = $this->db->get_where('admin', array('id' => $id));
        $result = $query->row_array();
        // print_r($result); exit();
        if ($result['password'] == $data['old_password']) {
            $this->db->where('id', $id);
            $this->db->update('admin', array('password' => $data['password']));
            return true;
        } else {
            return false;
        }
    }

//============ Check User Email ============
    public function check_admin_mail($email)
    {
        $result = $this->db->get_where('admin', array('email' => $email));
        if ($result->num_rows() > 0) {
            $result = $result->row_array();
            return $result;
        } else {
            return false;
        }
    }
}
