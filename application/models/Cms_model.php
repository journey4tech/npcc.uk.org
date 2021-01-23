<?php

class Cms_model extends CI_Model
{

    public function __construct()
    {

    }


    public function get_all_cms_category()
    {
        $query = $this->db->get('cms_categories');
        return $query->result_array();
    }
    
      public function get_active_cms_category()
    {
        $sql   = "SELECT * FROM cms_categories WHERE status = 1";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


    public function get_all()
    {
        $sql   = "SELECT * FROM cms";
        $query = $this->db->query($sql);
        return $query->result_array();
    }



    public function change_status($status, $id)
    {
        if ($status === '1') {
            $status = '0';
        } elseif ($status === '0') {
            $status = '1';
        }

        $data = array(
            'status' => $status,
        );
        $this->db->where('id', $id);
        $this->db->update('cms', $data);
    }



    public function get_info($id)
    {

        $sql = "SELECT * FROM  cms   WHERE id='$id' AND status= '1'  ";

        $query = $this->db->query($sql);

        return $query->row_array();
    }

 

    public function create($file_name, $feature_image)
    {
        $data = array(
            'title'         => $this->input->post('title'),
            'image'            => $file_name,
            'feature_image'    => $feature_image,
            'page_title'       => addslashes($this->input->post('page_title')),
            'meta_title'       => addslashes($this->input->post('meta_title')),
            'meta_keyword'    => addslashes($this->input->post('meta_keyword')),
            'meta_description' => addslashes($this->input->post('meta_description')),
            'content'          => addslashes($this->input->post('content')),
            'rank'        => $this->input->post('rank'),
            'status'           => $this->input->post('status'),
        );
        $this->db->insert('cms', $data);
        //print_r($this->db->last_query()); exit;
    }

    public function update_cms($file_name = '', $feature_image = '')
    {
        $data = array(
            'title'         => $this->input->post('title'),
            'image'            => $file_name,
            'feature_image'    => $feature_image,
            // 'location'         => $this->input->post('location'),
            // 'headtext'         => $this->input->post('headtext'),
            // 'type'             => $this->input->post('type'),
            'page_title'       => addslashes($this->input->post('page_title')),
            'meta_title'       => addslashes($this->input->post('meta_title')),
            'meta_keyword'    => addslashes($this->input->post('meta_keyword')),
            'meta_description' => addslashes($this->input->post('meta_description')),
            'content'          => addslashes($this->input->post('content')),
            'rank'        => $this->input->post('rank'),
            'status'           => $this->input->post('status'),
            'category_id'      => $this->input->post('category_id'),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('cms', $data);
        //print_r($this->db->last_query()); exit;
    }

    public function delete_cms($id)
    {
        $sql = "delete from cms where id='$id'";
        $this->db->query($sql);
    }

}

/* End of file cms_model.php */
/* Location: ./system/application/models/cms_model.php */
