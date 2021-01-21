<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Cms_model');
        $this->load->model('Blog_model');
        $this->load->model('Page_model');
        if ($this->config->item('status') == '0') {
            redirect('/site_offline/');
            exit;
        }
    }
// public function details($slug = false)
    // {
    //     //print_r($slug); exit();
    //     $data['service_list'] = $this->Blog_model->get_active_service();
    //     $data['info']         = $this->Blog_model->get_service_by_slug($slug);
    //     if (empty($data['info'])) {
    //         show_404();
    //     }
    //     $data['main'] = 'service_single';
    //     $this->load->view('index', $data);
    // }
    public function index()
    {
        $data['main']  = 'blog';
        $data['blogs'] = $this->Blog_model->get_active_blog();
//$data['info']     = $this->Cms_model->get_info($id = 2);
        $this->load->view('index', $data);
    }
    public function detail($id = false)
    {
        $data['info'] = $this->Blog_model->get_blog_by_id($id);
        if (empty($data['info'])) {
            show_404();
        }
        $data['main'] = 'blog_single';
        $this->load->view('index', $data);
    }
}
