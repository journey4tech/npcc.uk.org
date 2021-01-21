<?php
	class Dashboard_model extends CI_Model{

		public function get_all_users()
		{
			return $this->db->count_all('users');
		}
		public function get_active_users()
		{
			$this->db->where('status', 1);
			return $this->db->count_all_results('users');
		}
	 

		public function get_latest_users()
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->order_by('created_at','desc');
			$this->db->limit(10, 0);
			$query = $this->db->get();
			return $query->result_array();
		}
	}

?>
