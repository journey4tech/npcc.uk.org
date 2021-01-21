 <style>
.featured-ads { background: #f5f7fa; }
.cont { background: #fff; border: none; }
</style>
<div class="sub-banner">
  <div class="container">
    <h1>Browse Ads</h1>
    <p><a href="<?php echo base_url() ?>">Home</a> > Browse Ads</p>
  </div>
</div>
<div class="featured-ads single">
  <div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="row">
            <?php foreach ($get_all_active as $row) { ?>
            <div class="col-sm-4">
              <div class="item-box">
                <img src="<?php echo site_url('/user_upload/ads/'.$row['image']);?>" class="img-responsive" alt="ads">
                <!-- <div class="off">50% OFF</div> -->
                <div class="time"><?php echo time_ago($row['created_at']); ?></div>
                <i class="fa fa-heart" aria-hidden="true"></i>

                <div class="cont">
                  <a href="<?php echo site_url('/ads/'.$row['slug']);?>"> <h5><?php echo $row['title']; ?></h5></a>
                 
                  <div class="location"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $row['location']; ?></div>
                  <div class="tag"><i class="fa fa-tag" aria-hidden="true"></i></div>
                  <div class="star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <!-- <del>$3,000</del> -->
                  <div class="price"> $ <?php echo $row['price'] ?></div>
                  <a class="call-now" href="">Call Now</a>
                </div>
              </div>
            </div>
           <?php } ?>
   </div>
        </div>
        
      </div>
    </div>
  </div>
