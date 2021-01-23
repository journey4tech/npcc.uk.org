<div class="titlepart">
  <div class="single-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title_name">
            <h2 class="text-center"><?php echo $section_title; ?></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<section class="blog">
  <div class="container">
    <div class="row">

      <?php 
      foreach ($blogs as $blog) { ?>
      <div class="col-md-3 col-sm-12 col-xs-12">
       
        <div class="single-news">
          <div class="news-head">
            <img src="<?php echo base_url('user_upload/blogs') ?>/<?php echo $blog['image'] ?>" alt="#">
          </div>
          <div class="news-body">
            <div class="news-content">
              <h2><a href="#"><?php echo $blog['title'] ?></a></h2>
              <p class="text">
                <?php 
                $string =$blog['description'];
                $string = character_limiter($string, 100);
               echo $string;
                 ?>


              <div class="bottom">
                <div class="left">
                  <i class="far fa-clock"></i><span><?php echo $blog['created_at'] ?></span>
                </div>
                <!-- <div class="right">
                  <i class="fas fa-comments"></i><span>5 Comments</span>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      
      </div>
    <?php } ?>

 


<!-- pagination -->
<div class="row">
  <div class="col-md-12">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!--/ End pagination -->
</div>
</div>
</section>