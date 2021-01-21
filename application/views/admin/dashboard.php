
<!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Users</span>
              <span class="info-box-number"><?= $all_users; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        

    
  
   
  
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
         

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Users</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin" style="font-size: 13px;">
                  <thead>
                  <tr>
                    <th>Username</th>
                    <th>Email</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($latest_users as $row): ?>
                    <tr>
                      <td><a href="#"><?php echo $row['username'] ?></a></td>
                      <td><p><?php echo $row['email']; ?></td>
                      
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?=site_url(ADMIN_PATH.'/user') ?>" class="btn btn-sm btn-default btn-flat pull-right">View All Users</a>
            </div>
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