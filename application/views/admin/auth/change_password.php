 <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $this->session->userdata('username'); ?> ! you want to  Update your Password</h3>
        </div>

        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php $this->load->view('admin/include/_messages'); ?>
          
          <div class="card-body">
            <?php $attributes = array('id' => 'Change_Password_form', 'method' => 'post' , 'class' => 'form_horizontal'); ?>

            <?php echo form_open(base_url() . ADMIN_PATH . '/admin/change_password/',$attributes);?>
             

            

              <div class="form-group">
                <label>New Password</label>
                <input type="Password" class="form-control" name="password">
              </div>

              <div class="form-group">
                <label>Confirm Password</label>
                <input type="Password" class="form-control" name="confirm_pwd">
              </div>

              <div class="row">
                <div class="col-md-12 mt-4">
                  <input class="btn btn-primary px-5 btn-md" value="Save" type="submit" name="update_password">
                   
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>