<?php include ("common/header.php") ?>
<div class="titlepart">
  <div class="single-bg">
   <div class="container"> 
    <div class="row"> 
      <div class="col-md-12">
       <div class="title_name"> 
        <h2 class="text-center">members</h2> 
      </div> 
    </div> 
  </div>
</div> 
</div>
</div>
  <div class="contact-area">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-xs-12 contact-form">
          <h2>Be a Member</h2>
          <form class="contact-form" method="post" action="mail/mail.php">
            <div class="row">
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Your First Name*</label>
                  <input class="form-control" id="first_name" name="first_name" placeholder="your first name" type="text">
                  <span class="alert-error"></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Your Middle Name*</label>
                  <input class="form-control" id="middle_name" name="middle_name" placeholder="your middle name" type="text">
                  <span class="alert-error"></span>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Your Last Name*</label>
                  <input class="form-control" id="last_name" name="last_name" placeholder="your last name" type="text">
                  <span class="alert-error"></span>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Date of Birth*</label>
                  <input class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Date of Birth" type="text">
                  <span class="alert-error"></span>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Address In Nepal*</label>
                  <input class="form-control" id="address_in_nepal" name="address_in_nepal" placeholder="Address In Nepal" type="text">
                  <span class="alert-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Address In London*</label>
                  <input class="form-control" id="address_in_London" name="address_in_London" placeholder="Address In London" type="text">
                  <span class="alert-error"></span>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Email Address*</label>
                  <input class="form-control" id="email" name="email" placeholder="Email Address" type="email">
                  <span class="alert-error"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Contact Phone Mobile*</label>
                  <input class="form-control" id="contact_phone_mobile" name="contact_phone_mobile" placeholder="Contact Phone Mobile" type="number">
                  <span class="alert-error"></span>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Home Phone*</label>
                  <input class="form-control" id="Home Phone" name="home_phone" placeholder="Home Phone" type="number">
                  <span class="alert-error"></span>
                </div>
              </div>
               <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="exampleFormControlInput1">House no*</label>
                  <input class="form-control" id="House no" name="house no" placeholder="House number" type="text">
                  <span class="alert-error"></span>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Post code*</label>
                  <input class="form-control" id="Post code" name="post code" placeholder="Post code" type="text">
                  <span class="alert-error"></span>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Street*</label>
                  <input class="form-control" id="Street" name="Street" placeholder="Street" type="text">
                  <span class="alert-error"></span>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="form-group form-group-md">
              <label for="exampleInputFile">upload image</label>
              <input type="file" id="exampleInputFile">
            </div>
             </div>
             <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="form-group form-group-md">
              <label for="exampleFormControlInput1">Messages*</label>
              <textarea class="form-control" rows="6"></textarea>
            </div>
             </div>
             
            </div>
            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="form-group button">
                  <button type="submit" class="btn primary">Submit <i class="fa fa-paper-plane"></i></button>
                </div>
              </div>
            </div>
          </form>
        </div>
         <div class="col-md-4 col-xs-12 address">
      <div class="address-items">
        <ul class="info">
          <li>
            <h4>Office Location</h4>
            <div class="icon"><i class="fas fa-map-marked-alt"></i></div>
            <span>22 Baker Street,<br> London, United Kingdom,<br> W1U 3BW</span>
          </li>
          <li>
            <h4>Office Hours</h4>
            <div class="icon"><i class="fas fa-clock"></i> </div>
            <span>10.00am - 8.00pm<br>8.00pm - 10.00am</span>
          </li>
          <li>
            <h4>Phone</h4>
            <div class="icon"><i class="fas fa-phone"></i></div>
            <span>+44-20-7328-4499 <br>+99-34-8878-9989</span>
          </li>
          <li>
            <h4>Email</h4>
            <div class="icon"><i class="fas fa-envelope-open"></i> </div>
            <span>info@yourdomain.com<br>admin@yourdomain.com</span>
          </li>
        </ul>
      </div>
    </div>


      </div>
    </div>
  </div>
<?php include ("common/footer.php") ?>