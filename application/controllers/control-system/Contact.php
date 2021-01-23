<?php
class Contact extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata(ADMIN_PATH . 'admin_user_id')) {
            redirect(site_url(ADMIN_PATH . "/home"));
        }
        $this->load->library('form_validation');
        $this->load->model('Contact_model');
    }

    public function index() {
        $this->view();
    }

    public function view() {
        $data['breadcum']['Home']            = site_url(ADMIN_PATH);
        $data['breadcum']['Contact Message'] = site_url(ADMIN_PATH . '/view');
        $data['main']                        = 'admin/contact/view';
        $data['contact_all']                 = $this->Contact_model->all_contact();
        $this->load->view('admin/admin', $data);
    }

    public function page() {

        $config['base_url']   = site_url(ADMIN_PATH . '/banner/page');
        $data['main']         = 'admin/banner/banner';
        $query                = $this->db->get('tbl_banners');
        $config['total_rows'] = $query->num_rows();

        $config['per_page']    = '20';
        $offset                = $this->uri->segment(4, 0);
        $config['uri_segment'] = '4';
        $this->pagination->initialize($config);

        $data['banner_list'] = $this->Contact_model->banner_list($config['per_page'], $offset);

        $this->load->view('admin/admin', $data);

    }

    public function delete_contact($id) {
        // $this->Helper_model->check_super_admin();
        $this->Contact_model->delete_contact($id);
        $this->session->set_flashdata('message', 'Deleted');
        redirect(ADMIN_PATH . '/contact', 'refresh');
    }

}

/* End of file contact.php */
/* Location: ./system/application/controllers/contact.php */