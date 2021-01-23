<?php
class Testimonial_model extends CI_Model
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
        $this->db->update('testimonial', $data);
    }

    public function get_all()
    {
        $sql   = "SELECT * FROM testimonial";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    public function get_active()
    {
        $sql   = "SELECT *  FROM testimonial WHERE status='1'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function testimonial_list_home()
    {
        $sql   = "SELECT *  FROM testimonial WHERE status='1' AND show_home = '1'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_info($id)
    {
        $options = array('id' => $id);
        $query   = $this->db->get_where('testimonial', $options, 1);
        return $query->row_array();
    }
    public function create($file_name)
    {
        $data = array(
            'title'        => $this->input->post('title'),
            'image'       => $file_name,
            'designation' => $this->input->post('designation'),            
            'status'      => $this->input->post('status'),

        );
        $this->db->insert('testimonial', $data);
    }
    public function update($file_name = '')
    {
        $data = array(
             'title'        => $this->input->post('title'),
            'image'       => $file_name,
            'designation' => $this->input->post('designation'),            
            'status'      => $this->input->post('status'),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('testimonial', $data);
    }
    public function delete($id)
    {
        $sql = "delete from testimonial where id='$id'";
        $this->db->query($sql);
    }

        public function soft_delete($id)
    {
        $data = array(
            'delete_status' => 1,
        );
        $this->db->where('id', $id);
        $this->db->update('testimonial', $data);
    }
}
/* End of file banner_management_model.php */
/* Location: ./system/application/models/banner_management_model.php */
