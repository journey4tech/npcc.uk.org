<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>admin_css/dist/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= ucwords($this->session->userdata('firstname').'&nbsp;'.$this->session->userdata('lastname')); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li id="dashboard" class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="dashboard"><a href="<?= base_url('admin/dashboard'); ?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
          </ul>
        </li>
      </ul>

      <ul class="sidebar-menu">
        <li id="admin" class="treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Admin</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
               <li id=""><a href="<?=site_url(ADMIN_PATH . '/admin/list'); ?>"><i class="fa fa-circle-o"></i>Admin User List</a></li>
                <li id=""><a href="<?=site_url(ADMIN_PATH . '/admin/register'); ?>"><i class="fa fa-circle-o"></i>Add Admin User</a></li>
              <!-- <li id=""><a href="<?=site_url(ADMIN_PATH . '/admin/profile'); ?>"><i class="fa fa-circle-o"></i>Admin Profile</a></li> -->
              <li id=""><a href="<?=site_url(ADMIN_PATH . '/admin/update_admin_password'); ?>"><i class="fa fa-circle-o"></i>Update Admin Password</a></li>
            </ul>
          </li>
      </ul>

     <!--  <ul class="sidebar-menu">
        <li id="users" class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Users</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id=""><a href="<?=site_url(ADMIN_PATH . '/user');?>"><i class="fa fa-circle-o"></i>Users List</a></li>
              <li id="user_add"><a href="<?=site_url(ADMIN_PATH . '/user/registration');?>"><i class="fa fa-circle-o"></i>Add New Users</a></li>
            </ul>
          </li>
      </ul>
 -->

  <ul class="sidebar-menu">
        <li id="job" class="treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Slider</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id=""><a href="<?=site_url(ADMIN_PATH . '/banner');?>"><i class="fa fa-circle-o"></i>View Slider</a></li>
              <li id=""><a href="<?=site_url(ADMIN_PATH . '/banner/create');?>"><i class="fa fa-circle-o"></i>Add New Slider</a></li>
            </ul>
          </li>
      </ul>


        <ul class="sidebar-menu">
        <li id="job" class="treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Teams</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id=""><a href="<?=site_url(ADMIN_PATH . '/team');?>"><i class="fa fa-circle-o"></i>View Teams</a></li>
              <li id=""><a href="<?=site_url(ADMIN_PATH . '/team/create');?>"><i class="fa fa-circle-o"></i>Add New Team</a></li>
            </ul>
          </li>
      </ul>


      <ul class="sidebar-menu">
        <li id="job" class="treeview">
            <a href="#">
              <i class="fa fa-bars"></i> <span>Categories</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id=""><a href="<?=site_url(ADMIN_PATH . '/category');?>"><i class="fa fa-circle-o"></i>View Categories</a></li>
              <li id=""><a href="<?=site_url(ADMIN_PATH . '/category/create');?>"><i class="fa fa-circle-o"></i>Add New Category</a></li>
            </ul>
          </li>
      </ul>

      <ul class="sidebar-menu">
        <li id="job" class="treeview">
            <a href="#">
              <i class="fa fa-file-text"></i> <span>Blog</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id=""><a href="<?=site_url(ADMIN_PATH . '/blog');?>"><i class="fa fa-circle-o"></i>View Blogs</a></li>
              <li id=""><a href="<?=site_url(ADMIN_PATH . '/blog/create');?>"><i class="fa fa-circle-o"></i>Add New Blog</a></li>
            </ul>
          </li>
      </ul>



      

    



 
 

      <ul class="sidebar-menu">
        <li id="pages" class="treeview">
            <a href="#">
              <i class="fa fa-file-o"></i> <span>Pages</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id=""><a href="<?=site_url(ADMIN_PATH . '/page');?>"><i class="fa fa-circle-o"></i>Pages</a></li>
              <li id=""><a href="<?=site_url(ADMIN_PATH . '/page/create');?>"><i class="fa fa-circle-o"></i>Add new page</a></li>
            </ul>
          </li>
      </ul>



      
      <ul class="sidebar-menu">
         <li class="header">BACKUP</li>
        <li id="export" class="treeview">
            <a href="#">
              <i class="fa fa-life-ring"></i> <span>Backup & Export</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=""><a href="<?=site_url(ADMIN_PATH . '/export'); ?>"><i class="fa fa-circle-o"></i> Database Backup </a></li>
            </ul>
          </li>
      </ul>  

      <ul class="sidebar-menu">
        <li class="header">SETTING</li>
        <li id="setting" class="treeview">
            <a href="<?=site_url(ADMIN_PATH . '/site_settings');?>">
              <i class="fa fa-cogs"></i> <span>Website Settings</span>
            </a>
          </li>
      </ul> 

      

    </section>
    <!-- /.sidebar -->
  </aside>

  
<script>
  $("#<?= $cur_tab ?>").addClass('active');
</script>
