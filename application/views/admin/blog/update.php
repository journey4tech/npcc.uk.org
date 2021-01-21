<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Page</h3>
        </div>
        <div class="box-body">

      <?php $attributes = array('id' => 'edit_blog', 'method' => 'post');
     // echo form_open_multipart('admin/blog/edit/'.$post_detail['id'],$attributes);
      ?>
           <?php echo form_open_multipart((ADMIN_PATH.'/blog/update/'.$info['id']), ' $attributes' )?>
            <div class="col-md-12">
              <div class="form-group <?php echo (form_error('title') ? 'has-error' : '') ?>">
                <label for="exampleInputEmail1" >Page Title</label>
                <input name="title" id="title" type="text" class="form-control required" placeholder="Name" value="<?=set_value('title',$info['title']);?>">
              </div>
            </div>

             <div class="col-md-12">
              <div class="form-group <?php echo (form_error('second_title') ? 'has-error' : '') ?>">
                <label for="exampleInputEmail1" >Second Title</label>
                <input name="second_title" id="title" type="text" class="form-control required" placeholder="Name" value="<?=set_value('second_title');?>">
              </div>
            </div>

            
            <div class="col-md-6" style="display: none">
              <div class="form-group <?php echo (form_error('slug') ? 'has-error' : '') ?>">
                <label for="exampleInputPassword1">Slug</label>
                <input type="text"  name="slug" id="slug" class="form-control" id="" placeholder="" readonly="" value="<?=set_value('slug',$info['slug']);?>">
              </div>
            </div>
   
            <div class="col-md-12">
              <div class="form-group">
                <label>Media*</label><br/>
                <?php if(!empty($info['image'])){ ?>
                <img src="<?= base_url($info['image']) ?>" height="130" width="250" alt='blog image' class="img-thumbnail" style="margin-bottom: 10px">
              <?php } ?>

                <input type="file" name="image" class="form-control" >

                <input type="hidden" name="old_media" value="<?= $info['image'] ?>">
              </div>
            </div>

 
            <div class="col-md-12">
              <div class="form-group  <?php echo (form_error('description') ? 'has-error' : '') ?>">
                <label for="exampleInputPassword1">Description</label>  <?=form_error('description')?>
                <textarea id="editor-ckeditor" name="description" rows="10" cols="80">
                <?=set_value('description',$info['description']);?>
                </textarea>
              </div> 
            </div>

              <div class="col-md-6">
              <div class="form-group <?php echo (form_error('show_home') ? 'has-error' : '') ?>">
                 <label>Show in Home page</label>
                <select class="form-control" name="show_home">
                  <option value="1" <?php if($info['show_home']==1) echo "selected";?>>Yes Show In Home</option>
                  <option value="2" <?php if($info['show_home']==0) echo "selected";?>>Not Show in Home</option>
                </select>
              </div>
            </div>


             <div class="col-md-6">
              <div class="form-group <?php echo (form_error('meta_title') ? 'has-error' : '') ?>">
                <label for="exampleInputEmail1" >Meta Title</label>
                <input name="meta_title" id="meta_title" type="text" class="form-control required" placeholder="Name" value="<?=set_value('meta_title',$info['meta_title']);?>">
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group <?php echo (form_error('meta_keyword') ? 'has-error' : '') ?>">
                <label for="exampleInputEmail1" >Meta Keyword</label>
                <input name="meta_keyword" id="meta_keyword" type="text" class="form-control required" placeholder="Name" value="<?=set_value('meta_keyword',$info['meta_keyword']);?>">
              </div>
            </div>




             <div class="col-md-12">
              <div class="form-group <?php echo (form_error('meta_description') ? 'has-error' : '') ?>">
                <label for="exampleInputEmail1" >Meta Description</label>
                 <textarea name="meta_description" class="form-control" id="" style="min-height: 70px;"><?php echo set_value('meta_description',$info['meta_description']);?></textarea>
              </div>
            </div>







       <div class="col-md-6">
              <div class="form-group <?php echo (form_error('status') ? 'has-error' : '') ?>">
                <label>Publish Status</label>
                <select class="form-control" name="status">
                  <option value="1" <?php if($info['status']==1) echo "selected";?>>Published</option>
                  <option value="2" <?php if($info['status']==2) echo "selected";?>>Un Published</option>
                  <!-- <option value="3"  <?php if($info['status']==3) echo "selected";?>> Draft</option> -->
                  
                </select>
              </div>
            </div>


         <div class="col-md-6">
            </div>

            <div class="col-md-12">
              <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" name="edit_blog" value="Update">
              </div>
            </div>


    
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

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