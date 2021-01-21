<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title></title>
        <meta name="description" content="">
        <meta name="keyword" content="">
        <meta property="og:url"                content="<?php echo site_url(uri_string()) ?>" />
        <meta property="og:type"               content="article" />
        
        <link rel="stylesheet" href="<?php echo base_url('front_css'); ?>/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" href="css/font-awesome.css"> -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('front_css'); ?>/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url('front_css'); ?>/css/owl.theme.default.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('front_css'); ?>/css/style.css">
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dbadd630e302ac7"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151891600-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-151891600-1');
        </script>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0&appId=583945332367135&autoLogAppEvents=1"></script>
    </head>
    <body>
        <section id="top-head">
  <div class="container">
    <div class="row">
      <div class="col-sm-5">
        <ul class="social">
          <a href="<?=$this->config->item('facebook');?>"><i class="fa fa-facebook"></i></a>
          <a href="<?=$this->config->item('twitter');?>"><i class="fa fa-twitter"></i></a>
          <a href="<?=$this->config->item('youtube');?>"><i class="fa fa-youtube"></i></a>
          <!-- <a href="#"><i class="fa fa-google"></i></a> -->
        </ul>
      </div>
      <div class="col-sm-5"></div>
      <div class="col-sm-2">
      </div>
    </div>
  </div>
</section>
<section id="top-heading">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
      </div>
    </div>
    <div class="row">
      <!-- <div class="col-md-3 col-sm-3 col-xs-12">
      </div> -->
      <div class="col-md-4 col-sm-6 col-xs-12 logo">
        <a href="<?php echo base_url() ?>" title=""><img src="<?php echo base_url('user_upload/images/' . $this->config->item('logo')); ?>" alt="images"></a>
      </div>
      <div class="col-md-8 col-sm-3 col-xs-12">
        <div class="jt-ads">
         
        </div>
      </div>
    </div>
  </div>
</section>
<!-- header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbarSupportedContent" class="collapse navbar-collapse"><ul id="menu-main-menu" class="nav navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url() ?>"><i class="fa fa-home"></i></a>
      </li>
      <li> <a class="nav-link" href="https://journeyfortech.com/mahottaripost/category/headlines">मुख्य समाचार</a> </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">प्रदेश </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="https://journeyfortech.com/mahottaripost/category/Provine1">प्रदेश -१</a>
          <a class="dropdown-item" href="https://journeyfortech.com/mahottaripost/category/province2">प्रदेश -२</a>
          <a class="dropdown-item" href="https://journeyfortech.com/mahottaripost/category/province3">प्रदेश -३</a>
          <a class="dropdown-item" href="https://journeyfortech.com/mahottaripost/category/province4">प्रदेश -४</a>
          <a class="dropdown-item" href="https://journeyfortech.com/mahottaripost/category/province5">प्रदेश -५</a>
          <a class="dropdown-item" href="https://journeyfortech.com/mahottaripost/category/province6">प्रदेश -६</a>
          <a class="dropdown-item" href="https://journeyfortech.com/mahottaripost/category/province7">प्रदेश -७</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="https://journeyfortech.com/mahottaripost/category/Interview">अन्तर्वार्ता</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="https://journeyfortech.com/mahottaripost/category/crime">अपराध</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="https://journeyfortech.com/mahottaripost/category/economic">अर्थ</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="https://journeyfortech.com/mahottaripost/category/operation">ओपेरशन</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">खेलकुद  </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="https://journeyfortech.com/mahottaripost/category/sport-national">खेलकुद देश</a>
            <a class="dropdown-item" href="https://journeyfortech.com/mahottaripost/category/sport-international">खेलकुद बिदेश</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="https://journeyfortech.com/mahottaripost/category/video">भिडियो </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">मनोरञ्जन  </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="https://journeyfortech.com/mahottaripost/category/story">कविता/कथा</a>
              <a class="dropdown-item" href="https://journeyfortech.com/mahottaripost/category/moviething">फिल्मी कुरा</a>
              <a class="dropdown-item"  href="https://journeyfortech.com/mahottaripost/category/rasifal">दैनिक राशिफल</a>
              <a class="dropdown-item"  href="https://journeyfortech.com/mahottaripost/category/birthday-anniversary">Birthday/Anniversary</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="https://journeyfortech.com/mahottaripost/category/politics">राजनीति</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="https://journeyfortech.com/mahottaripost/category/world-news">विश्व</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="https://journeyfortech.com/mahottaripost/category/education">शिक्षा</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="https://journeyfortech.com/mahottaripost/category/social">समाज</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="https://journeyfortech.com/mahottaripost/category/health">स्वास्थ्य</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">अन्य</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="https://journeyfortech.com/mahottaripost/category/science">बिज्ञान/प्रबिधि </a>
                <a class="dropdown-item" href="https://journeyfortech.com/mahottaripost/category/blog">विचार/ब्लग </a>
                <a class="dropdown-item"  href="https://journeyfortech.com/mahottaripost/category/lifestyle">जीवनशैली</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>