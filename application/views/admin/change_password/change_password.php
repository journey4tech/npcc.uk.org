<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Change Password</h3>
        </div>
        <div class="box-body">
          <div id="div-1" class="body">
            <form name="frm" id="frm" method="post" class="form-horizontal" action="<?=site_url(ADMIN_PATH."/change_password/update_password")?>">
              <div class="form-group">
                <label for="text1" class="control-label col-lg-2">Old Password</label>
                <div class="col-lg-6">
                  <input type="password" id="old_password" name="old_password" placeholder="Old Password" class="form-control required" value="">
                  <?=form_error('old_password')?>
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-2">New Password</label>
                <div class="col-lg-6">
                  <input type="password" id="new_password" name="new_password" placeholder="New Password" class="form-control required" value=""> <?=form_error('new_password')?>
                  
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-2">Retype Password</label>
                <div class="col-lg-6">
                  <input type="password" id="re_password" name="re_password" placeholder="Retype Password" minlength="6" equalTo="#new_password" class="form-control required" value="" onpaste="return false;">
                  <?=form_error('re_password')?>
                </div>
              </div>
              <div class="form-group">
                <label for="text1" class="control-label col-lg-2"></label>
                <div class="col-lg-6">
                  <input type="submit" value="CHANGE PASSWORD" id="next" class="navigation_button btn btn-primary">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>