<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Admin User</h3>
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
          
          
          <?php echo form_open_multipart((ADMIN_PATH.'/admin/edit/'.$info['id']), 'class="form-horizontal"');  ?>

          <div class="form-group">
            <label for="firstname" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-9">
              <input type="text" name="firstname" class="form-control" id="firstname" value="<?=set_value('firstname',$info['firstname']);?>">
            </div>
          </div>
          
          <div class="form-group">
            <label for="lastname" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-9">
              <input type="text" name="lastname" class="form-control" id="lastname" value="<?=set_value('lastname',$info['lastname']);?>">
            </div>
          </div>
          <div class="form-group">
            <label for="username" class="col-sm-2 control-label">User Name</label>
            <div class="col-sm-9">
              <input type="text" name="username" class="form-control" id="username" value="<?=set_value('username',$info['username']);?>">
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-9">
              <input type="email" name="email" class="form-control" id="email" value="<?=set_value('email',$info['email']);?>">
            </div>
          </div>
          
          
          <div class="form-group">
            <label for="mobile_no" class="col-sm-2 control-label">Role</label>
            <div class="col-sm-9">
              <select name="role" id="" class="form-control" >
                <option value="2" <?php if($info['role']==2){ echo "selected"; } ?> >Admin</option>
                <option value="3" <?php if($info['role']==3){ echo "selected"; } ?>>Editor</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="mobile_no" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-9">
              <select name="status" id="" class="form-control" >
                <option value="1"  <?php if($info['status']==1){ echo "selected"; } ?>>Active</option>
                <option value="0"  <?php if($info['status']==0){ echo "selected"; } ?>>InActive</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-11">
              <input type="submit" name="submit" value="Update Admin User" class="btn btn-primary pull-right">
            </div>
          </div>
          <?php echo form_close( ); ?>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </div>
</section>