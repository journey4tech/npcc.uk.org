<?php

class Category_cms_model extends CI_Model {

	public function __construct() {

	}

	function category_cms_list($per_page, $offset = '1') {
		$orderby = " ORDER BY id DESC";
		if ($offset == 0) {
			$offset = 1;
		}
		$start = ($offset-1)*$per_page;
		$limit = " LIMIT $start,$per_page";
		$sql   = "SELECT * FROM tbl_cms_category  ".$orderby." ".$limit;
		$query = $this->db->query($sql);

		return $query->result_array();
	}

	function category_cms_list_all() {

		$sql   = "SELECT * FROM tbl_cms_category  ";
		$query = $this->db->query($sql);

		return $query->result_array();
	}

	function change_status($status, $id) {
		if ($status === '1') {
			$status = '0';
		} else {
			if ($status === '0') {
				$status = '1';
			}
		}

		$data = array(
			'status' => $status,
		);
		$this->db->where('id', $id);
		$this->db->update('tbl_cms_category', $data);
	}

	function get_category_cms($id) {
		$options = array('id' => $id);
		$query   = $this->db->get_where('tbl_cms_category', $options, 1);

		return $query->row_array();
	}

	function add_category_cms() {
		$data = array(
			'name'      => $this->input->post('name'),
			'link_name' => $this->input->post('link_name'),
			'status'    => $this->input->post('status')
		);
		$this->db->insert('tbl_cms_category', $data);
	}

	function update_category_cms() {
		$data = array(
			'name'      => $this->input->post('name'),
			'link_name' => $this->input->post('link_name'),
			'status'    => $this->input->post('status')
		);
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('tbl_cms_category', $data);
	}

	function delete_category_cms($id) {
		$sql = "delete from tbl_cms_category where id='$id'";
		$this->db->query($sql);
	}

}

/* End of file banner_management_model.php */
/* Location: ./system/application/models/banner_management_model.php */