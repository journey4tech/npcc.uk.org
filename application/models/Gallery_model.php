<?php

class Gallery_model extends CI_Model
{

    public function __construct()
    {
        //parent::CI_Model();
    }


    public function get_active_home()
    {
        $sql   = "SELECT * FROM gallery WHERE status='1' limit 8";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_page_by_slug($slug)
    {
        $options = array('slug' => $slug);
        $query   = $this->db->get_where('gallery', $options, 1);
        return $query->row_array();
    }



    public function get_all()
    {
        $sql   = "SELECT * FROM gallery";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_page_home()
    {

        $sql = "SELECT * FROM gallery WHERE status='1'";

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
        $this->db->update('gallery', $data);
    }

    public function get_info($id)
    {
        $options = array('id' => $id);
        $query   = $this->db->get_where('gallery', $options, 1);

        return $query->row_array();

    }

    public function create($file_name)
    {

        $data = array(
              'title'            => $this->input->post('title'),
            
            'image'            => $file_name,
           
        );

        $this->db->insert('gallery', $data);
    }

    public function update($file_name = '')
    {

        $data = array(
            'title'            => $this->input->post('title'),
            
            'image'            => $file_name,
           
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('gallery', $data);

    }

    public function soft_delete($id)
    {
        $sql = "delete from gallery where id='$id'";
        $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = "delete from gallery where id='$id'";
        $this->db->query($sql);
    }

}

/* End of file Page_model.php */
