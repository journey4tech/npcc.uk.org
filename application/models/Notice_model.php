<?php

class Notice_model extends CI_Model
{

    public function __construct()
    {
        //parent::CI_Model();
    }


    public function get_active_page()
    {
        $sql   = "SELECT * FROM notice WHERE status='1'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    // public function get_page_by_slug($slug)
    // {
    //     $options = array('slug' => $slug);
    //     $query   = $this->db->get_where('notice', $options, 1);
    //     return $query->row_array();
    // }
    public function get_active_home()
    {
        $sql   = "SELECT * FROM notice WHERE status = 1 LIMIT 8";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    public function get_all()
    {
        $sql   = "SELECT * FROM notice";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_page_home()
    {

        $sql = "SELECT * FROM notice WHERE status='1'";

        $query = $this->db->query($sql);

        return $query->result_array();
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
        $this->db->update('notice', $data);
    }

    public function get_info($id)
    {
        $options = array('id' => $id);
        $query   = $this->db->get_where('notice', $options, 1);

        return $query->row_array();

    }

    public function create()
    {

        $data = array(
            'title'           => $this->input->post('title'),
            'description'      => $this->input->post('description'),
            'status'           => $this->input->post('status'),
        );

        $this->db->insert('notice', $data);
    }

    public function update()
    {

        $data = array(
          'title'           => $this->input->post('title'),
 
          'description'      => $this->input->post('description'),
            'status'           => $this->input->post('status'),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('notice', $data);

    }

    // public function soft_delete($id)
    // {
    //     $sql = "delete from notice where id='$id'";
    //     $this->db->query($sql);
    // }

    public function delete($id)
    {
        $sql = "delete from notice where id='$id'";
        $this->db->query($sql);
    }

}

/* End of file Page_model.php */
