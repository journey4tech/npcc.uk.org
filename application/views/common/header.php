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
                <p><a href="mailto:info@npcc.uk.org"><i class="far fa-envelope-open"></i>info@npcc.uk.org</a></p>
              </div>
              <div class="single-top">
                <p><i class="fas fa-phone"></i>+1-9801035905</p>
              </div>
            </div>
            <!-- End  Top Left -->
          </div>
          <div class="col-md-6 col-sm-5 col-xs-12">
            <!-- Top Right -->
            <div class="top-right">
              <div class="button">
                <a href="#" class="btn">Be a Member</a>
              </div>
              <!-- Social -->
              <ul class="social">
                <li class="title">Follow us:</li>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
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
    <div class="main-menu">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-12">
            <!-- Logo -->
            <div class="logo_pc">
              <a href="index.php"><img src="<?php echo base_url('front_css'); ?>/img/npcclogo.jpg" alt="logo.png"></a>
            </div>
            <!--/ End Logo -->
            <div class="mobile-nav"></div>
          </div>
          <div class="col-md-9 col-sm-9">
            <nav class="navbar navbar-default">
              <div class="collapse navbar-collapse">
                <ul id="nav" class="nav mobile-menu navbar-nav">
                  <li><a href="services.php">About</a></li>
                  <li><a href="#">Resources</a>
                  <ul class="dropdown">
                    <li><a href="#">Resource one</a></li>
                    <li><a href="#">Resource one</a></li>
                    <li><a href="#">Resource one</a></li>
                    <li><a href="#">Resource one</a></li>
                    <li><a href="#">Resource one</a></li>
                    
                  </ul>
                </li>
                <li><a href="membership.php">Membership</a></li>
                <li><a href="membership.php">Press Release</a></li>
                <li><a href="#">News & Event</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
              
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!--/ End Header Inner -->


  
</header>
<!-- End Header Area -->


