<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Site_offline extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if ($this->config->item('status') == '1') {
			redirect(site_url(''));
			exit;
		}
	}

	public function index() {
		$this->load->view('offline');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
