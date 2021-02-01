<?php
class Team_model extends CI_Model
{
    public function __construct()
    {
//parent::CI_Model();
    }

    public function change_status($status, $id)
    {
        if ($status === '1') {
            $status = '0';
        } else {
            if ($status === '0') {
                $status = '1';
            }
        }
        $data = array(
            'status' => $status,
        );
        $this->db->where('id', $id);
        $this->db->update('teams', $data);
    }


    public function change_show_home($status, $id)
    {
        if ($status === '1') {
            $status = '0';
        } else {
            if ($status === '0') {
                $status = '1';
            }
        }
        $data = array(
            'show_home' => $status,
        );
        $this->db->where('id', $id);
        $this->db->update('teams', $data);
    }

    public function get_all()
    {
        $sql   = "SELECT * FROM teams order by id desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_active()
    {
        $sql   = "SELECT *  FROM teams where status=1";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_year()
    {
        $sql   = "SELECT *  FROM team_year where status=1";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_active_home()
    {
        $sql   = "SELECT *  FROM teams WHERE status='1'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function teams_list_home()
    {
        $sql   = "SELECT *  FROM teams WHERE status='1' AND show_home = '1'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_info($id)
    {
        $options = array('id' => $id);
        $query   = $this->db->get_where('teams', $options, 1);
        return $query->row_array();
    }
    public function create($file_name)
    {
        $data = array(
            'name'         => $this->input->post('name'),
            'team_year_id' => $this->input->post('team_year_id'),
            'image'        => $file_name,
            'designation'  => $this->input->post('designation'),
            'show_home'    => $this->input->post('show_home'),
            'rank'         => $this->input->post('rank'),
            'status'       => $this->input->post('status'),

        );
        $this->db->insert('teams', $data);
    }
    public function update($file_name = '')
    {
        $data = array(
            'name'         => $this->input->post('name'),
            'team_year_id' => $this->input->post('team_year_id'),
            'image'        => $file_name,
            'designation'  => $this->input->post('designation'),
            'show_home'    => $this->input->post('show_home'),
            'rank'         => $this->input->post('rank'),
            'status'       => $this->input->post('status'),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('teams', $data);
    }
    public function delete($id)
    {
        $sql = "delete from teams where id='$id'";
        $this->db->query($sql);
    }

    public function soft_delete($id)
    {
        $data = array(
            'delete_status' => 1,
        );
        $this->db->where('id', $id);
        $this->db->update('teams', $data);
    }

     public function team_year_name_by_id($id)
    {
        $query = $this->db->get_where('team_year', array("id" => $id));
        $data  = $query->row_array();
        if ($data['name']) {
            return $data['name'];
        } else {
            return "NONE";
        }
    }
}
/* End of file banner_management_model.php */
/* Location: ./system/application/models/banner_management_model.php */
