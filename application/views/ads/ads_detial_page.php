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
			<div class="col-md-8">
				<div class="item-box" style="margin-top: 0px;">
					<div class="pr-bl">
						<div class="product-slider">
							<div id="carousel-custom" class="carousel slide" data-ride="carousel" data-interval="10000">
								<!-- Wrapper for slides -->
								<div class="carousel-inner" role="listbox">
									<div class="item active">
										<img src="<?php echo site_url('/user_upload/ads/'.$info['image']);?>" class="img-responsive">
									</div>
									<!--                       <div class="item">
										<img src="images/ads/01.jpg" class="img-responsive">
									</div>
									<div class="item">
										<img src="images/ads/01.jpg" class="img-responsive">
									</div>
									<div class="item">
										<img src="images/ads/01.jpg" class="img-responsive">
									</div>
									<div class="item">
										<img src="images/ads/01.jpg" class="img-responsive">
									</div>
									<div class="item">
										<img src="images/ads/01.jpg" class="img-responsive">
									</div> -->
								</div>
								<?php /* ?>
								<a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
									<i class="fa fa-chevron-left"></i>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
									<i class="fa fa-chevron-right"></i>
									<span class="sr-only">Next</span>
								</a>
								<ol class="carousel-indicators visible-sm-block hidden-xs-block visible-md-block visible-lg-block">
									<li data-target="#carousel-custom" data-slide-to="0" class="active">
										<img src="images/ads/01.jpg" class="img-responsive">
									</li>
									<li data-target="#carousel-custom" data-slide-to="1">
										<img src="images/ads/01.jpg" class="img-responsive">
									</li>
									<li data-target="#carousel-custom" data-slide-to="2">
										<img src="images/ads/01.jpg" class="img-responsive">
									</li>
									<li data-target="#carousel-custom" data-slide-to="3">
										<img src="images/ads/01.jpg" class="img-responsive">
									</li>
									<li data-target="#carousel-custom" data-slide-to="4">
										<img src="images/ads/01.jpg" class="img-responsive">
									</li>
									<li data-target="#carousel-custom" data-slide-to="5">
										<img src="images/ads/01.jpg" class="img-responsive">
									</li>
								</ol>
								<?php */ ?>
							</div>
						</div>
					</div>
					<i class="fa fa-heart" aria-hidden="true"></i>
					<div class="cont">
						<h5><?php  echo $info['title'] ?></h5>
						<div class="location"><i class="fa fa-map-marker" aria-hidden="true"></i><?php  echo $info['location'] ?></div>
						<div class="tag"><i class="fa fa-tag" aria-hidden="true"></i></div>
						<div class="star">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<div class="more-details">
							<h5>More Details</h5>
							<div class="color-sec">
								<div class="blue"><?php echo time_ago($info['created_at']); ?></div>
								<?php if($info['is_feature']==1){ ?>
								<div class="green">Featured</div>
								<?php } ?>
								<div class="red">50% off</div>
							</div>
							<!-- <ul class="makeit">
								<li><span>Make</span> Zareef Square</li>
								<li><span>Year</span> 07/Jan/2018</li>
								<li><span>Flat</span> 2</li>
								<li><span>Used</span> Yes</li>
							</ul> -->
						</div>
						<div class="price">$<?php echo $info['price'] ?></div>
						<a class="call-now" href="">Call Now</a>
					</div>
				</div>
				<div class="ad-box">
					<div class="cont">
						<h5><?php echo $info['title'] ?></h5>
						<p><?php echo $info['description'] ?>  </p>
						<div class="price">$<?php echo $info['price'] ?></div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="ad-box">
					<div class="cont">
						<h3>Ad Owner</h3>
						<div class="star">
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
							<i class="fa fa-star" aria-hidden="true"></i>
						</div>
						<div class="ad-owner">
							<i class="fa fa-user" aria-hidden="true"></i>
							<div class="name">
								<!-- <span> ONLINE</span><br> -->
								<br>
								 <b><?php echo $this->auth_model->get_user_name($info['user_id']);  ?>
								</b> <br>
								  <small>Since 2020</small></div>
							<a class="viewprofile" href="">View Profile</a>
						</div>
					</div>
				</div>
				<div class="call-btn">
					<img src="<?php echo base_url('front_css') ?>/images/call.jpg" class="img-responsive">
				</div>
				<div class="ad-box">
					<div class="cont">
						<div class="contact enquiref">
							<h3>Contact Ad Owner</h3>
							
							<div class="form-box">
								<form action="response1.php" method="post" onsubmit="return formvalidation(this)">
									<div class="sm-cont">
										<div id="c1">
											<input placeholder="Full Name" id="name" name="name" type="text" class="border" onfocus="this.className='border1';" onblur="this.className='border';" value="">
											
											<input placeholder="Address" id="address" name="address" type="text" class="border" onfocus="this.className='border1';" onblur="this.className='border';" value="">
											<input placeholder="Phone" id="phone" name="phone" type="text" class="border" onfocus="this.className='border1';" onblur="this.className='border';" value="">
											<input placeholder="E-mail" id="email" name="email" type="text" class="border" onfocus="this.className='border1';" onblur="this.className='border';" value="">
											
											<input name="Submit2" type="submit" value="SUBMIT" onmouseover="this.className='button1'" class="button" onmouseout="this.className='button'">
										</div>
										
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>
				<img src="<?php echo base_url('front_css') ?>/images/add.jpg" alt="add" class="img-responsive add-img">
			</div>
		</div>
	</div>
</div>
<div class="featured-ads" style="background: #fff">
	<div class="container">
		<div class="text-center">
			<h4>Featured <span>Ads</span></h4>
			<p>Consectetur adipicing elit sed temporie incidint ut et dolore .</p>
		</div>
		<div class="row">
			<?php foreach ($featured_ads as $row) { ?>
           <div class="col-md-3 col-sm-6">
              <div class="item-box">
                <img src="<?php echo site_url('/user_upload/ads/'.$row['image']);?>" class="img-responsive" alt="ads">
                <!-- <div class="off">50% OFF</div> -->
                <div class="time"><?php echo time_ago($row['created_at']); ?></div>
                <i class="fa fa-heart" aria-hidden="true"></i>

                <div class="cont">
                  <a href="<?php echo site_url($row['slug']);?>"><h5><?php echo $row['title']; ?></h5></a>
                 <!-- <a href="<?php echo site_url('/ads/detail/'.$row['id'].'/'.$row['slug']);?>"> <h5><?php echo $row['title']; ?></h5></a> -->
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