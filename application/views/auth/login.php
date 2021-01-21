 
<?php 
    //check if logged in
        if (auth_check()) {
            redirect(base_url());
        }
         ?>

<?php // if (!$this->session->has_userdata('is_admin_login')) : ?>
	<!-- Login Modal -->
<div id="wrapper">
	<div class="container">
		<div class="auth-container">
				<div class="auth-box">
					<button type="button" class="close" data-dismiss="modal"><i class="icon-close"></i></button>
					<h4 class="title">Login</h4>
					<!-- form start -->
					<?php $this->load->view('partials/_messages'); ?>
					<!-- <form id="form_login" novalidate="novalidate"> -->

						<?php echo form_open('auth_controller/login_post', ['id' => 'form_login', 'class' => 'validate_terms','novalidate'=>'novalidate']); ?>
						<div class="social-login-cnt">
							<?php $this->load->view("partials/_social_login", ["or_text" => "Login with email"]); ?>
						</div>
						<!-- include message block -->
						<div id="result-login" class="font-size-13"></div>
						<div class="spinner display-none spinner-activation-login">
							<div class="bounce1"></div>
							<div class="bounce2"></div>
							<div class="bounce3"></div>
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control auth-form-input" placeholder="Email Address" required>
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control auth-form-input" placeholder="Password" minlength="4" required>
						</div>
						<div class="form-group text-right">
							<a href="<?php echo base_url(); ?>forgot-password" class="link-forgot-password">Forgot Password</a>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-md btn-custom btn-block">Login</button>
						</div>

						<p class="p-social-media m-0 m-t-5">Don't Have Account&nbsp;<a href="<?php echo base_url(); ?>register" class="link">Register</a></p>
					</form>
					<!-- form end -->
				</div>
			</div>
		</div>
	</div>
<?php // endif; ?>



<style>
	.auth-box .title {
    font-size: 24px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 20px;
}
	.p-social-media {
    text-align: center;
    color: #777;
    margin-top: 7px;
    margin-bottom: 2px;
}
	.auth-container {
    justify-content: center;
    padding-top: 30px;
    width: 100%;
    min-height: 720px;
}
	.auth-box {
    background: #fff;
    box-shadow: 0 1px 1px 0 rgba(0,0,0,0.1);
    padding: 30px;
    width: 420px;
    max-width: 100%;
    border-radius: 6px;
    border: 1px solid #e6e6e6;
    margin: 0 auto;
    margin-top: 30px;
}
</style>