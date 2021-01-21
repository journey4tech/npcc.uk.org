<!DOCTYPE html>
<html lang="en">
    <head>
          <title><?=isset($title)?$title:'Login - OnJob' ?></title>
          <!-- Tell the browser to be responsive to screen width -->
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
          <!-- Bootstrap 3.3.6 -->
          <link rel="stylesheet" href="<?= base_url() ?>admin_css/bootstrap/css/bootstrap.min.css">
          <!-- Theme style -->
          <link rel="stylesheet" href="<?= base_url() ?>admin_css/dist/css/AdminLTE.min.css">
           <!-- Custom CSS -->
          <link rel="stylesheet" href="<?= base_url() ?>admin_css/dist/css/style.css">
           <!-- jQuery 2.2.3 -->
          <script src="<?= base_url() ?>admin_css/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body id="login-form">


        <div class="container">
            <div class="row">
                
                <div class="col-md-4 col-md-offset-4 text-center">
                    <div class="login-title">
                        <h3><span>Admin Login</span></h3>
                    </div>
                    <?php if(isset($msg) || validation_errors() !== ''): ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                        <?= validation_errors();?>
                        <?= isset($msg)? $msg: ''; ?>
                    </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('warning')): ?>
                          <div class="alert alert-warning">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                          <?=$this->session->flashdata('warning')?>
                        </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('success')): ?>
                          <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            <?=$this->session->flashdata('success')?>
                          </div>
                    <?php endif; ?>
                    <div class="form-box">
                        <div class="caption">
                            <h4>Sign in to start your session</h4>
                        </div>
                        <?php echo form_open(base_url() . ADMIN_PATH . '/admin/login/'); ?>
                            
                                 <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
                                 <div class="form-group has-feedback">
        <input type="password" class="form-control"  name="password"  placeholder="Password" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
                               
                                <div class="row">
                                  <div class="col-xs-12 text-right">
                                      <p><a href="<?= base_url('admin/auth/forgot_password'); ?>">Forgot password?</a></p>
                                  </div>
                              
                                <input type="submit" name="submit" id="submit"  class="btn btn-primary btn-block btn-flat" class="form-control" value="Login">
                
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?= base_url() ?>admin_css/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>admin_css/dist/js/app.min.js"></script>
</html>