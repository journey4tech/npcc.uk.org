<?php

class Page_model extends CI_Model
{

    public function __construct()
    {
        //parent::CI_Model();
    }


    public function get_active_page()
    {
        $sql   = "SELECT * FROM pages WHERE status='1'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_page_by_slug($slug)
    {
        $options = array('slug' => $slug);
        $query   = $this->db->get_where('pages', $options, 1);
        return $query->row_array();
    }



    public function get_all()
    {
        $sql   = "SELECT * FROM pages";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_page_home()
    {

        $sql = "SELECT * FROM pages WHERE status='1'";

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
        $this->db->update('pages', $data);
    }

    public function get_info($id)
    {
        $options = array('id' => $id);
        $query   = $this->db->get_where('pages', $options, 1);

        return $query->row_array();

    }

    public function create($file_name)
    {

        $data = array(
            'title'            => $this->input->post('title'),
            'second_title'     => $this->input->post('second_title'),
            'slug'             => $this->input->post('slug'),
            'image'            => $file_name,
            'description'      => $this->input->post('description'),
            'meta_title'       => $this->input->post('meta_title'),
            'meta_keyword'     => $this->input->post('meta_keyword'),
            'meta_description' => $this->input->post('meta_description'),
            'status'           => $this->input->post('status'),
        );

        $this->db->insert('pages', $data);
    }

    public function update($file_name = '')
    {

        $data = array(
            'title'            => $this->input->post('title'),
            'second_title'     => $this->input->post('second_title'),
            'slug'             => $this->input->post('slug'),
            'image'            => $file_name,
            'description'      => $this->input->post('description'),
            'meta_title'       => $this->input->post('meta_title'),
            'meta_keyword'     => $this->input->post('meta_keyword'),
            'meta_description' => $this->input->post('meta_description'),
            'status'           => $this->input->post('status'),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('pages', $data);

    }

    public function soft_delete($id)
    {
        $sql = "delete from pages where id='$id'";
        $this->db->query($sql);
    }

    public function delete($id)
    {
        $sql = "delete from pages where id='$id'";
        $this->db->query($sql);
    }

}

/* End of file Page_model.php */
