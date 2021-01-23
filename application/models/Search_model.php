<?php

class Search_model extends CI_Model
{

    public function __construct()
    {
        //parent::CI_Model();
    }
    public function get_results($search_term='default')
    {
        
        $this->db->select('*');
        $this->db->from('tbl_packages');
        $this->db->like('title', $search_term);

       
        $query = $this->db->get();

        //echo $this->db->last_query();
        return $query->result_array();
    }

}

/* End of file search_model.php */
/* Location: ./system/application/models/search_model.php */
