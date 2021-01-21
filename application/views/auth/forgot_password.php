<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Wrapper -->
<div id="wrapper">
    <div class="container">
        <div class="auth-container">
            <div class="auth-box">
                <div class="row">
                    <div class="col-12">
                        <h1 class="title">Reset Password</h1>
                        <!-- form start -->
                        <?php echo form_open('auth_controller/forgot_password_post', ['id' => 'form_validate']); ?>

                        <div class="form-group">
                            <p class="p-social-media m-0">Enter your email address</p>
                        </div>
                        <!-- include message block -->
                        <?php $this->load->view('partials/_messages'); ?>

                        <div class="form-group m-b-30">
                            <input type="email" name="email" class="form-control auth-form-input" placeholder="email address" value="<?php echo old("email"); ?>" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-md btn-custom btn-block">Submit</button>
                        </div>

                        <?php echo form_close(); ?>
                        <!-- form end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wrapper End-->