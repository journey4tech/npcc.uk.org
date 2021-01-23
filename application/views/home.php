<!-- Carousel -->
<?php
$query  = $this->db->query("SELECT *  FROM banners WHERE   status='1' Order by position desc ");
$banner = $query->result_array();
?>
<section>
  <div id="myCarousel" class="carousel slide">
    <!-- Menu -->
    <ol class="carousel-indicators">
      <?php
                $i = 0;
                foreach ($banner as $ban) {
                ?>
                <li data-target="#myCarousel" data-slide-to="<?=$i;?>" class="<?php if ($i == 0) {
                    ?>active <?php
                    }
                ?>"></li>
                <?php $i++;
                }
                ?>
    </ol>
    
    <!-- Items -->
    <div class="carousel-inner">
      <?php
                $i = 0;
                foreach ($banner as $ban) {
                ?>
      <!-- Item 1 -->
       <div class="item <?php if ($i == 0) {
                    ?>active <?php
                    }
                    ?>">
        <img src="https://picsum.photos/1500/600/?image=1"/>
        <div class="container">
          <div class="carousel-caption">
            <h1>Nepali Congress Uk Organization</h1>
            
            <p><a class="btn btn-lg btn-primary" href="http://getbootstrap.com">Learn More</a>
          </p></div>
        </div>
      </div>
       <?php
                $i++;
                 } ?>
    
    </div>
    
    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="icon-next"></span>
    </a>
    
    
  </div>
</section>
<!-- Slider Area -->

<!--/ End Slider Area -->
<div class="about-area section">
  <div class="container">
    <div class="row">
      <!-- Start About -->
      <div class="about-content content-left">
        <!-- About Image -->
        <div class="col-md-6 col-xs-12">
          <div class="image">
            <img src="<?php echo base_url('user_upload/images') ?>/<?php echo $info['image'] ?>" alt="#">
          </div>
        </div>
        <!--/End About Image -->
        <!-- About Content -->
        <div class="col-md-6 col-xs-12 info">
          <div class="content-inner">
            <div class="big-title"><h2><?php echo $info['title'] ?></h2></div>
            <p><?php echo $info['description'] ?></p>
            <div class="button" style="margin-top: 25px;">
              <a href="<?php echo base_url('about-us'); ?>" class="btn">Learn more</a>
            </div>
            
          </div>
        </div>
        <!--?end About Content -->
      </div>
      <!-- End About -->
    </div>
  </div>
</div>




<!-- Call To Action Area-->
<section class="call-action overlay">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="call-content">
          <h3>Join us to make largest community</h3>
          <div class="button">
            <a href="<?php echo base_url('member'); ?>" class="btn">Become Member</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Call To Action Area -->
<section class="" style="background: #F4F7FC;">
  <div class="container">
    <div class="row" style="margin-top: 30px;margin-bottom:30px;">
      <div class="col-md-4">
        <div class="box-title"><h2>News-Events</h2>
          
           <?php 
      foreach ($blogs as $blog) { ?>
          <div class="very-small-box">
            <a href="#"><img class="img-responsive" alt="<?php echo $blog['title'] ?>" src="<?php echo base_url('user_upload/blogs') ?>/<?php echo $blog['image'] ?>"> </a>
            <a href="#" class="small-title"><?php echo $blog['title'] ?></a>
          </div>
        <?php } ?>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box-title"><h2>Press Release</h2>
          
          
            <?php 
      foreach ($blogs as $blog) { ?>
          <div class="very-small-box">
            <a href="#"><img class="img-responsive" alt="<?php echo $blog['title'] ?>" src="<?php echo base_url('user_upload/blogs') ?>/<?php echo $blog['image'] ?>"> </a>
            <a href="#" class="small-title"><?php echo $blog['title'] ?></a>
          </div>
        <?php } ?>
        </div>
      </div>
      <div class="col-md-4">
        <div class="box-title"><h2>Follow us on Facebook</h2>
          
      <div class="fb-page" data-href="https://www.facebook.com/409649995834362" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/409649995834362" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/409649995834362">जनसम्पर्क समिति बेलायत Npcc Uk</a></blockquote></div>
        </div>
      </div>
       
    
  </div>
</div>

</section>



<section class="team section">
<div class="container">
  <div class="row">
    <!-- Team Title -->
    <div class="col-md-3 col-xs-12">
      <div class="section-title">
        <h2>
        <!-- <span class="first">our experts</span> -->
        Our  Executive Committee
        <!-- <span class="second">experience</span> -->
        </h2>
        <p>Lorem ipsum dolor amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet .Lorem ipsum dolor amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet .</p>
      </div>
    </div>
    <!--/ End Team Title -->
    <!-- Single Team -->
    <div class="col-md-9 col-xs-12">
      <div class="team-inner">
        <div class="owl-carousel team-slider">
          <!-- Single Team -->
          <div class="xs-team">
            <div class="xs-team-thumb">
              <img src="<?php echo base_url('front_css'); ?>/img/team/team-1.jpg" alt="David William">
              <div class="xs-team-overlay d-flex align-items-center">
                <ul class="list-unstyled xs-team-share">
                  <li>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="xs-team-content">
              <h3>
              <a href="#">Anu Jha</a>
              </h3>
              <p>Secretary</p>
            </div>
          </div>
          <!--/ End Single Team -->
          <!-- Single Team -->
          <div class="xs-team">
            <div class="xs-team-thumb">
              <img src="<?php echo base_url('front_css'); ?>/img/team/team-2.jpg" alt="Robert Dany">
              <div class="xs-team-overlay d-flex align-items-center">
                <ul class="list-unstyled xs-team-share">
                  <li>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="xs-team-content">
              <h3>
              <a href="#">Mandip Kc</a>
              </h3>
              <p>Secretary</p>
            </div>
          </div>
          <!--/ End Single Team -->
          <!-- Single Team -->
          <div class="xs-team">
            <div class="xs-team-thumb">
              <img src="<?php echo base_url('front_css'); ?>/img/team/team-3.jpg" alt="Ana Mariea">
              <div class="xs-team-overlay d-flex align-items-center">
                <ul class="list-unstyled xs-team-share">
                  <li>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="xs-team-content">
              <h3>
              <a href="#">Raju Jha</a>
              </h3>
              <p>Secretary</p>
            </div>
          </div>
          <!--/ End Single Team -->
          <!-- Single Team -->
          <div class="xs-team">
            <div class="xs-team-thumb">
              <img src="<?php echo base_url('front_css'); ?>/img/team/team-4.jpg" alt="Ana Mariea">
              <div class="xs-team-overlay d-flex align-items-center">
                <ul class="list-unstyled xs-team-share">
                  <li>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="xs-team-content">
              <h3>
              <a href="#">Sanjib Kumar Jha</a>
              </h3>
              <p>Secretary</p>
            </div>
          </div>
          <!--/ End Single Team -->
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- /End Team Area -->



<section class="blog section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="section-title">
              <h2>latest news</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <?php 
      foreach ($blogs as $blog) { ?>
          <div class="col-md-4 col-sm-12 col-xs-12">
            <!-- Single Blog -->
            <div class="single-news">
              <div class="news-head">
                <img src="<?php echo base_url('user_upload/blogs') ?>/<?php echo $blog['image'] ?>" alt="#">
              </div>
              <div class="news-body">
                <div class="news-content">
                  <h2><a href="#"><?php echo $blog['title'] ?></a></h2>
                  <p class="text"> <?php 
                $string =$blog['description'];
                $string = character_limiter($string, 200);
               echo $string;
                 ?></p>
                  <div class="bottom">
                    <div class="left">
                      <i class="far fa-clock"></i><span><?php echo time_ago($blog['created_at']) ?> | <?php echo helper_comment_date_format($blog['created_at']) ?></span>
                      

                        


                    </div>
                    <!-- <div class="right">
                      <i class="fas fa-comments"></i><span>5 Comments</span>
                    </div> -->
                  </div>
                </div>
              </div>
            </div>
            <!-- End Single Blog -->
          </div>
        <?php } ?>
           
        </div>
      </div>
    </section>