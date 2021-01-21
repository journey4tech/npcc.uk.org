<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . "third_party/image-resize/ImageResize.php";
include APPPATH . "third_party/image-resize/ImageResizeException.php";

use \Gumlet\ImageResize;
use \Gumlet\ImageResizeException;

class Upload_model extends CI_Model
{
    //upload temp image
    public function upload_temp_image($file_name)
    {
        if (isset($_FILES[$file_name])) {
            if (empty($_FILES[$file_name]['name'])) {
                return null;
            }
        }
        $config['upload_path'] = './user_upload/temp/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['file_name'] = 'img_temp_' . generate_unique_id();
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file_name)) {
            $data = array('upload_data' => $this->upload->data());
            if (isset($data['upload_data']['full_path'])) {
                return $data['upload_data']['full_path'];
            }
            return null;
        } else {
            return null;
        }
    }

 
    public function avatar_upload($path)
    {
        try {
            $image = new ImageResize($path);
            $image->quality_jpg = 85;
            $image->crop(240, 240, true);
            $new_path = 'user_upload/users/avatar_' . uniqid() . '.jpg';
            $image->save(FCPATH . $new_path, IMAGETYPE_JPEG);
            return $new_path;
        } catch (ImageResizeException $e) {
            return null;
        }
    }

 

	//check file mime type
	public function check_file_mime_type($file_name, $allowed_types)
	{
		if (!isset($_FILES[$file_name])) {
			return false;
		}
		if (empty($_FILES[$file_name]['name'])) {
			return false;
		}
		$ext = pathinfo($_FILES[$file_name]['name'], PATHINFO_EXTENSION);
		if (in_array($ext, $allowed_types)) {
			return true;
		}
		return false;
	}

 

	//delete temp image
	public function delete_temp_image($path)
	{
		if (file_exists($path)) {
			@unlink($path);
		}
	}
}
