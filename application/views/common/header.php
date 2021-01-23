<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->config->item('site_title') ?></title>


    <!-- Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,700i,800,900&amp;display=swap" rel="stylesheet">
    <link href="<?php echo base_url('user_upload/images/' . $this->config->item('favicon')); ?>" rel="shortcut icon">
  
  <!-- Corpress CSS -->
  <link rel="stylesheet" href="<?php echo base_url('front_css'); ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('front_css'); ?>/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="<?php echo base_url('front_css'); ?>/css/fontawesome.min.css">
  <!-- <link rel="stylesheet" href="css/slicknav.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url('front_css'); ?>/css/animate.min.css">
  <!-- <link rel="stylesheet" href="css/magnific-popup.css"> -->
  <link rel="stylesheet" href="<?php echo base_url('front_css'); ?>/css/animate-text.css">
  <link rel="stylesheet" href="<?php echo base_url('front_css'); ?>/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url('front_css'); ?>/css/owl.theme.default.min.css">
  
  <!-- Corpress Stylesheet -->
  <link rel="stylesheet" href="<?php echo base_url('front_css'); ?>/css/normalize.css">
  <link rel="stylesheet" href="<?php echo base_url('front_css'); ?>/css/style.css">
<!--    <link rel="stylesheet" href="<?php echo base_url('front_css'); ?>/css/responsive.css"> -->
  
   
<!--     <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"> -->

  
  </head>
  <body>
      <!-- Header Area -->

           
  <!-- Header Area -->
  <header class="header">
    <!-- Topbar -->
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-7 col-xs-12">
            <!-- Top Left -->
            <div class="top-left">
              <div class="single-top">
                <p><i class="fas fa-thumbtack"></i>UK london</p>
              </div>
              <div class="single-top">
                <p><a href="mailto:<?php echo $this->config->item('email') ?>"><i class="far fa-envelope-open"></i><?php echo $this->config->item('email') ?></a></p>
              </div>
              <div class="single-top">
                <p><i class="fas fa-phone"></i><?php echo $this->config->item('phone') ?></p>
              </div>
            </div>
            <!-- End  Top Left -->
          </div>
          <div class="col-md-6 col-sm-5 col-xs-12">
            <!-- Top Right -->
            <div class="top-right">
              <div class="button">
                <a href="<?php echo base_url('member'); ?>" class="btn">Be a Member</a>
              </div>
              <!-- Social -->
              <ul class="social">
                <li class="title">Follow us:</li>
                <li><a href="<?php echo $this->config->item('facebook_url') ?>"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="<?php echo $this->config->item('twitter_url') ?>"><i class="fab fa-twitter"></i></a></li>
                <li><a href="<?php echo $this->config->item('pinterest_url') ?>"><i class="fab fa-pinterest-p"></i></a></li>
                <!-- <li><a href="<?php echo $this->config->item('youtube_url') ?>"><i class="fab fa-youtube"></i></a></li> -->
              </ul>
              <!-- End Social -->
            </div>
            <!-- /End Top Right -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Topbar -->
    <!-- Header Inner -->
    <!--/ End Header Inner -->

  </header>
  <nav class="navbar navbar-default sticky-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="logo_pc">
              <a href="index.php"><img src="<?php echo base_url('front_css'); ?>/img/npcclogo.jpg" alt="logo.png"></a>
            </div>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url('about-us'); ?>">About</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">resource <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Resource one</a></li>
              <li><a class="dropdown-item" href="#">Resource one</a></li>
              <li><a class="dropdown-item" href="#">Resource one</a></li>
              <li><a class="dropdown-item" href="#">Resource one</a></li>
              <li><a class="dropdown-item" href="#">Resource one</a></li>
            </ul>
          </li>
          <li><a href="<?php echo base_url('member'); ?>">Membership</a></li>
          <li><a href="<?php echo base_url('press-release'); ?>">Press Release</a></li>
          <li><a href="<?php echo base_url('news'); ?>">NEWS & EVENT</a></li>
          <li><a href="<?php echo base_url('contact-us'); ?>">CONTACT</a></li>
          
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>