<?php

class Ads_model extends CI_Model
{

    public function __construct()
    {
        //parent::CI_Model();
    }

    //get product by id
    public function get_ads_by_id($id)
    {
        $id = clean_number($id);
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get('ads');
        return $query->row();
    }

    public function get_info($id)
    {
        $options = array('id' => $id);
        $query   = $this->db->get_where('ads', $options, 1);

        return $query->row_array();

    }

        public function get_ads_by_slug($slug)
    {
        $options = array('slug' => $slug,'status'=>1);
        $query   = $this->db->get_where('ads', $options, 1);

        return $query->row_array();

    }

    public function get_all()
    {
        $sql   = "SELECT * FROM ads ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
        // return $this->datatable->LoadJson($sql);
    }

        public function get_all_active()
    {
        $sql   = "SELECT * FROM ads WHERE status='1' order by id DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

     public function get_active_show_home()
    {
        $sql   = "SELECT * FROM ads WHERE status='1' AND show_home='1'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    //-----------------------------------------------------
    public function get_all_old()
    {

        $wh = array();

        $query = $this->db->get('ads');
        $SQL   = $this->db->last_query();

        if (count($wh) > 0) {
            $WHERE = implode(' and ', $wh);
            return $this->datatable->LoadJson($SQL, $WHERE);
        } else {
            return $this->datatable->LoadJson($SQL);
        }
    }

    public function get_featured_ads()
    {
        $sql   = "SELECT * FROM ads WHERE status='1' AND is_feature ='1' ORDER BY created_at DESC ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_recent_ads()
    {
        $sql   = "SELECT * FROM ads WHERE status='1'  ORDER BY created_at DESC ";
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
        $this->db->update('ads', $data);
    }

    public function create($file_name)
    {

        $data = array(
            'user_id'          => $this->input->post('user_id'),
            'category_id'      => $this->input->post('category_id'),
            'title'            => $this->input->post('title'),
            'slug'             => $this->input->post('slug'),
            'image'            => $file_name,
            'price'            => $this->input->post('price'),
            'is_negotiable'    => $this->input->post('is_negotiable'),
            'is_feature'       => $this->input->post('is_feature'),
            'description'      => $this->input->post('description'),
            'location'         => $this->input->post('location'),
            'meta_title'       => $this->input->post('meta_title'),
            'meta_keyword'     => $this->input->post('meta_keyword'),
            'meta_description' => $this->input->post('meta_description'),

            'status'           => $this->input->post('status'),
            'created_at'       => date('Y-m-d H:i:s'),
        );

        $this->db->insert('ads', $data);
    }

    //-----------------------------------------------------
    public function add_post($data)
    {
        $result = $this->db->insert('ads', $data);
        return true;
        //return $this->db->insert_id();
    }

    public function update($file_name = '')
    {

        $data = array(
            'user_id'          => $this->input->post('user_id'),
            'category_id'      => $this->input->post('category_id'),
            'title'            => $this->input->post('title'),
            'slug'             => $this->input->post('slug'),
            'image'            => $file_name,
            'price'            => $this->input->post('price'),
            'is_negotiable'    => $this->input->post('is_negotiable'),
            'is_feature'       => $this->input->post('is_feature'),
            'description'      => $this->input->post('description'),
            'location'         => $this->input->post('location'),
            'meta_title'       => $this->input->post('meta_title'),
            'meta_keyword'     => $this->input->post('meta_keyword'),
            'meta_description' => $this->input->post('meta_description'),
            'status'           => $this->input->post('status'),
            'created_at'       => date('Y-m-d H:i:s'),

        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('ads', $data);

    }

    //-----------------------------------------------------
    public function edit_post($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('ads', $data);
        return true;

    }

    public function soft_delete($id)
    {
        $data = array(
            'status' => '1',
        );
        $this->db->where('id', $id);
        $this->db->update('ads', $data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM ads where id='$id'";
        $this->db->query($sql);
    }

    //build query unlocated
    public function build_query_unlocated()
    {
        $this->db->join('users', 'ads.user_id = users.id');
        $this->db->select('ads.*, users.username as user_username, users.role as user_role, users.slug as user_slug');
        $this->db->where('users.banned', 0);
        $this->db->where('ads.status', 1);
        // $this->db->where('ads.visibility', 1);
        // $this->db->where('ads.is_draft', 0);
        // $this->db->where('ads.is_deleted', 0);

    }

    public function get_user_public_ads()
    {
        $this->db->join('users', 'ads.user_id = users.id');
        $this->db->select('ads.*, users.username as user_username, users.role as user_role, users.slug as user_slug');
        $this->db->where('users.banned', 0);
        $this->db->where('ads.status', 1);
        //$this->db->where('ads.is_public', 1);
        $query = $this->db->get('ads');
        return $query->result_array();
    }

    //get paginated user ads
    public function get_paginated_user_ads($user_slug, $per_page, $offset)
    {
        $this->build_query_unlocated();
        $this->db->where('users.slug', $user_slug);
        $this->db->limit($per_page, $offset);
        $this->db->order_by('ads.created_at', 'DESC');
        $query = $this->db->get('ads');
        return $query->result_array();
    }

    //get user products count
    public function get_user_ads_count($user_slug)
    {
        $user = $this->auth_model->get_user_by_slug($user_slug);
        if (empty($user)) {
            return 0;
        }
        $this->build_query_unlocated();
        $this->db->where('users.slug', $user_slug);
        $this->db->order_by('ads.created_at', 'DESC');
        $query = $this->db->get('ads');
        return $query->num_rows();
    }

    public function create_ads_by_user($file_name)
    {

        $data = array(
            'user_id'          => $this->session->userdata('user_id'),
            'category_id'      => $this->input->post('category_id'),
            'title'            => $this->input->post('title'),
            //'slug'             => '',
            'image'            => $file_name,
            'price'            => $this->input->post('price'),
            'is_negotiable'    => $this->input->post('is_negotiable'),
            //'is_feature'       => $this->input->post('is_feature'),

            'description'      => $this->input->post('description'),
            'location'         => $this->input->post('location'),
            'meta_title'       => $this->input->post('title') . '-' . $this->input->post('location'),
            'meta_keyword'     => $this->input->post('title'),
            'meta_description' => $this->input->post('title'),
            'status'           => $this->input->post('status'),
            'created_at'       => date('Y-m-d H:i:s'),
        );
        $data["slug"] = str_slug($data["title"]);

        $this->db->insert('ads', $data);
    }

    //update slug
    // public function update_slug($id)
    // {
    //     $id = clean_number($id);
    //     $user = $this->get_user($id);

    //     if (empty($user->slug) || $user->slug == "-") {
    //         $data = array(
    //             'slug' => "user-" . $user->id,
    //         );
    //         $this->db->where('id', $id);
    //         $this->db->update('users', $data);

    //     } else {
    //         if ($this->check_is_slug_unique($user->slug, $id) == true) {
    //             $data = array(
    //                 'slug' => $user->slug . "-" . $user->id
    //             );

    //             $this->db->where('id', $id);
    //             $this->db->update('users', $data);
    //         }
    //     }
    // }

    //update slug
    public function update_slug($id)
    {
        $id  = clean_number($id);
        $ads = $this->get_ads_by_id($id);

        // if (empty($ads->slug) || $ads->slug == "-") {
        //     $data = array(
        //         'slug' => $ads->id,
        //     );
        // } else {
            if ($this->config->item('ads_link_structure') == "id-slug") {
                $data = array(
                    'slug' => $ads->id . "-" . $ads->slug,
                );
            } else {
                $data = array(
                    'slug' => $ads->slug . "-" . $ads->id,
                );
            }
        

        // if (!empty($this->page_model->check_page_slug_for_ads($data["slug"]))) {
        //     $data["slug"] .= uniqid();
        // }

        $this->db->where('id', $id);
        return $this->db->update('ads', $data);
    }
}

/* End of file Ads_model.php */
