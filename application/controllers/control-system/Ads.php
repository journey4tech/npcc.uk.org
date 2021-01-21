<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ads extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect(ADMIN_PATH . '/admin/login', 'refresh');
        }
        $this->load->library('form_validation');
        $this->load->model('Ads_model');
        $this->load->model('Category_model');
         $this->load->model('User_model');
    }

    public function change_status($status = '', $id = '')
    {
        $data['breadcum']['Home']    = site_url(ADMIN_PATH);
        $data['breadcum']['Ads'] = site_url(ADMIN_PATH . '/Ads');

        $this->Ads_model->change_status($status, $id);
        redirect(ADMIN_PATH . '/Ads', 'refresh');
    }

    public function index()
    {
        $data['breadcum']['Home']    = site_url(ADMIN_PATH);
        $data['breadcum']['Ads'] = site_url(ADMIN_PATH . '/view');
        $data['records'] = $this->Ads_model->get_all();
        $data['view'] = 'admin/ads/index';
        $this->load->view('admin/layout', $data);

    }

    public function create()
    {
        $data['breadcum']['Home']    = site_url(ADMIN_PATH);
        $data['breadcum']['Ads'] = site_url(ADMIN_PATH . '/Ads');
        $data['breadcum']['Add']     = '';
        $data['categories'] = $this->Category_model->get_active();
        $data['users'] = $this->User_model->get_all_user();
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('user_id', 'User', 'required');
        //$this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');

        if ($this->form_validation->run() == false) {

            $data['view'] = 'admin/ads/create';
            $this->load->view('admin/layout', $data);

        } else {

            $uploaded_details = $this->upload_image('image');
            $this->Ads_model->create($uploaded_details['file_name']);
            $this->session->set_flashdata('message', 'Successfully Ads Added');
            redirect(ADMIN_PATH . '/Ads', 'refresh');

        }
    }

    public function edit($id)
    {

        $data['breadcum']['Home']    = site_url(ADMIN_PATH);
        $data['breadcum']['Ads'] = site_url(ADMIN_PATH . '/Ads');
        $data['breadcum']['Edit']    = '';

        $data['info'] = $info = $this->Ads_model->get_info($id);
        $data['categories'] = $this->Category_model->get_active();
        $data['users'] = $this->User_model->get_all_user();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('user_id', 'User', 'required');
       // $this->form_validation->set_rules('slug', 'Slug', 'required');
        $this->form_validation->set_rules('category_id', 'Category', 'required');

        if ($this->form_validation->run() == false) {

            $data['view'] = 'admin/ads/edit';
            $this->load->view('admin/layout', $data);
        } else {
            $uploaded_details = $this->upload_image('image');
            if (isset($uploaded_details['file_name'])) {
                $image = $uploaded_details['file_name'];
                if (file_exists("./user_upload/ads/" . $info['image'])) {
                    @unlink("./user_upload/ads/" . $info['image']);
                }
            } else {
                $image = $info['image'];
            }

            $this->Ads_model->update($image);
            $this->session->set_flashdata('message', 'Edited');
            redirect(ADMIN_PATH . '/Ads', 'refresh');

        }
    }

    public function delete($id)
    {

        $this->Ads_model->delete($id);
        $info = $this->Ads_model->get_team_info($id);
        if (file_exists("./user_upload/ads/" . $info['image'])) {
            @unlink("./user_upload/ads/" . $info['image']);
        }

        $this->session->set_flashdata('message', 'Deleted');
        redirect(ADMIN_PATH . '/Ads', 'refresh');
    }

    public function upload_image($file)
    {

        $config['upload_path']   = './user_upload/ads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '1000000000';
        $config['max_width']     = '1000000000';
        $config['max_height']    = '1000000000';
        $config['remove_spaces'] = 'true';

        $this->load->library('upload', $config);
        $this->upload->do_upload($file);
        if ($this->upload->display_errors()) {
            $this->error = $this->upload->display_errors();

            return false;
        } else {
            $data = $this->upload->data();

            return $data;
        }
    }

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
