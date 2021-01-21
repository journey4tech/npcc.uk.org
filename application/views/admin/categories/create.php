

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create Category</h3>
        </div>
        <div class="box-body">

            
            <?php echo form_open_multipart('','class="form-horizontal"' ); ?>
            <div class="form-group <?php echo (form_error('name') ? 'has-error' : '') ?>">
              <label for="text1" class="control-label col-lg-3">Title</label>
              <div class="col-lg-6">
                <input name="name" id="name" type="text" class="form-control required"  value="<?=set_value('name');?>">
              </div>
            </div>
            
            <div class="form-group <?php echo (form_error('slug') ? 'has-error' : '') ?>">
              <label for="text1" class="control-label col-lg-3">Slug</label>
              <div class="col-lg-6">
                <input type="text"  name="slug" id="slug" class="form-control" id="" placeholder="" value="<?=set_value('slug');?>">
              </div>



               
            </div>
            <div class="form-group <?php echo (form_error('rank') ? 'has-error' : '') ?>">
              <label for="text1" class="control-label col-lg-3">Menu Order</label>
              <div class="col-lg-6">
                <input type="number"  name="rank" id="rank" class="form-control" id="" placeholder="" value="<?=set_value('rank');?>">
              </div>
              <?php echo form_error('rank')?>
            </div>

             <div class="form-group">
              <label for="text1" class="control-label col-lg-3">Image</label>
              <div class="col-lg-6">
                <input name="image" type="file" id="image"  class="form-control" accept="gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG|pdf|PDF" >  
              </div>
            </div>

            
            <div class="form-group">
              <label  class="control-label col-lg-3">Show in Home</label>
              <div class="col-lg-6">
                <input type="radio" name="show_home" value="1" />
                Showing
                <input type="radio" name="show_home" checked="checked" value="0" >
                Not Showing
                </div>
            </div>


            <div class="form-group">
              <label  class="control-label col-lg-3">Content</label>
              <div class="col-lg-8">
                 <textarea name="content" id="editor-ckeditor" rows="40" cols="100"></textarea>
                </div>
            </div>


             

 
            <div class="form-group">
              <label for="text1" class="control-label col-lg-3">Meta Title</label>
              <div class="col-lg-6">
                <input name="meta_title" id="meta_title" type="text" class="form-control required"  value="<?=set_value('meta_title');?>">
              </div>  <?=form_error('meta_title')?>
            </div>
            <div class="form-group">
              <label for="text1" class="control-label col-lg-3">Meta Keyword</label>
              <div class="col-lg-6">
                <input name="meta_keyword" id="meta_keyword" type="text" class="form-control required"  value="<?=set_value('meta_keyword');?>">
              </div>  <?=form_error('meta_keyword')?>
            </div>
            <div class="form-group">
              <label for="text1" class="control-label col-lg-3">Meta Description</label>
              <div class="col-lg-6">
                 
                  
                  <textarea name="meta_description" class="form-control" id="" style="min-height: 70px;"><?=set_value('meta_description');?></textarea>
                  
               
              </div>  <?=form_error('meta_description')?>
            </div>

            
            <div class="form-group">
              <label  class="control-label col-lg-3">Status</label>
              <div class="col-lg-6">
                 <input type="radio" name="status" checked="checked" value="1" />
              Active
                <input type="radio" name="status" value="0" >
                InActive
               </div>
            </div>
            <div class="form-group">
              <label for="text1" class="control-label col-lg-3"></label>
              <div class="col-lg-6">
                <input type="submit" value="Submit" id="next" class="navigation_button btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
 
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

 