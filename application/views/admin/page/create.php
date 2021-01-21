<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create Page</h3>
        </div>
        <div class="box-body">
          
          <!-- <form role="form" method="post"  action="<?=site_url(ADMIN_PATH . '/page/create/')?>" enctype="multipart/form-data"> -->
          <?php echo form_open_multipart('','' ); ?>
          <div class="col-md-12">
            <div class="form-group <?php echo (form_error('title') ? 'has-error' : '') ?>">
              <label for="exampleInputEmail1" >Page Title</label>
              <input name="title" id="title" type="text" class="form-control required" placeholder="Name" value="<?=set_value('title');?>">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group <?php echo (form_error('second_title') ? 'has-error' : '') ?>">
              <label for="exampleInputEmail1" >Second Title</label>
              <input name="second_title" id="second_title" type="text" class="form-control required" placeholder="Name" value="<?=set_value('second_title');?>">
            </div>
          </div>
          
          <div class="col-md-12">
            <div class="form-group <?php echo (form_error('slug') ? 'has-error' : '') ?>">
              <label for="exampleInputPassword1">Slug</label>
              <input type="text"  name="slug" id="slug" class="form-control" id="" placeholder="" value="<?=set_value('slug');?>">
            </div>
          </div>
          
          
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputPassword1">Image</label>
              <input name="picture" type="file" class="form-control required"  value="">
            </div>  <?=form_error('picture')?>
          </div>
          
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea id="editor-ckeditor" name="description" rows="10" cols="80">
              
              </textarea>
            </div>  <?=form_error('description')?>
          </div>
          <div class="col-md-12">
            <div class="form-group <?php echo (form_error('meta_title') ? 'has-error' : '') ?>">
              <label for="exampleInputEmail1" >Meta Title</label>
              <input name="meta_title" id="meta_title" type="text" class="form-control required" placeholder="Meta title" value="<?=set_value('title');?>">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group <?php echo (form_error('meta_keyword') ? 'has-error' : '') ?>">
              <label for="exampleInputEmail1" >Meta Keyword</label>
              <input name="meta_keyword" id="meta_keyword" type="text" class="form-control required" placeholder="Meta Keyword" value="<?=set_value('meta_keyword');?>">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group <?php echo (form_error('meta_description') ? 'has-error' : '') ?>">
              <label for="exampleInputEmail1" >Meta Description</label>
              <textarea name="meta_description" class="form-control" id="" cols="20" rows="5" value="<?=set_value('meta_description');?>"></textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group <?php echo (form_error('status') ? 'has-error' : '') ?>">
              <label>Publish Status</label>
              <select class="form-control" name="status">
                <option value="1">Published</option>
                <option value="2">Un Published</option>
                <!-- <option value="3">Draft</option> -->
                
              </select>
            </div>
          </div>
          <div class="col-md-6">
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
              
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