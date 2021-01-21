<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
		public function __construct()
	{

		parent::__construct();
		if(!$this->session->has_userdata('is_admin_login'))
			{
				redirect(ADMIN_PATH . '/admin/login','refresh');
			}
		$this->load->model('Dashboard_model');
	}

	public function index()
	{
		$data['all_users'] = $this->Dashboard_model->get_all_users();
		$data['latest_users'] = $this->Dashboard_model->get_latest_users();
		$data['title'] = 'Dashboard';
		$data['view'] = 'admin/dashboard';
		$this->load->view('admin/layout', $data);
		//$this->output->enable_profiler(TRUE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/control-system/Dashboard.php */
