<!-- Main content -->
<section class="content">
  
  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <div class="col-md-12">
      
      <!-- TABLE: LATEST ORDERS -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Admin Users [ Admin user cannot be deleted / Make Status Inactive to remove admin user access Level ]  </h3>
          <?php $this->load->view('admin/include/_messages'); ?>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <!-- <div class="table-responsive"> -->
          <table class="table table-striped table-bordered table-hover" style="font-size: 13px;">
            <thead>
              <tr>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Option</th>
                
              </tr>
            </thead>
            <tbody>
              <?php foreach($records as $row): ?>
              <tr>
                <td><a href="#"><?= $row['firstname']. ' '.$row['lastname'] ; ?></a></td>
                <td><p><?= $row['username']; ?></td>
                <td><p><?= $row['email']; ?></td>
                <td class="text-center">
                  
                  <?php
                  if($row['role']=='1')
                  {
                  ?>
                  <span class="btn btn-default btn-xs">Super Admin</span>
                  <?php
                  }
                  else if($row['role']=='2')
                  {
                  ?>
                  <span class="btn btn-default btn-xs">Admin</span>
                  <?php
                  }else{
                  ?>
                  <span class="btn btn-default btn-xs">Editor</span>
                  <?php } ?>
                </td>
                <td class="text-center">
                  <?php
                  if($row['status']=='1')
                  {
                  ?>
                  <span class="btn btn-success btn-xs">Active</span>
                  <?php
                  }
                  else if($row['status']=='0')
                  {
                  ?>
                  <span class="btn btn-danger btn-xs">Inactive</span>
                  <?php
                  }
                  ?>
                </td>
                <td class="center">
                  <?php if($row['id']==superadmin_developer_id){ ?>
                  
                  <?php } else{?>
                  <a class="btn btn-info btn-xs"  href="<?=site_url(ADMIN_PATH.'/admin/edit/'.$row['id']) ?>">
                    <i class="fa fa-edit"></i> Ediit
                  </a>
                  <?php } ?>
                  <!-- <a onclick="return confirm_delete();" class="btn btn-danger btn-xs" href="<?=site_url(ADMIN_PATH.'/admin/delete/'.$row['id']) ?>">
                    <i class="fa fa-trash"></i> Delete
                  </a> -->
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <!-- </div> -->
          <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
    
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<script>
$("#dashboard1").addClass('active');
</script>