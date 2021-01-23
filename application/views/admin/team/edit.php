<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Team Details</h3>
        </div>
        <div class="box-body">
          <form name="frm" id="frm" method="post"   enctype="multipart/form-data" class="form-horizontal" action="<?=site_url(ADMIN_PATH.'/team/edit/'.$info['id'])?>">
            <div class="form-group <?php echo (form_error('name') ? 'has-error' : '') ?>">
              <label  class="control-label col-lg-2">Title</label>
              <div class="col-lg-6">
                <input name="title" id="title" type="text" class="form-control required" value="<?=set_value('title',$info['title']);?>">
              </div>
            </div>

             <div class="form-group  <?php echo (form_error('designation') ? 'has-error' : '') ?>">
              <label  class="control-label col-lg-2">Designation</label>
              <div class="col-lg-6">
                <input name="designation" type="text" id="designation" class="form-control " value="<?=set_value('designation',$info['designation']);?>">
              </div>
            </div>

            <?php if($info['image']!="") { ?>
               
              <div class="form-group">
                 <label  class="control-label col-lg-2"></label>
              <div class="col-lg-6">
  
              <a href="<?=base_url()?>user_upload/<?=$info['image']?>" onclick="Javascript:void(0)" class="preview"> <img src="<?=base_url()?>/user_upload/<?=$info['image']?>"
         alt="" title="" width="350px" height="150px" /> </a>
               </div>
             </div>
              <?php  } ?>




           
              <div class="form-group">
                 <label  class="control-label col-lg-2">Image</label>
              <div class="col-lg-6">
                 
                <input name="image" type="file" class="form-control required"  value="">
              </div>  <?=form_error('image')?>
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