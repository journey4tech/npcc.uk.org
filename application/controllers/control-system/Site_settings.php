<?php

class Site_settings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    //     if (!$this->session->userdata(ADMIN_PATH . 'admin_user_id')) {
    //         redirect(site_url(ADMIN_PATH . "/home"));
			 // }
        $this->load->Model('Site_setting_model');
        $this->load->library('form_validation');
   
	}

    public function index()
    {
        $this->site();
    }

    public function site()
    {
        //print_r($_POST); exit();
        $data['breadcum']['Home'] = site_url(ADMIN_PATH);

        $data['breadcum']['Site Settings'] = '';

        $this->form_validation->set_rules('application_name', 'Application name', 'required');
        $data['site_info'] = $info = $this->Site_setting_model->get_site_info('1');
       // print_r($data['site_info']); exit();
        if ($this->form_validation->run() == false) {
            $data['title'] = '';
            $data['view']  = 'admin/site_settings';
            $this->load->view('admin/layout', $data);
        } else {
            $uploaded_details = $this->upload_image('picture');
            $image = $info['logo'];
            if ($uploaded_details!= '') {
                $image = $uploaded_details['file_name'];
                if (file_exists("./user_upload/images/" . $info['logo'])) {
                    @unlink("./user_upload/images/" . $info['logo']);
                }
            } 
            $upload_favicon = $this->upload_image('favicon');
            $favicon = $info['favicon'];
            // if ($upload_favicon['file_name'] != '') {
             if ($upload_favicon!= '') {
                $favicon = $upload_favicon['file_name'];
                if (file_exists("./user_upload/images/" . $info['favicon'])) {
                    @unlink("./user_upload/images/" . $info['favicon']);
                }
            } 

            $this->Site_setting_model->update_site_settings($image,$favicon);

            $this->session->set_flashdata('success', "Site Setting Updated");

            redirect(ADMIN_PATH . '/site_settings', 'refresh');
        }
    }

    public function upload_image($file)
    {
        $config['upload_path']   = './user_upload/images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '1000000000';
        $config['max_width']     = '10249';
        $config['max_height']    = '7680';
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
