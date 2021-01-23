<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cms extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Cms_model');
        // $this->load->library('parser');
        //   $this->load->library('pagination');
        if (!$this->session->userdata(ADMIN_PATH . 'admin_user_id')) {
            redirect(site_url(ADMIN_PATH . "/home"));
        }
    }


    public function index()
    {

        $data['breadcum']['Home']   = site_url(ADMIN_PATH);
        $data['breadcum']['Banner'] = site_url(ADMIN_PATH . '/view');
        $data['records'] = $this->Cms_model->get_all();
        $data['main']    = 'admin/cms/cms';
        $this->load->view('admin/admin', $data);

    }



    public function create()
    {
        $data['breadcum']['Home'] = site_url(ADMIN_PATH);
        $data['breadcum']['Pages'] = site_url(ADMIN_PATH . '/cms');
        $data['breadcum']['Add'] = '';
        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == false) {

            $data['main']         = 'admin/cms/create';
            $data['cms_category'] = $this->Cms_model->get_active_cms_category();
            $this->load->view('admin/admin', $data);
        } else {

            $uploaded_details         = $this->upload_image('image');
            $uploaded_details_feature = $this->upload_feature_image('feature_image');

            $this->Cms_model->create($uploaded_details['file_name'], $uploaded_details_feature['file_name']);
            $this->session->set_flashdata('message', 'Cms Added Successfully');
            redirect(ADMIN_PATH . '/cms', 'refresh');
        }
    }



    public function edit($id)
    {
        $data['breadcum']['Home']  = site_url(ADMIN_PATH);
        $data['breadcum']['Pages'] = site_url(ADMIN_PATH . '/cms');
        $data['breadcum']['Edit']  = '';

        $data['cms_category'] = $this->Cms_model->get_active_cms_category();
        $data['info']         = $info         = $this->Cms_model->get_info($id);

        $this->form_validation->set_rules('category_id', 'Category', 'required');

        if ($this->form_validation->run() == false) {
            $data['info'] = $info = $this->Cms_model->get_info($id);
            $data['main'] = 'admin/cms/edit';
            $this->load->view('admin/admin', $data);
        } else {
            //for feature image update

            if ($_FILES['feature_image']['name'] != '') {
                $uploaded_details_feature = $this->upload_feature_image('feature_image');

                if ($uploaded_details_feature['file_name'] != '') {
                    $feature_image = $uploaded_details_feature['file_name'];
                    if (file_exists("./user_upload/cms/" . $info['feature_image'])) {
                        @unlink("./user_upload/cms/" . $info['feature_image']);
                    }
                } else {
                    $feature_image = $info['feature_image'];
                }
            } else {
                $feature_image = $info['feature_image'];
            }
            //for image update
            if ($_FILES['image']['name'] != '') {
                $uploaded_details = $this->upload_image('image');

                if ($uploaded_details['file_name'] != '') {
                    $image = $uploaded_details['file_name'];
                    if (file_exists("./user_upload/cms/" . $info['image'])) {
                        @unlink("./user_upload/cms/" . $info['image']);
                    }
                } else {
                    $image = $info['image'];
                }
            } else {
                $image = $info['image'];
            }
            $this->Cms_model->update_cms($image, $feature_image);
            $this->session->set_flashdata('message', 'Cms  Edited');
            redirect(ADMIN_PATH . '/cms', 'refresh');
        }
    }


    public function soft_delete($id)
    {
        // $this->Helper_model->check_super_admin();
        $this->Cms_model->delete($id);
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect(ADMIN_PATH . '/cms', 'refresh');
    }



    public function delete($id)
    {
        // $this->Helper_model->check_super_admin();
        $this->Cms_model->delete($id);
        $this->session->set_flashdata('message', 'Deleted Successfully');
        redirect(ADMIN_PATH . '/cms', 'refresh');
    }


    public function change_status($status = '', $id = '')
    {
        $this->Cms_model->change_status($status, $id);
        redirect(ADMIN_PATH . '/cms', 'refresh');
    }


    public function upload_image($file)
    {

        $config['upload_path']   = './user_upload/cms/';
        $config['allowed_types'] = 'gif|jpeg|jpg|png';
        $config['max_size']      = '10000000';
        $config['max_width']     = '100000';
        $config['max_height']    = '10000';
        $config['remove_spaces'] = 'true';

        $this->load->library('upload', $config);
        $this->upload->do_upload($file);
        if ($this->upload->display_errors()) {
            $this->error = $this->upload->display_errors();

            return true;
        } else {
            $data = $this->upload->data();

            return $data;
        }
    }

    public function upload_feature_image($feature_image)
    {

        $config['upload_path']   = './user_upload/cms/';
        $config['allowed_types'] = 'gif|jpeg|jpg|png';
        $config['max_size']      = '10000000';
        $config['max_width']     = '100000';
        $config['max_height']    = '10000';
        $config['remove_spaces'] = 'true';

        $this->load->library('upload', $config);
        $this->upload->do_upload($feature_image);
        if ($this->upload->display_errors()) {
            $this->error = $this->upload->display_errors();

            return true;
        } else {
            $data = $this->upload->data();

            return $data;
        }
    }
}

/* End of file Cms.php */
/* Location: ./system/application/controllers/Cms.php */
