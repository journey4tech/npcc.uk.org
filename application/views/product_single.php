
<div class="home-mainproduct mainproduct1">
 <div class="container">
  <h2><?php echo $info['name'] ?></h2>
  <img style="margin:0 auto 30px" src="<?php echo base_url('front_css'); ?>/images/border1.png" class="img-responsive" alt="icon">
  <div class="row">
    <div class="item_list col-md-5 col-sm-6">
     <a class="product-item">
      <div class="product-img-sec">
        <img src="<?php echo site_url('/user_upload/products/'.$info['feature_image']);?>" alt="pubg uc" class="img-responsive"> 
        <div class="productshop">
          <h3><?php echo $info['name'] ?></h3>
            <small>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
          </small>
          <span>Stock : <?php echo $info['quantity'];?></span>      
        </div>               
      </div>      
    </a>
    <div class="product_footer">  
     <h3><small><?php echo $info['name'];?></small>Rs <?php echo $info['price'];?></h3>
      <h4>Stock : <?php echo $info['quantity'];?></h4>
    </div>      

 

    <div class="order-info">
     
<h3>Payment Options:</h3>

<ul>
<li><span>1</span> Esewa: (We don't accept this now. We will update you in a few days.)</li>

<li><span>2</span> Khalti: 9863 196 510, TG Purchase</li>

<li><span>3</span> IME PAY (ID: your ID here, Your name here)</li>

<li><span>4</span> Bank Transfer</li>
</ul>

<p><strong>Note:</strong> Please donot send mobile topup.</p>

<p>If you have any queries, please direct contact us at:  <a href="tel:9863196510">9863 196 510</a> FB: <a href="https://www.facebook.com/TGonlinepurchase/">TGonlinepurchase</a> </p>

    </div>
  </div>
  <div class="col-md-7 col-sm-6">
    <div class="ragistrar-section" style="padding-top: 0;">
      <div class="row">
        <div>
            <div class="title" style="margin-top: 0"><strong>Buy Now</strong></div>
          </div>
        <div class="frm-box">
            <form>
              <label><span>Full Name:* </span><input type="text" name="name">  </label>
              <label><span>Phone:* </span><input type="number">  </label>

              <label for="price">Select Quantity:*
              <select id="quantity" name="quantity">  
                <option value="1">1</option> 
                <option value="2">2</option>  
                <option value="3">3</option>  
                <option value="4">4</option>  
              </select> </label> 


              <label><span>Enter your Player ID:* </span><input type="number" placeholder="Eg: 18567210301" required="">  </label>

              <label><span>Enter your Player Name:* </span><input type="number" placeholder="Eg: saradzzz" required="">  </label>

              <label>Payment Picture:
              <input type="file" id="payment_pics" name="payment_pics[]" class="form-control" multiple="true" accept="image/*" required=""></label> 


              <label>Description (Optional):
              <textarea placeholder="about your order information" name="comments" cols="20" rows="15" class="border" id="comments" style="height:175px"></textarea>
            </label>

              <p>By Clicking Register button, you agree our <a href="terms.php" target="blank">Terms and Conditions.</a></p>
              <button type="submit">Order Now</button>
              
            </form>
          </div>
      </div>
    </div>
          
        </div>
  
</div>
</div>
</div>