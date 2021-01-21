<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Blog_model');
    }

    public function index()
    {
        $data['records'] = $this->Blog_model->get_all();
        $data['view']    = 'admin/blog/index';
        $this->load->view('admin/layout', $data);

       // $data['records'] = $this->Blog_model->get_all();
        //$data['view']    = 'admin/blog/datatable';
       // $this->load->view('admin/layout', $data);

    }

    public function create()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('slug', 'Slug', 'required');

        if ($this->form_validation->run() == false) {
            $data['view'] = 'admin/blog/create';
            $this->load->view('admin/layout', $data);
        } else {

            $uploaded_details = $this->upload_image('image');
            $this->Blog_model->create($uploaded_details['file_name']);
            $this->session->set_flashdata('success', 'Page Added Successfully ');
            //$this->session->set_flashdata('success', trans("blog") . " " . trans("msg_suc_added"));
            redirect(ADMIN_PATH . '/blog', 'refresh');
        }

    }

        // Post New blog
    public function post()
    {
        //$admin_id = $this->session->userdata('admin_id');
        if ($this->input->post('blog_post')) {
            // print_r($_POST); exit();
            $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('description', 'Content', 'trim|required|min_length[3]');
            if ($this->form_validation->run() == false) {
                $data = array(
                    'errors' => validation_errors(),
                );
                $this->session->set_flashdata('error', $data['errors']);
                redirect(ADMIN_PATH . '/blog/post', 'refresh');
            } else {
                $data = array(
                    'title'            => ucfirst($this->input->post('title')),
                    'second_title'     => $this->input->post('second_title'),
                    'slug'             => $this->input->post('slug'),
                    'description'      => $this->input->post('description'),
                    'meta_title'       => $this->input->post('meta_title'),
                    'meta_keyword'     => $this->input->post('meta_keyword'),
                    'meta_description' => $this->input->post('meta_description'),
                    'show_home'        => $this->input->post('show_home'),
                    'status'           => $this->input->post('status'),
                    'created_at'       => date('Y-m-d H:i:s'),
                );

                 
                //$path = "user_upload/blogs/";
                /***************************************
                Upload image making folder by month
                **/
                $date = date('Y-m');
                if (!is_dir('user_upload/blog/' . $date)) {
                    mkdir('./user_upload/blog/' . $date, 0777, true);
                }
                $path = "user_upload/blog/$date/";
               /**********************************************/

                // check all mendatory files
                // if (empty($_FILES['image']['name'])) {
                //     $this->session->set_flashdata('error', 'Post Media field is mandatory');
                //     redirect(ADMIN_PATH . '/blog/post', 'refresh');
                // }

                // profile picture
                if (!empty($_FILES['image']['name'])) {
                    $result = $this->functions->file_insert($path, 'image', 'image', '1000000');
                    if ($result['status'] == 1) {
                        $data['image'] = $result['msg'];
                    } else {
                        $this->session->set_flashdata('error', $result['msg']);
                        redirect(ADMIN_PATH . '/blog/post', 'refresh');
                    }
                }

                $data = $this->security->xss_clean($data);

                $res = $this->Blog_model->add_post($data);

                if ($res) {
                    $this->session->set_flashdata('success', 'Congratulation! Post has been Listed successfully');
                    redirect(ADMIN_PATH . '/blog', 'refresh');
                } else {
                    echo "failed";
                }
            }
        } else {
            $data['title'] = 'Blog Post';
            $data['view']  = 'admin/blog/create';
            $this->load->view('admin/layout', $data);
        }
    }

    //}

    public function edit($id)
    {
        $data['info'] = $info = $this->Blog_model->get_info($id);
        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == false) {
            $data['view'] = 'admin/blog/edit';
            $this->load->view('admin/layout', $data);
        } else {
            $uploaded_details = $this->upload_image('image');
            if ($uploaded_details['file_name'] != '') {
                $image = $uploaded_details['file_name'];
                if (file_exists("./user_upload/blogs/" . $info['image'])) {
                    @unlink("./user_upload/blogs/" . $info['image']);
                }
            } else {
                $image = $info['image'];
            }

            $this->Blog_model->update($image);
            $this->session->set_flashdata('success', 'Page Edit Successfully !');
            redirect(ADMIN_PATH . '/blog', 'refresh');

        }
    }

    public function soft_delete($id)
    {
        $this->Blog_model->soft_delete($id);
        $this->session->set_flashdata('message', 'Trashed');
        redirect(ADMIN_PATH . '/blog', 'refresh');
    }

    public function delete($id)
    {
        $this->Blog_model->delete($id);

        $info = $this->Blog_model->get_info($id);
        if (file_exists("./user_upload/blogs" . $info['image'])) {
            @unlink("./user_upload/blogs" . $info['image']);
        }
        $this->session->set_flashdata('message', 'Deleted');
        redirect(ADMIN_PATH . '/blog', 'refresh');
    }

    public function change_status($status = '', $id = '')
    {
        $this->Blog_model->change_status($status, $id);
        redirect(ADMIN_PATH . '/blog', 'refresh');
    }

    public function upload_image($file)
    {

        $config['upload_path']   = './user_upload/blogs';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = '1000000000';
        $config['max_width']     = '1000000000';
        $config['max_height']    = '1000000000';
        $config['remove_spaces'] = 'true';

        $this->load->library('upload', $config);
        $this->upload->do_upload($file);
        if ($this->upload->display_errors()) {
            $this->error = $this->upload->display_errors();

            return false;
        } else {
            $data = $this->upload->data();

            return $data;
        }
    }

    //---------------------------------------------------------------------------
    //------------------------------------------------
    public function datatable_json()
    {                                  
        $records = $this->Blog_model->get_all();
        $data = array();

        $i= 1;
        foreach ($records  as $row) 
        {
            $status = ($row['status'] == 0)? 'Inactive': 'Active'.'<span>';
            $buttoncontroll = '
                  <a class="edit btn btn-xs btn-primary" href='.base_url("admin/blog/edit/".$row['id']).' title="Edit" > 
                 <i class="fa fa-edit"></i> Edit</a>&nbsp;&nbsp;

                 <a class="btn-delete btn btn-xs btn-danger" href='.base_url("admin/blog/del/".$row['id']).' title="Delete" onclick="return confirm(\'Do you want to delete ?\')"> 
                 <i class="fa fa-trash-o"></i> Delete</a>';
            
            $data[]= array(
                $i++,
                '<img src="'.base_url($row['image']).'" width="50">',
                $row['title'],  
               '<span class="btn btn-success btn-flat btn-xs" title="status">'.$status.'<span>',    
               // $row['created_at'],
               // date_time($row['created_at']),
                $buttoncontroll
            );
        }

        $records['data'] = $data;
        
        echo json_encode($records);                        
    }


    //--------------------------------------------------------  
    // Edit Job
    public function update($id=0)
    {       
         
        if ($this->input->post('edit_blog')) {
           $this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[3]');
            $this->form_validation->set_rules('description', 'Content', 'trim|required|min_length[3]');

            if ($this->form_validation->run() == FALSE) {
                $data = array(
                    'errors' => validation_errors(),
                );

                $this->session->set_flashdata('error',$data['errors']);
                 // redirect(base_url('employers/blog/edit/'.$post_id),'refresh');
                  redirect(ADMIN_PATH . '/blog/update/'.$id, 'refresh');

            }
            else{

                $data = array(
                    'title'            => ucfirst($this->input->post('title')),
                    'second_title'     => $this->input->post('second_title'),
                    'slug'             => $this->input->post('slug'),
                    'description'      => $this->input->post('description'),
                    'meta_title'       => $this->input->post('meta_title'),
                    'meta_keyword'     => $this->input->post('meta_keyword'),
                    'meta_description' => $this->input->post('meta_description'),
                    'show_home'        => $this->input->post('show_home'),
                    'status'           => $this->input->post('status'),
                    //'created_at'       => date('Y-m-d H:i:s'),
                );

                $path = "user_upload/blogs/";

                // check all mendatory files
                if(empty($_FILES['image']['name']))
                {
                    $data['image'] = $this->input->post('old_media');
                }

                // profile picture
                if(!empty($_FILES['image']['name']))
                {
                    unlink($this->input->post('old_image'));
                    
                    $result = $this->functions->file_insert($path, 'image', 'image', '1000000');
                    if($result['status'] == 1){
                        $data['image'] = $path.$result['msg'];
                    }
                    else
                    {
                        $this->session->set_flashdata('error', $result['msg']);
                        redirect(ADMIN_PATH . '/blog/', 'refresh');
                    }
                }

                $data = $this->security->xss_clean($data);
                $this->Blog_model->edit_post($data,$id);

                $this->session->set_flashdata('success','Congratulation! Post has been Updated successfully');
                redirect(base_url('admin/blog/'));
                
            }
        }
        else{
            
            $data['info'] = $info = $this->Blog_model->get_info($id);
            $data['title'] = 'Edit Post';
            $data['view']  = 'admin/blog/update';
            $this->load->view('admin/layout', $data);
        }  
    }

}
