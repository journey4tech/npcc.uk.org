<?php
class Video_model extends CI_Model
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
        $this->db->update('videos', $data);
    }
    public function change_show_menu($show_home, $id)
    {
        if ($show_home === '1') {
            $show_home = '0';
        } else {
            if ($show_home === '0') {
                $show_home = '1';
            }
        }
        $data = array(
            'show_home' => $show_home,
        );
        $this->db->where('id', $id);
        $this->db->update('videos', $data);
    }
    public function get_all()
    {
        $sql   = "SELECT * FROM videos";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_info($id)
    {
        $options = array('id' => $id);
        $query   = $this->db->get_where('videos', $options, 1);
        return $query->row_array();
    }
    public function get_not_deleted()
    {
        $query = $this->db->get_where('videos', array('delete_status' => 0));
        return $query->result_array();
    }
    public function get_active()
    {
        $query = $this->db->get_where('videos', array('status' => 1));
        return $query->result_array();
    }
    public function create()
    {
        $data = array(
            'title'      => $this->input->post('title'),
            'show_home' => $this->input->post('show_home'),
            'link'      => $this->input->post('link'),
            'status'    => $this->input->post('status'),
        );
        $this->db->insert('videos', $data);
    }
    public function update()
    {
        $data = array(
            'title'      => $this->input->post('title'),
            'show_home' => $this->input->post('show_home'),
            'link'      => $this->input->post('link'),
            'status'    => $this->input->post('status'),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('videos', $data);
    }
    public function soft_delete($id)
    {
        $sql = "delete from videos where id='$id'";
        $this->db->query($sql);
    }
    public function delete($id)
    {
        $sql = "delete from videos where id='$id'";
        $this->db->query($sql);
    }
    public function category_name_by_id($id)
    {
        $query = $this->db->get_where('videos', array("id" => $id));
        $data  = $query->row_array();
        if ($data['title']) {
            return $data['title'];
        } else {
            return "NONE";
        }
    }
}
/* End of file category_management_model.php */
/* Location: ./system/application/models/category_management_model.php */
