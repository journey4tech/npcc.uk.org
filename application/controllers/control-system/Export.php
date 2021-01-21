
<?php defined('BASEPATH') or exit('No direct script access allowed');
class Export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('is_admin_login')) {
            redirect(ADMIN_PATH . '/admin/login', 'refresh');
        }
        $this->load->helper('download');
        $this->load->library('zip');
    }
    //---------------------------------------------------------
    public function index()
    {
        $data['title'] = 'Export Database';
        $data['view']  = 'admin/export/db_export';
        $this->load->view('admin/layout', $data);
    }
    //---------------------------------------------------------
    public function dbexport()
    {
        // redirect(base_url('admin/Export'));
        $this->load->dbutil();
        $db_format = array(
            'ignore'     => array($this->ignore_directories),
            'format'     => 'zip',
            'filename'   => 'my_db_backup.sql',
            'add_insert' => true,
            'newline'    => "\n",
        );
        $backup = &$this->dbutil->backup($db_format);
        $dbname = 'backup-on-' . date('Y-m-d') . '.zip';
        $save   = 'user_upload/db_backup/' . $dbname;
        write_file($save, $backup);
        force_download($dbname, $backup);
    }
}
