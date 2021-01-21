 
                <div class="col-md-4 col-md-offset-4 text-center">
                    <div class="login-title">
                        <h3><span>OnJob Portal</span></h3>
                    </div>
                    <?php if(isset($msg) || validation_errors() !== ''): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                        <?= validation_errors();?>
                        <?= isset($msg)? $msg: ''; ?>
                    </div>
                    <?php endif; ?>
                    <div class="form-box">
                        <div class="caption">
                            <h4>Reset your password</h4>
                        </div>
                        <?php echo form_open(base_url('admin/auth/reset_password/'.$reset_code), 'class="login-form" '); ?>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" >
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm" >
                                <div class="row">
                              </div>
                                <input type="submit" name="submit" id="submit" class="form-control" value="Reset">
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
             