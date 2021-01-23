<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		$this->load->library('pagination');
		$this->load->model('Category_model');
		$this->load->model('Blog_model');
		$this->load->model('Team_model');
		$this->load->model('Page_model');
		if ($this->config->item('status') == '0') {
			redirect('/site_offline/');
			exit;
		}
	}

	public function index()
	{
		$data['meta_description'] = '';
		$data['main'] = 'member';
		$this->load->view('index', $data);
	}

	

	public function post()
	{
		//print_r($_POST);
		//exit();
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('comments', 'comments', 'required');
		$data['info'] = $this->Cms_model->get_info($id = 31);
		if ($this->form_validation->run() == false) {
			$data['main'] = 'member';
			$this->load->view('index', $data);
		} else {
			$this->Contact_model->add_contact();
			$this->session->set_flashdata('message', 'Message has been send Successfully');
			redirect('/contact-us', 'refresh');
		}
	}

	public function request()
	{
		// print_r($_POST);exit();
		// $data['info'] = $this->Cms_model->get_cms($id = 1);
		$this->form_validation->set_rules('Name', ' Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('comments', 'Comments', 'required');
		if ($this->form_validation->run() == false) {
			// $data['main'] = 'admin/book/add_book';
			// $this->load->view('admin/admin', $data);
			// redirect('/book');
			$data['main'] = 'member';
			$this->load->view('index', $data);
		} else {
			$name = $this->input->post('name');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$comments = $this->input->post('comments');
			$emailbody = "
<style>
table tr td.paddin
{
width:100px;
padding:0px 0px 0px 20px;
}
table tr td
{
font:normal 14px/25px Arial, Helvetica, sans-serif;
color:#000;
}
table
{
border:1px solid #ccc;
padding:10px;
}
</style>
<table>
    <tr>
        <td colsapn='2'><h4><b>Contact Information:</b></h4></td>
    </tr>
    <tr>
        <td>From:</td>
        <td>$name </td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>$email</td>
    </tr>
    <tr>
        <td>Phone:</td>
        <td>$phone</td>
    </tr>
    <tr>
        <td>Message:</td>
        <td>$comments</td>
    </tr>
</table>
";
			$subject = 'Contact From ' . $this->config->item('title') . ' By ' . $name;
			// load email library
			$this->load->library('email');
			// prepare email
			$this->email->from($email);
			$this->email->set_mailtype("html");
			$this->email->to($this->config->item('contact_email'));
			$this->email->subject($subject);
			$this->email->message($emailbody);
			$this->email->send();
			// $this->email
			//     ->from('info@example.com', 'Example Inc.')
			//     ->to('journey4tech@gmail.com')
			//     ->subject('Hello from Example Inc.')
			//     ->message('Hello, We are <strong>Example Inc.</strong>')
			//     ->set_mailtype('html');
			// send email
			//  $this->email->send();
			$this->Contact_model->add_contact();
			$this->session->set_flashdata('message', 'Message has been send Successfully');
			redirect('/contact-us', 'refresh');
		}
		$data['main'] = 'contact_us';
		$this->load->view('index', $data);
	}
}
