
  <!-- start blog page -->
  <section class="blog">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-xs-12">
          <!-- Single Full Width -->
          <div class="single-news">
            <div class="news-head">
              <p class="date">
<?php echo time_ago($info['created_at']) ?>
               <!--  27 <span>Mar</span><strong> 2020</strong> -->
              </p>
              <img src="<?php echo base_url('user_upload/blogs') ?>/<?php echo $info['image'] ?>" alt="#">
            </div>
            <div class="news-body">
              <div class="news-contents">
                <!-- <div class="author">
                  <a href="#">Business</a>
                  <span>By</span>
                  <a href="#">Anthin john</a>
                </div> -->
                <h2><a href="#"><?php echo $info['title'] ?></a></h2>
                <p class="text"><?php echo $info['description'] ?></p>
                
              </div>
            </div>
          </div>
        
      </div>
      <div class="col-md-4 col-xs-12">
            <div class="blog-sidebar">
              <div class="single-widget category">
              <!-- Single Widget -->
              <div class="single-widget recent-post">
                <h3 class="title">Recent post</h3>
               
 <?php 
      foreach ($blogs as $blog) { ?>
                <!-- Single Post -->
                <div class="single-post first">
                  <div class="image">
                   <a href="<?php echo base_url('blog/detail') ?>/<?php echo $blog['id'] ?>"> <img src="<?php echo base_url('user_upload/blogs') ?>/<?php echo $blog['image'] ?>" alt="#">
                   </a>
                  </div>
                  <div class="content">
                    <p><?php echo time_ago($blog['created_at']) ?></p>
                    <h5><a href="<?php echo base_url('blog/detail') ?>/<?php echo $blog['id'] ?>"><?php echo $blog['title'] ?></a></h5>
                  </div>
                </div>
                <!-- End Single Post -->
                <?php } ?>
              </div>
            </div>
          </div>
    </div>
  </div>
  
</section>
 