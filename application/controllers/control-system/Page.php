<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Page extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Page_model');
    }

    public function index()
    {

        $data['breadcum']['Home']   = site_url(ADMIN_PATH);
        $data['breadcum']['Banner'] = site_url(ADMIN_PATH . '/view');
        $data['records']            = $this->Page_model->get_all();
        $data['view']               = 'admin/page/index';
        $this->load->view('admin/layout', $data);
        

    }

    public function create()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|xss_clean|required');
        $this->form_validation->set_rules('slug', 'Slug', 'trim|xss_clean|required');

        if ($this->form_validation->run() == false) {

            $data['view'] = 'admin/page/create';
            $this->load->view('admin/layout', $data);
        } else {

            $uploaded_details['file_name'] = "";
            if (!empty($_FILES['image']['name'])) {
             $uploaded_details = $this->upload_image('image');
         }
            $this->Page_model->create($uploaded_details['file_name']);
            $this->session->set_flashdata('success', 'Page Added Successfully ');
            //$this->session->set_flashdata('success', trans("page") . " " . trans("msg_suc_added"));
            redirect(ADMIN_PATH . '/page', 'refresh');
        }

    }
    //}

    public function edit($id)
    {
        $data['info'] = $info = $this->Page_model->get_info($id);
        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == false) {
            $data['view'] = 'admin/page/edit';
            $this->load->view('admin/layout', $data);
        } else {
            $uploaded_details = $this->upload_image('image');
            if ($uploaded_details != '') {
                $image = $uploaded_details['file_name'];
                if (file_exists("./user_upload/images/" . $info['image'])) {
                    @unlink("./user_upload/images/" . $info['image']);
                }
            } else {
                $image = $info['image'];
            }

            $this->Page_model->update($image);
            $this->session->set_flashdata('success', 'Page Edit Successfully !');
            redirect(ADMIN_PATH . '/page', 'refresh');

        }
    }

    public function soft_delete($id)
    {
        $this->Page_model->soft_delete($id);
        $this->session->set_flashdata('message', 'Trashed');
        redirect(ADMIN_PATH . '/page', 'refresh');
    }

    public function delete($id)
    {
        $this->Page_model->delete($id);

        $info = $this->Page_model->get_info($id);
        if (file_exists("./user_upload/images" . $info['image'])) {
            @unlink("./user_upload/images" . $info['image']);
        }
        $this->session->set_flashdata('message', 'Deleted');
        redirect(ADMIN_PATH . '/page', 'refresh');
    }

    public function change_status($status = '', $id = '')
    {
        $this->Page_model->change_status($status, $id);
        redirect(ADMIN_PATH . '/page', 'refresh');
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
