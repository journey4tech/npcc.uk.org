<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model('Cms_model');
        $this->load->model('Blog_model');
        $this->load->model('Page_model');
        if ($this->config->item('status') == '0') {
            redirect('/site_offline/');
            exit;
        }
    }

    public function index()
    {
        $data['main']  = 'blog';
        $data['blogs'] = $this->Blog_model->get_active_blog();
        $this->load->view('index', $data);
    }

    public function news()
    {
        $data['section_title']='News';
        $data['main']  = 'blog';
        $data['blogs'] = $this->Blog_model->get_active_blog();
        $this->load->view('index', $data);
    }

     public function event()
    {
        $data['section_title']='Our Event';
        $data['main']  = 'blog';
        $data['blogs'] = $this->Blog_model->get_active_blog();
        $this->load->view('index', $data);
    }

    public function press_release()
    {
        $data['section_title']='Press Release';
        $data['main']  = 'blog';
        $data['blogs'] = $this->Blog_model->get_active_blog();
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
