<?php
class Banner_model extends CI_Model
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
        $this->db->update('banners', $data);
    }

    public function get_all()
    {
        $sql   = "SELECT * FROM banners";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_active()
    {
        $sql   = "SELECT *  FROM banners WHERE status='1' order by position Desc";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function banners_list_home()
    {
        $sql   = "SELECT *  FROM banners WHERE status='1' AND show_home = '1'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_info($id)
    {
        $options = array('id' => $id);
        $query   = $this->db->get_where('banners', $options, 1);
        return $query->row_array();
    }
    public function create($file_name)
    {
        $data = array(
            'title'    => $this->input->post('title'),
            'tag'      => $this->input->post('tag'),
            'ban_url'  => $this->input->post('ban_url'),
            'image'    => $file_name,
            'position' => $this->input->post('position'),
            'status'   => $this->input->post('status'),

        );
        $this->db->insert('banners', $data);
    }
    public function update($file_name = '')
    {
        $data = array(
            'title'    => $this->input->post('title'),
            'tag'      => $this->input->post('tag'),
            'ban_url'  => $this->input->post('ban_url'),
            'image'    => $file_name,
            'position' => $this->input->post('position'),
            'status'   => $this->input->post('status'),

        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('banners', $data);
    }
    public function delete($id)
    {
        $sql = "delete from banners where id='$id'";
        $this->db->query($sql);
    }

    public function soft_delete($id)
    {
        $data = array(
            'delete_status' => 1,
        );
        $this->db->where('id', $id);
        $this->db->update('banners', $data);
    }
}
/* End of file banners_model.php */
/* Location: ./system/application/models/banners_model.php */
