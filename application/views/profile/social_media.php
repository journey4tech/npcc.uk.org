<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Wrapper -->
<div id="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="nav-breadcrumb" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $title; ?></li>
                    </ol>
                </nav>

                <h1 class="page-title">Settings</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-3">
                <div class="row-custom">
                    <!-- load profile nav -->
                    <?php $this->load->view("profile/user_side_nav"); ?>
                </div>
            </div>

            <div class="col-sm-12 col-md-9">
                <div class="row-custom">
                    <div class="profile-tab-content">
                        <!-- include message block -->
                        <?php $this->load->view('partials/_messages'); ?>

                        <?php echo form_open("profile_controller/social_media_post", ['id' => 'form_validate']); ?>

                        <div class="form-group">
                            <label class="control-label">Facebook url</label>
                            <input type="text" class="form-control form-input" name="facebook url"
                                   placeholder="facebook_url" value="<?php echo html_escape($user->facebook_url); ?>">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Twitter url</label>
                            <input type="text" class="form-control form-input"
                                   name="twitter_url" placeholder="twitter url"
                                   value="<?php echo html_escape($user->twitter_url); ?>">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Instagram url</label>
                            <input type="text" class="form-control form-input" name="instagram_url" placeholder="instagram url"
                                   value="<?php echo html_escape($user->instagram_url); ?>">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Pinterest url</label>
                            <input type="text" class="form-control form-input" name="pinterest_url" placeholder="pinterest url"
                                   value="<?php echo html_escape($user->pinterest_url); ?>">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Linkedin url</label>
                            <input type="text" class="form-control form-input" name="linkedin url" placeholder="linkedin_url"
                                   value="<?php echo html_escape($user->linkedin_url); ?>">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Vk url</label>
                            <input type="text" class="form-control form-input" name="vk_url"
                                   placeholder="vk url" value="<?php echo html_escape($user->vk_url); ?>">
                        </div>

                        <div class="form-group">
                            <label class="control-label">Youtube url</label>
                            <input type="text" class="form-control form-input" name="youtube_url"
                                   placeholder="youtube url" value="<?php echo html_escape($user->youtube_url); ?>">
                        </div>

                        <button type="submit" class="btn btn-md btn-custom">Save Changes</button>
                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wrapper End-->

