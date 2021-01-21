<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create User</h3>
        </div>
        
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          
          <div class="col-md-12">
            <?php if(validation_errors() !== ''): ?>
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-warning"></i> Alert!</h4>
              <?= validation_errors();?>
              <?= isset($msg)? $msg: ''; ?>
            </div>
            <?php endif; ?>
          </div>
          
          
          <?php echo form_open('', 'class="form-horizontal"');  ?>
          <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-9">
              <input type="text" name="firstname" class="form-control" id="firstname" placeholder="">
            </div>
          </div>
          
          <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-9">
              <input type="text" name="lastname" class="form-control" id="lastname" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="username" class="col-sm-2 control-label">User Name</label>
            <div class="col-sm-9">
              <input type="text" name="username" class="form-control" id="username" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-9">
              <input type="email" name="email" class="form-control" id="email" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-9">
              <input type="password" name="password" class="form-control" id="password" placeholder="">
            </div>
          </div>
          
          <div class="form-group">
            <label for="mobile_no" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-9">
              <select name="status" id="" class="form-control" >
                <option value="1">Active</option>
                <option value="0">InActive</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-11">
              <input type="submit" name="submit" value="Add User" class="btn btn-primary pull-right">
            </div>
          </div>
          <?php echo form_close( ); ?>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
</section>