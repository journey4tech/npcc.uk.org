<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create Category</h3>
        </div>
        <div class="box-body">
          <form name="frm" id="frm" method="post"  action="" enctype="multipart/form-data" class="">
            <div class="row">
              
                
                <div class="form-group <?php echo (form_error('name') ? 'has-error' : '') ?>">
                  <label for="text1" class="control-label">Title</label>
                  
                  <input name="name" id="name" type="text" class="form-control required"  value="<?=set_value('name');?>">
                  
                </div>
                <?php echo form_error('name')?>
                
                <div class="form-group <?php echo (form_error('slug') ? 'has-error' : '') ?>">
                  <label for="text1" class="control-label">Slug</label>
                  
                  <input type="text"  name="slug" id="slug" class="form-control" id="" placeholder="" value="<?=set_value('slug');?>">
                  
                  <?php echo form_error('slug')?>
                </div>

                <div class="form-group">
                  <label for="text1" class="control-label">Image</label>
                  
                  <div class="form-group form-control">
                    <input name="image" type="file" id="picture"
                    accept="jpg|gif|png|jpeg|JPG|GIF|PNG|JPEG">
                  </div>
                </div>
                
                <div class="form-group <?php echo (form_error('rank') ? 'has-error' : '') ?>">
                  <label for="text1" class="control-label">Menu Order</label>
                  
                  <input type="number"  name="rank" id="rank" class="form-control" id="" placeholder="" value="<?=set_value('rank');?>">
                </div>
                <?php echo form_error('rank')?>
                
                
                <div class="form-group mt-1 mb-5 form-control">
                  <div class="col-sm-3 col-xs-12 col-option">
                    <label  class="control-label">Show in Menu</label>
                  </div>
                  <div class="col-md-4 col-option">
                    <input name="show_home" type="radio" value="0" checked="checked"/>
                    <label for="show_home_1" class="option-label"><?php echo 'Not Showing' ?></label>
                  </div>
                  <div class="col-md-4 col-option">
                    <input name="show_home" type="radio" value="1" />
                    <label for="show_home_1" class="option-label"><?php echo 'Showing in Home' ?></label>
                  </div>
                  
                </div>

                <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
        <textarea name="content" id="editor-ckeditor" rows="40" cols="100">
        </textarea>

         
      </div>
                
                <div class="form-group">
                  <label for="text1" class="control-label">Meta Title</label>
                  
                  <input name="meta_title" id="meta_title" type="text" class="form-control required"  value="<?=set_value('meta_title');?>">
                  <?=form_error('meta_title')?>
                </div>
                <div class="form-group">
                  <label for="text1" class="control-label">Meta Keyword</label>
                  
                  <input name="meta_keyword" id="meta_keyword" type="text" class="form-control required"  value="<?=set_value('meta_keyword');?>">
                  <?=form_error('meta_keyword')?>
                </div>
                <div class="form-group">
                  <label for="text1" class="control-label">Meta Description</label>
                  
                  <textarea name="meta_description" class="form-control" id="" style="min-height: 70px;"><?=set_value('meta_description');?></textarea>
                  
                </div>  <?=form_error('meta_description')?>
                
                
                <div class="form-group mt-1 mb-5 form-control">
                  <div class="col-sm-3 col-xs-12 col-option">
                    <label  class="control-label">Status</label>
                  </div>
                  <div class="col-md-4 col-option">
                    <input name="status" type="radio" value="1" checked="checked"/>
                    <label for="status_1" class="option-label"><?php echo 'Published' ?></label>
                  </div>
                  <div class="col-md-4 col-option">
                    <input name="status" type="radio" value="0"/>
                    <label for="status_1" class="option-label"><?php echo 'Un Published' ?></label>
                  </div>
                  
                  
                </div>
                
               <!--  <div class="form-group">
                  <label for="text1" class="control-label col-lg-3"></label>
                  <div class="col-lg-6">
                    <input type="submit" value="Add" id="next" class="navigation_button btn btn-primary">
                  </div>
                </div> -->

                
        <button type="submit" class="btn btn-primary pull-right">Submit</button>
      
              </div>
             
                

                
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
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