<div class="row">
  <div class="col-lg-12">
    <?php if ($this->session->flashdata('success')) :?>
    <div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> <strong>
      <?=$this->session->flashdata('success')?>
      </strong> 
    </div>
    <?php endif;?>

    <section  class="panel">
      <div class="panel-body">
          <h4 class="head3" style="display: inline-block;"> <strong>Manage Posts</strong></h4> 
          <div class="button-inline pull-right">
              <a href="<?= base_url('admin/blog/post')?>" class="btn btn-primary"><span class="fa fa-plus"></span>&nbsp;&nbsp;Add New Post</a>
          </div>
      </div>
    </section>

 

    <section class="panel">
      <div class="panel-body">
        <div class="panel-heading">
          <h4>Manage Posts</h4>
        </div>
        <div class="adv-table">
          <table  id="na_datatable"  class="table table-bordered table-striped">
            <thead>
              <tr>
                <th> #</th>
                <th>Image</th>
                <th>Title</th>
                
                <th>status</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </section>
  </div>
</div>

 
<script>
//---------------------------------------------------
  var table = $('#na_datatable').DataTable( {
      "processing": true,
      "serverSide": false,
      "pageLength": 10,
      "ajax": "<?=base_url('control-system/blog/datatable_json')?>",
    "order": [[3,'desc']],
      "columnDefs": [
        { "targets": 0, "name": "id", 'searchable':false, 'orderable':false},
        { "targets": 1, "name": "image", 'searchable':true, 'orderable':true},
        { "targets": 2, "name": "title", 'searchable':true, 'orderable':true},
        { "targets": 3, "name": "status", 'searchable':true, 'orderable':true},
        { "targets": 4, "name": "action", 'searchable':false, 'orderable':false}
      ]
    });
    
  //---------------------------------------------------
  // function post_filter()
  // {
  //   $.post('<?=base_url('admin/blog/search')?>',$('#blog_search').serialize(),function(){
  //     table.ajax.reload( null, false );
  //   });
  // }
  // post_filter();
  //----------------------------------------------------------------        
</script>
<script>
    $('li#blog').addClass('active');
</script>
