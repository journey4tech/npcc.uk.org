<?php
class Team extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect(ADMIN_PATH . '/admin/login', 'refresh');
        }
        $this->load->library('form_validation');
        $this->load->model('Team_model');
    }

    public function change_status($status = '', $id = '')
    {
        $data['breadcum']['Home'] = site_url(ADMIN_PATH);
        $data['breadcum']['Team'] = site_url(ADMIN_PATH . '/team');

        $this->Team_model->change_status($status, $id);
        redirect(ADMIN_PATH . '/team', 'refresh');
    }

     public function change_show_home($status = '', $id = '')
    {
        $data['breadcum']['Home'] = site_url(ADMIN_PATH);
        $data['breadcum']['Team'] = site_url(ADMIN_PATH . '/team');

        $this->Team_model->change_status($status, $id);
        redirect(ADMIN_PATH . '/team', 'refresh');
    }



    public function index()
    {
        $data['breadcum']['Home'] = site_url(ADMIN_PATH);
        $data['breadcum']['Team'] = site_url(ADMIN_PATH . '/view');
        $data['records']          = $this->Team_model->get_all();
        $data['view']             = 'admin/team/index';
        $this->load->view('admin/layout', $data);
    }

    public function create()
    {

        $data['breadcum']['Home'] = site_url(ADMIN_PATH);
        $data['breadcum']['Team'] = site_url(ADMIN_PATH . '/team');
        $data['breadcum']['Add']  = '';

        $data['years'] = $this->Team_model->get_year();

        $this->form_validation->set_rules('name', 'Title', 'required');

        if ($this->form_validation->run() == false) {

            $data['view'] = 'admin/team/create';
            $this->load->view('admin/layout', $data);
        } else {
            $uploaded_details['file_name'] = "";
            if (!empty($_FILES['image']['name'])) {
             $uploaded_details = $this->upload_image('image');
         }

            $this->Team_model->create($uploaded_details['file_name']);
            $this->session->set_flashdata('message', 'Successfully Team Added');
            redirect(ADMIN_PATH . '/team', 'refresh');

        }
    }

    public function edit($id)
    {

        $data['breadcum']['Home'] = site_url(ADMIN_PATH);
        $data['breadcum']['Team'] = site_url(ADMIN_PATH . '/team');
        $data['breadcum']['Edit'] = '';

        $data['years'] = $this->Team_model->get_year();
        $data['info'] = $info = $this->Team_model->get_info($id);
        $this->form_validation->set_rules('name', 'Title', 'required');

        if ($this->form_validation->run() == false) {

            $data['view'] = 'admin/team/edit';
            $this->load->view('admin/layout', $data);
        } else {
            $uploaded_details = $this->upload_image('image');
            if ($uploaded_details!= '') {
                $image = $uploaded_details['file_name'];
                if (file_exists("./user_upload/" . $info['image'])) {
                    @unlink("./user_upload/" . $info['image']);
                }
            } else {
                $image = $info['image'];
            }

            $this->Team_model->update($image);
            $this->session->set_flashdata('message', 'Edited');
            redirect(ADMIN_PATH . '/team', 'refresh');

        }
    }

    public function delete($id)
    {

        $this->Team_model->delete($id);
        $info = $this->Team_model->get_info($id);

        $this->session->set_flashdata('message', 'Deleted');
        redirect(ADMIN_PATH . '/team', 'refresh');
    }

    public function soft_delete($id)
    {
        $this->Team_model->soft_delete($id);
        $this->session->set_flashdata('message', 'Trashed');
        redirect(ADMIN_PATH . '/team', 'refresh');
    }

    public function upload_image($file)
    {

        $config['upload_path']   = './user_upload/teams/';
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
