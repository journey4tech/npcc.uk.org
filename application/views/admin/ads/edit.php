<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Ads Details</h3>
        </div>
        <div class="box-body">
          <?php echo form_open_multipart((ADMIN_PATH . '/ads/edit/' . $info['id']), 'class="form-horizontal"') ?>


        <div class="form-group <?php echo (form_error('user_id') ? 'has-error' : '') ?>">
              <label for="text1" class="control-label col-lg-3">User *</label>
              <div class="col-lg-6">
               <select name="user_id" id="" class="form-control">
                <?php foreach ($users as $user) {?>
                    <option value="<?php echo $user['id']; ?>"
                      <?php if ($user['id'] == $info['user_id']) {?>
                      selected
                      <?php }?>>
                    <?php echo $user['username'] ?> - <?php echo $user['email'] ?>

                    </option>

                    <?php }?>
               </select>
              </div>
            </div>


             <div class="form-group <?php echo (form_error('category_id') ? 'has-error' : '') ?>">
              <label for="text1" class="control-label col-lg-3">Category *</label>
              <div class="col-lg-6">
               <select name="category_id" id="" class="form-control">
               <?php foreach ($categories as $category) {?>
                    <option value="<?php echo $category['id']; ?>"
                      <?php if ($category['id'] == $info['category_id']) {?>
                      selected
                      <?php }?>>
                    <?php echo $category['name'] ?>

                    </option>

                    <?php }?>

               </select>
              </div>
            </div>


          <div class="form-group <?php echo (form_error('title') ? 'has-error' : '') ?>">
            <label  class="control-label col-lg-3">Title *</label>
            <div class="col-lg-6">
              <input name="title" id="title" type="text" class="form-control required" value="<?=set_value('title', $info['title']);?>">
            </div>
          </div>

          <div class="form-group  <?php echo (form_error('slug') ? 'has-error' : '') ?>">
            <label  class="control-label col-lg-3">Slug *</label>
            <div class="col-lg-6">
              <input name="slug" type="text" id="slug" class="form-control " value="<?=set_value('slug', $info['slug']);?>">
            </div>
          </div>


          <?php if ($info['image'] != "") {?>

          <div class="form-group">
            <label  class="control-label col-lg-3">Image</label>
             <div class="col-lg-6">
             <img src="<?=base_url()?>/user_upload/ads/<?=$info['image']?>"
            alt="" title="" width="220px" height="auto" class="img-thumbnail" />
</div>
          </div>
          <?php }?>

          <div class="form-group">
            <label  class="control-label col-lg-3">Image</label>
            <div class="col-lg-6">
              <input name="image" type="file" id="picture"  accept="gif|GIF|jpg|JPG|jpeg|JPEG|png|PNG" class="form-control">
            </div>
          </div>


             <div class="form-group <?php echo (form_error('price') ? 'has-error' : '') ?>">
              <label for="text1" class="control-label col-lg-3">Price</label>
              <div class="col-lg-6">
                <input type="number"  name="price" id="price" class="form-control" id="" placeholder="" value="<?=set_value('price', $info['price']);?>">
              </div>
               </div>




          <div class="form-group">
            <label  class="control-label col-lg-3">Is Negotiable</label>
            <div class="col-lg-6">
              <input type="radio" name="is_negotiable" value="1" <?php if ($info['is_negotiable'] == 1) {
    echo "checked";
}
?> >
             Yes
              <input type="radio" name="is_negotiable" value="0" <?php if ($info['is_negotiable'] == 0) {
    echo "checked";
}
?> />
             Fixed Frice</div>
          </div>

                <div class="form-group">
            <label  class="control-label col-lg-3">Is Feature</label>
            <div class="col-lg-6">
              <input type="radio" name="is_feature" value="1" <?php if ($info['is_feature'] == 1) {
    echo "checked";
}
?> >
             Yes
              <input type="radio" name="is_feature" value="0" <?php if ($info['is_feature'] == 0) {
    echo "checked";
}
?> />
             No</div>
          </div>


<div class="form-group <?php echo (form_error('location') ? 'has-error' : '') ?>">
              <label for="text1" class="control-label col-lg-3">Location</label>
              <div class="col-lg-6">
                <input type="text"  name="location" id="location" class="form-control" id="" placeholder="" value="<?=set_value('location', $info['location']);?>">
              </div>
               </div>









          <div class="form-group">
            <label for="text1" class="control-label col-lg-3">Description</label>
            <div class="col-lg-8">
              <textarea name="description" class="form-control" id="editor-ckeditor" style="min-height: 70px;"><?php echo set_value('description', $info['description']); ?></textarea>
            </div>  <?=form_error('description')?>
          </div>


          <div class="form-group">
            <label for="text1" class="control-label col-lg-3">Meta Title</label>
            <div class="col-lg-6">
              <input name="meta_title" id="meta_title" type="text" class="form-control required"  value="<?php echo set_value('meta_title', $info['meta_title']); ?>">
            </div>  <?=form_error('meta_title')?>
          </div>
          <div class="form-group">
            <label for="text1" class="control-label col-lg-3">Meta Keyword</label>
            <div class="col-lg-6">
              <input name="meta_keyword" id="meta_keyword" type="text" class="form-control required"  value="<?php echo set_value('meta_keyword', $info['meta_keyword']); ?>">
            </div>  <?=form_error('meta_keyword')?>
          </div>
          <div class="form-group">
            <label for="text1" class="control-label col-lg-3">Meta Description</label>
            <div class="col-lg-6">
              <textarea name="meta_description" class="form-control" id="" style="min-height: 70px;"><?php echo set_value('meta_description', $info['meta_description']); ?></textarea>
            </div>  <?=form_error('meta_description')?>
          </div>
          <div class="form-group">
            <label  class="control-label col-lg-3">Status</label>
            <div class="col-lg-6">
              <input type="radio" name="status" value="0" <?php if ($info['status'] == 0) {
    echo "checked";
}
?> >
              Inactive
              <input type="radio" name="status" value="1" <?php if ($info['status'] == 1) {
    echo "checked";
}
?> />
            Active </div>
          </div>
          <input type="hidden" name="id" value="<?=$info['id']?>" />
          <div class="form-group">
            <label for="text1" class="control-label col-lg-3"></label>
            <div class="col-lg-6">
              <input type="submit" value="UPDATE" class="navigation_button btn btn-primary"/>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
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