<?php
class Testimonial extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata(ADMIN_PATH . 'admin_user_id')) {
            redirect(site_url(ADMIN_PATH . "/testimonial"));
        }
        $this->load->library('form_validation');
        $this->load->model('Testimonial_model');
    }


    public function change_status($status = '', $id = '')
    {
        $data['breadcum']['Home'] = site_url(ADMIN_PATH);
        $data['breadcum']['Testimonial'] = site_url(ADMIN_PATH . '/testimonial');

        $this->Testimonial_model->change_status($status, $id);
        redirect(ADMIN_PATH . '/Testimonial', 'refresh');
    }

    public function index()
    {
        $data['breadcum']['Home'] = site_url(ADMIN_PATH);
        $data['breadcum']['Testimonial'] = site_url(ADMIN_PATH . '/testimonial');
        $data['main']             = 'admin/testimonial/index';
        $data['records']        = $this->Testimonial_model->get_active();
        $this->load->view('admin/admin', $data);
    }

    public function create()
    {

        $data['breadcum']['Home'] = site_url(ADMIN_PATH);
        $data['breadcum']['Testimonial'] = site_url(ADMIN_PATH . '/testimonial');
        $data['breadcum']['Add']  = '';
        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == false) {

            $data['main'] = 'admin/testimonial/create';
            $this->load->view('admin/admin', $data);
        } else { 

            $uploaded_details = $this->upload_image('image');

            $this->Testimonial_model->create($uploaded_details['file_name']);
            $this->session->set_flashdata('message', 'Successfully Testimonial Added');
            redirect(ADMIN_PATH . '/Testimonial', 'refresh');

        }
    }

    public function edit($id)
    {

        $data['breadcum']['Home'] = site_url(ADMIN_PATH);
        $data['breadcum']['Testimonial'] = site_url(ADMIN_PATH . '/testimonial');
        $data['breadcum']['Edit'] = '';

        $data['info'] = $info = $this->Testimonial_model->get_info($id);
        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == false) {

            $data['main'] = 'admin/testimonial/edit';
            $this->load->view('admin/admin', $data);
        } else {
            $uploaded_details = $this->upload_image('image');
            if ($uploaded_details['file_name'] != '') {
                $image = $uploaded_details['file_name'];
                if (file_exists("./user_upload/" . $info['image'])) {
                    @unlink("./user_upload/" . $info['image']);
                }
            } else {
                $image = $info['image'];
            }

            $this->Testimonial_model->update($image);
            $this->session->set_flashdata('message', 'Edited');
            redirect(ADMIN_PATH . '/Testimonial', 'refresh');

        }
    }

    public function delete($id)
    {

        $this->Testimonial_model->delete($id);
        $info = $this->Testimonial_model->get_info($id);
         
        $this->session->set_flashdata('message', 'Deleted');
        redirect(ADMIN_PATH . '/Testimonial', 'refresh');
    }

       public function soft_delete($id)
    {
        $this->Testimonial_model->soft_delete($id);
        $this->session->set_flashdata('message', 'Trashed');
        redirect(ADMIN_PATH . '/Testimonial', 'refresh');
    }

    public function upload_image($file)
    {

        $config['upload_path']   = './user_upload/';
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
