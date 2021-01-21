<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Wrapper -->
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><?php echo trans("home"); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="profile-page-top">
                    <!-- load profile details -->
                    <?php $this->load->view("profile/_profile_user_info"); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-3">
                <!-- load profile nav -->
                <?php // $this->load->view("profile/_profile_tabs"); ?>
            </div>
 
            <div class="col-sm-12 col-md-9">
                <div class="profile-tab-content">
                    <?php if ($this->session->has_userdata('user_id') == $user->id):
                        
                        
                        $this->load->view('ads/user_login_profile_ads');
                        
                    else: ?>
                        <div class="row row-product-items row-product">
                            <!--print products-->
                             
                               
                                   <?php  $this->load->view('ads/user_profile_ads_public'); ?>
                                
                        
                        </div>
                    <?php endif; ?>
                </div>

                <div class="product-list-pagination">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
                <div class="row-custom">
                    <!--Include banner-->
                    <?php // $this->load->view("partials/_ad_spaces", ["ad_space" => "profile", "class" => "m-t-30"]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wrapper End-->

<!-- include send message modal -->
<?php $this->load->view("partials/_modal_send_message", ["subject" => null]); ?>


