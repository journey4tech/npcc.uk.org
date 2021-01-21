<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Update Admin User Password</h3>
        </div>

        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php $this->load->view('admin/include/_messages'); ?>


          <?php $attributes = array('id' => 'update_any_admin_password', 'method' => 'post', 'class' => 'form_horizontal');?>
          <?php echo form_open(base_url() . ADMIN_PATH . '/admin/update_admin_password/', $attributes); ?>

          <div class="form-group">
              <label>Admin User List</label>
            <select name="id" id="" class="form-control">
              <?php foreach ($admin_user as $row): ?>
              <option value="<?php echo $row['id'] ?>"><?php echo $row['username'] ?> - <?php echo $row['email'] ?></option>
              <?php endforeach?>
            </select>
          </div>
          <div class="form-group">
            <label>New Password</label>
            <input type="Password" class="form-control" name="password">
          </div>

          <div class="row">
            <div class="col-md-12 mt-4">
              <input class="btn btn-primary px-5 btn-md" value="Update Admin Password" type="submit" name="submit">
              
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</section>