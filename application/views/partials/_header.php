<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->config->item('site_title') ?></title>
    <link href="<?php echo base_url('front_css'); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('front_css'); ?>/css/style.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('front_css'); ?>/css/responsive.css" rel="stylesheet" type="text/css">
    <link href='dist/simplelightbox.min.css' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="<?php echo base_url('front_css'); ?>/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url('front_css'); ?>/css/owl.theme.css" rel="stylesheet">
    <link href="<?php echo base_url('user_upload/images/' . $this->config->item('favicon')); ?>" rel="shortcut icon">
  </head>
  <body id="home">
    <header id="header">
      <div class="main-head" id="home">
        <div class="container">
          <p><a href="mailto:<?php echo $this->config->item('email') ?>:">Email: <?php echo $this->config->item('email') ?></a></p>
          <p><a href="tel:<?php echo $this->config->item('phone') ?>">Order online or call us (<?php echo $this->config->item('phone') ?>)</a></p>
          <div class="text-right">
            <a href="profile.php">My Account</a>
            <a href="wishlist.php">Wishlist</a>
            <a href="checkout.php">Checkout</a>
            <a href="register.php">Login or Register</a>
          </div>
        </div>
      </div>
      <div id="trueHeader">
        <div class="header">
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-sm-3 ser-tg-menu">
                <div class="logo"><a href="<?php echo base_url() ?>"><img src="<?php echo base_url('user_upload/images/' . $this->config->item('logo')); ?>" alt="Wishwag" /></a></div>
              </div>
              <div class="col-md-9 col-sm-9 nav-part">
                <div class="nav-sec">
                  <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      </button>
                    </div>
                    <div class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav navbar-right">
                        <li class="nav-home"><a href="<?php echo base_url() ?>">Home</a></li>
                        <li class="nav-about"><a href="<?php echo base_url('about-us') ?>">About</a></li>
                        <li class="nav-campaign"><a href="campaign.php">Campaign</a></li>
                        <li class="nav-browse"><a href="browse.php">Browse Ads</a></li>
                        <li class="nav-contact"><a href="contact.php">Contact</a></li>
                        <li class="add-btn"><a href="post.php">Post an ad</a></li>
                      </ul>
                    </div>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>