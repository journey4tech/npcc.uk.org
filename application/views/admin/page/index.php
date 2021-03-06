<script>
function confirm_delete(){
var deletedata=confirm("Are you sure you want to delete this page Permanently?");
if(deletedata==true){
return true;
}else{
return false;
}
}
</script>
<section class="content">
  <div class="row">
    <div class="col-md-3">
      <a href="<?=site_url(ADMIN_PATH.'/page/create')?>">
        <button type="submit" class="btn btn-primary">Add Page</button>
      </a>
    </div>
  </div>
  </br>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Page Detail Listing</h3>
        </div>
        
        <div class="box-body">
          <?php $this->load->view('admin/include/_messages'); ?>
          <table class="table table-striped table-bordered table-hover " id="example1" >
            <!-- <table id="example1" class="table table-bordered table-striped"> -->
            <thead>
              <tr>
                
                <th>Sn.</th>
                <th>Title</th>
                <th>Status</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=0;
              foreach($records as $row){
              //print_r($row);
              $i++;
              ?>
              <tr>
                <td><?php echo $row['id']; ?></td>
                
                
                <td class="center "><?=$row['title']?></td>
                <td class="text-center">
                  <?php
                  if($row['status']=='1')
                  {
                  ?>
                  
                  <a href="<?=site_url(ADMIN_PATH.'/page/change_status/1/'.$row['id'])?>"> <label class="label bg-green">Active</label></a>
                  <?php
                  }
                  else if($row['status']=='0')
                  {
                  ?>
                  <a href="<?=site_url(ADMIN_PATH.'/page/change_status/0/'.$row['id'])?>">  <label class="label bg-red">InActive</label></a>
                  <?php
                  }
                  ?>
                </td>
                <td class="center">
                  <a class="btn btn-default btn-xs"  href="<?=site_url(ADMIN_PATH.'/page/edit/'.$row['id']) ?>">
                    <i class="fa fa-edit"></i> Ediit
                  </a>
                  <a onclick="return confirm_delete();" class="btn btn-danger btn-xs" href="<?=site_url(ADMIN_PATH.'/page/soft_delete/'.$row['id']) ?>">
                    <i class="fa fa-trash"></i> Delete
                  </a>
                </td>
              </tr>
              <?php } ?>
              
              
            </tbody>
          </table>
        </div>
      </div>
      
    </div>
  </div>
</section>