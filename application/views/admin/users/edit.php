<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Team Details</h3>
        </div>
        <div class="box-body">
          <form name="frm" id="frm" method="post"   enctype="multipart/form-data" class="form-horizontal" action="<?=site_url(ADMIN_PATH.'/category/edit/'.$info['id'])?>">
            <div class="form-group <?php echo (form_error('name') ? 'has-error' : '') ?>">
              <label  class="control-label col-lg-2">Title</label>
              <div class="col-lg-6">
                <input name="name" id="name" type="text" class="form-control required" value="<?=set_value('name',$info['name']);?>">
              </div>
            </div>
            
            <div class="form-group  <?php echo (form_error('slug') ? 'has-error' : '') ?>">
              <label  class="control-label col-lg-2">Slug</label>
              <div class="col-lg-6">
                <input name="slug" type="text" id="slug" class="form-control " value="<?=set_value('slug',$info['slug']);?>">
              </div>
            </div>
            <div class="form-group <?php echo (form_error('rank') ? 'has-error' : '') ?>">
              <label for="text1" class="control-label col-lg-2">Menu Order</label>
              <div class="col-lg-6">
                <input type="number"  name="rank" id="rank" class="form-control" id="" placeholder="" value="<?=set_value('rank',$info['rank']);?>">
              </div>
              <?php echo form_error('rank')?>
            </div>
            
            
            
            
            <div class="form-group">
              <label  class="control-label col-lg-2">Show in Menu</label>
              <div class="col-lg-6">
                <input type="radio" name="show_home" value="0" <?php if($info['show_home']==0) echo "checked";?> >
                Not showing
                <input type="radio" name="show_home" value="1" <?php if($info['show_home']==1) echo "checked";?> />
              Show in Home </div>
            </div>
            <div class="form-group">
              <label for="text1" class="control-label col-lg-2">Meta Title</label>
              <div class="col-lg-6">
                <input name="meta_title" id="meta_title" type="text" class="form-control required"  value="<?php echo set_value('meta_title',$info['meta_title']);?>">
              </div>  <?=form_error('meta_title')?>
            </div>
            <div class="form-group">
              <label for="text1" class="control-label col-lg-2">Meta Keyword</label>
              <div class="col-lg-6">
                <input name="meta_keyword" id="meta_keyword" type="text" class="form-control required"  value="<?php echo set_value('meta_keyword',$info['meta_keyword']);?>">
              </div>  <?=form_error('meta_keyword')?>
            </div>
            <div class="form-group">
              <label for="text1" class="control-label col-lg-2">Meta Description</label>
              <div class="col-lg-6">
                <input name="meta_description" id="meta_description" type="text" class="form-control required"  value="<?php echo set_value('meta_description',$info['meta_description']);?>">
              </div>  <?=form_error('meta_description')?>
            </div>
            <div class="form-group">
              <label  class="control-label col-lg-2">Status</label>
              <div class="col-lg-6">
                <input type="radio" name="status" value="0" <?php if($info['status']==0) echo "checked";?> >
                Inactive
                <input type="radio" name="status" value="1" <?php if($info['status']==1) echo "checked";?> />
              Active </div>
            </div>
            <input type="hidden" name="id" value="<?=$info['id']?>" />
            <div class="form-group">
              <label for="text1" class="control-label col-lg-2"></label>
              <div class="col-lg-6">
                <input type="submit" value="UPDATE" class="navigation_button btn btn-primary"/>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
  $("#name").keyup(function () {
  // alert('hi');
  var str = $(this).val();
  // var slug=trimmed.replace(/[^a-z0-9-]/gi, '-').
  // replace(/-+/g, '-').
  //replace(/^-|-$/g, '');
  var slug=str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
  var slug=str.replace(/^\s+|\s+$/gm,'');
  var slug=str.replace(/\s+/g, '-');
  var trimmed=$.trim(str)
  var check =slug.toLowerCase();
  var meta_title=$.trim(str)
  var meta_keyword=$.trim(str)
  var meta_description=$.trim(str)
  $("#slug").val(slug.toLowerCase());
  $("#meta_title").val(meta_title);
  $("#meta_keyword").val(meta_keyword);
  $("#meta_description").val(meta_description);
  });
  </script>