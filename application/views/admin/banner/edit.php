<section class="content">
  <div class="row">
    <div class="col-md-9">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Slider Details</h3>
        </div>

        <div class="box-body">
         <form name="frm" id="frm" method="post"   enctype="multipart/form-data" class="form-horizontal" action="<?=site_url(ADMIN_PATH.'/banner/edit/'.$info['id'])?>">
           <?php 
            $csrf = array(
        'name' => $this->security->get_csrf_token_name(),
        'hash' => $this->security->get_csrf_hash()
); ?>
            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
           <input type="hidden" name="id" value="<?=$info['id']?>" />
            
             <div class="col-md-12">
              <div class="form-group <?php echo (form_error('title') ? 'has-error' : '') ?>">
                <label for="title" >Title</label>
                <input type="text" name="title" id="title"  class="form-control required" placeholder="Title" value="<?=set_value('title',$info['title']);?>">
              </div>
            </div>

              <div class="col-md-12">
              <div class="form-group <?php echo (form_error('tag') ? 'has-error' : '') ?>">
                <label for="tag" >Second Title</label>
                <input type="text" name="tag" id="tag"  class="form-control required" placeholder="Text to show on image small size" value="<?=set_value('tag',$info['tag']);?>">
              </div>
            </div>


             <div class="col-md-12">
              <div class="form-group <?php echo (form_error('ban_url') ? 'has-error' : '') ?>">
                <label for="title" >Slider Url</label>
                <input type="text" name="ban_url" id="ban_url"  class="form-control required" placeholder="url with https to show the button / empty to hide button" value="<?=set_value('ban_url',$info['ban_url']);?>">
              </div>
            </div> 

             <div class="col-md-12">
              <div class="form-group <?php echo (form_error('position') ? 'has-error' : '') ?>">
                <label for="position">Slider Number</label>
                <input type="Number" name="position" id="position"  class="form-control required" placeholder="slider image order" value="<?=set_value('position',$info['position']);?>">
              </div>
            </div> 

             
            
          
      
           
      
            
              <?php if($info['image']!="") { ?>
               <div class="col-md-6">
              <div class="form-group">
              
              
              <a href="<?=base_url()?>user_upload/banners/<?=$info['image']?>" onclick="Javascript:void(0)" class="preview"> <img src="<?=base_url()?>/user_upload/banners/<?=$info['image']?>"
         alt="" title="" width="350px" height="150px" /> </a>
               </div>
             </div>
              <?php  } ?>




            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleInputPassword1">Image</label>
                <input name="image" type="file" class="form-control required"  value="">
              </div>  <?=form_error('image')?>
            </div>

            
            
            <div class="col-md-12">
              <div class="form-group <?php echo (form_error('status') ? 'has-error' : '') ?>">
                <label>Publish Status</label>
                <select class="form-control" name="status">
                  <option value="1" <?php if($info['status']==1) echo "selected";?>>Published</option>
                  <option value="0"<?php if($info['status']==0) echo "selected";?>>Un Published</option>
                 
                  
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="submit" class="btn btn-danger">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$("#title").keyup(function () {
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