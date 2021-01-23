<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Video extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Video_model');
    }

 
 
    public function index()
    {
        $data['breadcum']['Home']     = site_url(ADMIN_PATH);
        $data['breadcum']['Video'] = site_url(ADMIN_PATH . '/index');

        $data['records'] = $this->Video_model->get_all();
        $data['main']    = 'admin/videos/index';
        $this->load->view('admin/admin', $data);

    }

    public function show($id)
    {

    }

    public function change_status($status = '', $id = '')
    {

        $this->Video_model->change_status($status, $id);
        redirect(ADMIN_PATH . '/video', 'refresh');
    }

    public function change_show_menu($show_home = '', $id = '')
    {

        $this->Video_model->change_show_menu($show_home, $id);
        redirect(ADMIN_PATH . '/video', 'refresh');
    }

    public function create()
    {
        $data['breadcum']['Home']   = site_url(ADMIN_PATH);
        $data['breadcum']['Video'] = site_url(ADMIN_PATH . '/videos');
        $data['breadcum']['Add']    = '';

        $this->form_validation->set_rules('title', 'Title', 'required');
        

        if ($this->form_validation->run() == false) {

            $data['main'] = 'admin/videos/create';
            $this->load->view('admin/admin', $data);
        } else {
            $this->Video_model->create();
            $this->session->set_flashdata('message', 'Video Added');
            redirect(ADMIN_PATH . '/video', 'refresh');
        }

    }
    //}

    public function edit($id)
    {

        $data['breadcum']['Home']   = site_url(ADMIN_PATH);
        $data['breadcum']['Video'] = site_url(ADMIN_PATH . '/banner');
        $data['breadcum']['Edit']   = '';

        $data['info'] = $info = $this->Video_model->get_info($id);
        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == false) {

            $data['main'] = 'admin/videos/edit';
            $this->load->view('admin/admin', $data);
        } else {
            $this->Video_model->update();
            $this->session->set_flashdata('message', 'Edited');
            redirect(ADMIN_PATH . '/video', 'refresh');

        }
    }

    public function update($id)
    {

    }

    public function soft_delete($id)
    {
        $this->Video_model->delete($id);
        $this->session->set_flashdata('message', 'Trashed');
        redirect(ADMIN_PATH . '/video', 'refresh');
    }

    public function delete($id)
    {
        $this->Video_model->delete($id);
        $this->session->set_flashdata('message', 'Deleted');
        redirect(ADMIN_PATH . '/video', 'refresh');
    }
}
