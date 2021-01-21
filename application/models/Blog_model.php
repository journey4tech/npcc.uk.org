<?php

class Blog_model extends CI_Model
{

    public function __construct()
    {
        //parent::CI_Model();
    }

    public function get_info($id)
    {
        $options = array('id' => $id);
        $query   = $this->db->get_where('blogs', $options, 1);

        return $query->row_array();

    }

    public function get_all()
    {
        $sql   = "SELECT * FROM blogs ORDER BY id DESC";
        $query = $this->db->query($sql);
      return $query->result_array();
       // return $this->datatable->LoadJson($sql);
    }

        //-----------------------------------------------------
    public function get_all_old(){

        $wh =array();

        $query = $this->db->get('blogs');
        $SQL = $this->db->last_query();

        if(count($wh)>0)
        {
            $WHERE = implode(' and ',$wh);
            return $this->datatable->LoadJson($SQL,$WHERE);
        }
        else
        {
            return $this->datatable->LoadJson($SQL);
        }
    }



    public function get_active_blog()
    {
        $sql   = "SELECT * FROM blogs WHERE status='1'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_active_show_home()
    {
        $sql   = "SELECT * FROM blogs WHERE status='1' AND show_home='1'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_blog_by_slug($slug)
    {
        $options = array('slug' => $slug);
        $query   = $this->db->get_where('blogs', $options, 1);
        return $query->row_array();
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
        $this->db->update('blogs', $data);
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
            'show_home'        => $this->input->post('show_home'),
            'status'           => $this->input->post('status'),
            'created_at'       => date('Y-m-d H:i:s'),
        );

        $this->db->insert('blogs', $data);
    }

    //-----------------------------------------------------
    public function add_post($data)
    {
        $result = $this->db->insert('blogs', $data);
        return true;
        //return $this->db->insert_id();
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
            'show_home'        => $this->input->post('show_home'),
            'status'           => $this->input->post('status'),

        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('blogs', $data);

    }

    //-----------------------------------------------------
    public function edit_post($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('blogs', $data);
        return true;

    }

    public function soft_delete($id)
    {
        $data = array(
            'status' => '1',
        );
        $this->db->where('id', $id);
        $this->db->update('blogs', $data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM blogs where id='$id'";
        $this->db->query($sql);
    }

}

/* End of file Page_model.php */
