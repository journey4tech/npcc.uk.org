<?php
class Category_model extends CI_Model
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
        $this->db->update('categories', $data);
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
        $this->db->update('categories', $data);
    }
    public function get_active_show_home()
    {
        $sql   = "SELECT * FROM categories WHERE status='1' AND show_home ='1'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_all()
    {
        $sql   = "SELECT * FROM categories ORDER BY rank ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_info($id)
    {
        $options = array('id' => $id);
        $query   = $this->db->get_where('categories', $options, 1);
        return $query->row_array();
    }
    public function get_not_deleted()
    {
        $query = $this->db->get_where('categories', array('delete_status' => 0));
        return $query->result_array();
    }
    public function get_active()
    {
        $query = $this->db->get_where('categories', array('status' => 1));
        return $query->result_array();
    }
    public function create($file_name)
    {
        $data = array(
            'name'             => $this->input->post('name'),
            'slug'             => $this->input->post('slug'),
            'image'            => $file_name,
            'rank'             => $this->input->post('rank'),
            'show_home'        => $this->input->post('show_home'),
            'content'          => $this->input->post('content'),
            'meta_title'       => $this->input->post('meta_title'),
            'meta_keyword'     => $this->input->post('meta_keyword'),
            'meta_description' => $this->input->post('meta_description'),
            'status'           => $this->input->post('status'),
            'created_by'       => '',
            'created_at'       => date('Y-m-d H:i:s'),
            'modified_by'        => '',
            'updated_at'       => '',

        );
        $this->db->insert('categories', $data);
    }
    public function update($file_name = '')
    {
        $data = array(
            'name'             => $this->input->post('name'),
            'slug'             => $this->input->post('slug'),
            'image'            => $file_name,
            'rank'             => $this->input->post('rank'),
            'show_home'        => $this->input->post('show_home'),
            'content'          => $this->input->post('content'),
            'meta_title'       => $this->input->post('meta_title'),
            'meta_keyword'     => $this->input->post('meta_keyword'),
            'meta_description' => $this->input->post('meta_description'),
            'status'           => $this->input->post('status'),
           // 'created_by'       => '',
            //'created_at'       => date('Y-m-d H:i:s'),
            'modified_by'        => '',
            'updated_at'       => date('Y-m-d H:i:s'),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('categories', $data);
    }
    public function soft_delete($id)
    {
        $sql = "delete from categories where id='$id'";
        $this->db->query($sql);
    }
    public function delete($id)
    {
        $sql = "delete from categories where id='$id'";
        $this->db->query($sql);
    }
    public function category_name_by_id($id)
    {
        $query = $this->db->get_where('categories', array("id" => $id));
        $data  = $query->row_array();
        if ($data['name']) {
            return $data['name'];
        } else {
            return "NONE";
        }
    }
}
/* End of file category_management_model.php */
/* Location: ./system/application/models/category_management_model.php */
