<?php
class Banner extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect(ADMIN_PATH . '/admin/login', 'refresh');
        }
        $this->load->library('form_validation');
        $this->load->model('Banner_model');
    }


    public function change_status($status = '', $id = '')
    {
        $data['breadcum']['Home'] = site_url(ADMIN_PATH);
        $data['breadcum']['Banner'] = site_url(ADMIN_PATH . '/banner');

        $this->Banner_model->change_status($status, $id);
        redirect(ADMIN_PATH . '/banner', 'refresh');
    }

    public function index()
    {
        $data['breadcum']['Home'] = site_url(ADMIN_PATH);
        $data['breadcum']['Banner'] = site_url(ADMIN_PATH . '/view');
        $data['view']             = 'admin/banner/index';
        $data['records']        = $this->Banner_model->get_all();
        $this->load->view('admin/layout', $data);
        
    }

    public function create()
    {

        $data['breadcum']['Home'] = site_url(ADMIN_PATH);
        $data['breadcum']['Banner'] = site_url(ADMIN_PATH . '/banner');
        $data['breadcum']['Add']  = '';
        $this->form_validation->set_rules('position', 'Position', 'required');

        if ($this->form_validation->run() == false) {

            $data['view'] = 'admin/banner/create';
            $this->load->view('admin/layout', $data);
        } else { 

            $uploaded_details = $this->upload_image('image');

            $this->Banner_model->create($uploaded_details['file_name']);
            $this->session->set_flashdata('message', 'Successfully Banner Added');
            redirect(ADMIN_PATH . '/banner', 'refresh');

        }
    }

    public function edit($id)
    {

        $data['breadcum']['Home'] = site_url(ADMIN_PATH);
        $data['breadcum']['Banner'] = site_url(ADMIN_PATH . '/banner');
        $data['breadcum']['Edit'] = '';

        $data['info'] = $info = $this->Banner_model->get_info($id);
        $this->form_validation->set_rules('position', 'Position', 'required');

        if ($this->form_validation->run() == false) {

            $data['view'] = 'admin/banner/edit';
            $this->load->view('admin/layout', $data);
        } else {
            $uploaded_details = $this->upload_image('image');
            if ($uploaded_details!= '') {
                $image = $uploaded_details['file_name'];
                if (file_exists("./user_upload/banners/" . $info['image'])) {
                    @unlink("./user_upload/banners/" . $info['image']);
                }
            } else {
                $image = $info['image'];
            }

            $this->Banner_model->update($image);
            $this->session->set_flashdata('message', 'Edited');
            redirect(ADMIN_PATH . '/banner', 'refresh');

        }
    }

    public function delete($id)
    {

        $this->Banner_model->delete($id);
        $info = $this->Banner_model->get_info($id);
         
        $this->session->set_flashdata('message', 'Deleted');
        redirect(ADMIN_PATH . '/banner', 'refresh');
    }

       public function soft_delete($id)
    {
        $this->Banner_model->soft_delete($id);
        $this->session->set_flashdata('message', 'Trashed');
        redirect(ADMIN_PATH . '/banner', 'refresh');
    }

    public function upload_image($file)
    {

        $config['upload_path']   = './user_upload/banners';
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
