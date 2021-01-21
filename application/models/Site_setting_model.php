<?php
class Site_setting_model extends CI_Model
{
    public function __construct()
    {
//parent::CI_Model();
    }

        //-----------------------------------------------------
    public function get_general_settings(){
        $this->db->where('site_id', 1);
        $query = $this->db->get('sitesettings');
        return $query->row_array();
    }


    public function get_site_info($site_id)
    {
        $options = array('site_id' => $site_id);
        $query   = $this->db->get_where('sitesettings', $options, 1);
        return $query->row_array();
    }
    public function update_site_settings($image = '',$favicon='')
    {
        if ($image == '') {
            $image = $this->input->post('prev_image');
        }
        if ($favicon == '') {
            $favicon = $this->input->post('prev_favicon');
        }
        $data = array(
            'application_name'     => $this->input->post('application_name'),
            'site_title'           => $this->input->post('site_title'),
            'meta_keyword'         => $this->input->post('meta_keyword'),
            'meta_description'     => $this->input->post('meta_description'),
            'offline'              => $this->input->post('offline'),
            'phone'                => $this->input->post('phone'),
            'fax'                  => $this->input->post('fax'),
            'email'                => $this->input->post('email'),
            'address'              => $this->input->post('address'),
            'logo'                 => $image,
            'favicon'              => $favicon,
            'currency'             => $this->input->post('currency'),
            'status'               => $this->input->post('status'),
            'map'                  => $this->input->post('map'),
            'footer_detail'        => $this->input->post('footer_detail'),
            'copy'                 => $this->input->post('copy'),
            'facebook_url'         => $this->input->post('facebook_url'),
            'twitter_url'          => $this->input->post('twitter_url'),
            'instagram_url'        => $this->input->post('instagram_url'),
            'pinterest_url'        => $this->input->post('pinterest_url'),
            'linkedin_url'         => $this->input->post('linkedin_url'),
            'vk_url'               => $this->input->post('vk_url'),
            'youtube_url'          => $this->input->post('youtube_url'),
            'facebook_app_id'      => $this->input->post('facebook_app_id'),
            'facebook_app_secret'  => $this->input->post('facebook_app_secret'),
            'google_client_id'     => $this->input->post('google_client_id'),
            'google_client_secret' => $this->input->post('google_client_secret'),
            'header_script'        => $this->input->post('header_script'),
            'email_from'           => $this->input->post('email_from'),

            
            'mail_library'           => $this->input->post('mail_library'),
            'mail_protocol'        => $this->input->post('mail_protocol'),
            'mail_host'            => $this->input->post('mail_host'),
            'mail_port'            => $this->input->post('mail_port'),
            'mail_username'            => $this->input->post('mail_username'),
            'mail_password'            => $this->input->post('mail_password'),
            'head_code'            => $this->input->post('head_code'),
            'footer_code'          => $this->input->post('footer_code'),
        );
        $this->db->where('site_id', '1');
        $this->db->update('sitesettings', $data);
        // print_r($this->db->last_query());
        // exit();
    }
}
/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */
