<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <div class="container">
      <div class="wrap-login100">
        <?php $attributes = array('id' => 'registeration_form', 'method' => 'post',  'class' => 'login100-form validate-form'); ?>

        <?php echo form_open('auth/registration',$attributes); ?>
          <span class="login100-form-title pb-5">
            Sign Up
          </span>
           <?php 
              if($this->session->flashdata('validation_errors')){

                echo '<div class="alert alert-danger">' . $this->session->flashdata('validation_errors') . '</div>';
              }
          ?>
          <div class="wrap-input100 mb-3" data-validate = "Valid name is required: johnny">
            <input class="input100" type="text" name="firstname" value="<?= set_value("firstname"); ?>" placeholder="First Name">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-user"></span>
            </span>
          </div>

          <div class="wrap-input100 mb-3" data-validate = "Valid name is required: smith">
            <input class="input100" type="text" name="lastname" value="<?= set_value("lastname"); ?>" placeholder="Last Name">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-user"></span>
            </span>
          </div>

          <div class="wrap-input100 mb-3" data-validate = "Valid email is required: ex@abc.xyz">
            <input class="input100" type="email" name="email" value="<?= set_value("email"); ?>" placeholder="Email">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-envelope"></span>
            </span>
          </div>

          <div class="wrap-input100 mb-3" data-validate = "Password is required">
            <input class="input100" type="password" name="password" value="<?= set_value("password"); ?>" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-lock"></span>
            </span>
          </div>

          <div class="wrap-input100 mb-3" data-validate = "Password is required">
            <input class="input100" type="password" name="confirmpassword" placeholder="Confirm Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <span class="lnr lnr-lock"></span>
            </span>
          </div>

          <div class="contact100-form-checkbox pt-2 ml-1">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="termsncondition">
            <label class="label-checkbox100" for="ckb1">
              Terms & Conditions
            </label>
          </div>

          <?php /* if($this->recaptcha_status): ?>
              <div class="recaptcha-cnt">
                  <?php generate_recaptcha(); ?>
              </div>
          <?php endif; */?>
          
          <div class="container-login100-form-btn">
            <input type="submit" class="login100-form-btn" name="submit" value="Sign Up">
          </div>
        </form>

        <div class="text-center w-full pt-4">
            <span class="txt1">
              Already a member?
            </span>

            <a class="txt1 bo1 hov1" href="<?=base_url(); ?>auth/login">
              Sign in now             
            </a>
        </div>
      </div>
    </div>