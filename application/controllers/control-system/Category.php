<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->has_userdata('is_admin_login'))
            {
                redirect(ADMIN_PATH . '/admin/login','refresh');
            }
       
        $this->load->model('Category_model');
    }
    
 
    public function index()
    {
        $data['breadcum']['Home']     = site_url(ADMIN_PATH);
        $data['breadcum']['Category'] = site_url(ADMIN_PATH . '/index');
        $data['records']              = $this->Category_model->get_all();
        $data['view']                 = 'admin/categories/index';
        $this->load->view('admin/layout', $data);
    }
    public function show($id)
    {
    }
    public function change_status($status = '', $id = '')
    {
        $this->Category_model->change_status($status, $id);
        redirect(ADMIN_PATH . '/category', 'refresh');
    }
    public function change_show_menu($show_home = '', $id = '')
    {
        $this->Category_model->change_show_menu($show_home, $id);
        redirect(ADMIN_PATH . '/category', 'refresh');
    }
    public function create()
    {
        $this->form_validation->set_rules('name', 'Title', 'trim|required');
        $this->form_validation->set_rules('slug', "Slug", 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['view'] = 'admin/categories/create';
            $this->load->view('admin/layout', $data);
        } else {
            $uploaded_details = $this->upload_image('image');
            $this->Category_model->create($uploaded_details['file_name']);
            $this->session->set_flashdata('success', 'Category Added Successfully !');
            redirect(ADMIN_PATH . '/category', 'refresh');
        }
    }

 
    public function edit($id)
    {
        $data['info']                 = $info                 = $this->Category_model->get_info($id);
        $this->form_validation->set_rules('name', 'Title', 'required');
        $this->form_validation->set_rules('slug', "Slug", 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $data['view'] = 'admin/categories/edit';
            $this->load->view('admin/layout', $data);
        } else {
            $uploaded_details = $this->upload_image('image');
             if (isset($uploaded_details['file_name'])) {
                $image = $uploaded_details['file_name'];
                if (file_exists("./user_upload/images/" . $info['image'])) {
                    @unlink("./user_upload/images/" . $info['image']);
                }
            } else {
                $image = $info['image'];
            }

            $this->Category_model->update($image);
            $this->session->set_flashdata('message', 'Edited');
            redirect(ADMIN_PATH . '/category', 'refresh');
        }
    }
    public function update($id)
    {
    }
    public function soft_delete($id)
    {
        $this->Category_model->delete($id);
        $this->session->set_flashdata('message', 'Trashed');
        redirect(ADMIN_PATH . '/category', 'refresh');
    }
    public function delete($id)
    {
        $this->Category_model->delete($id);
        $info = $this->Category_model->get_info($id);
        if (file_exists("./user_upload/categories" . $info['image'])) {
            @unlink("./user_upload/categories" . $info['image']);
        }
        $this->session->set_flashdata('message', 'Deleted');
        redirect(ADMIN_PATH . '/category', 'refresh');
    }
    public function upload_image($file)
    {
        $config['upload_path']   = './user_upload/images';
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
