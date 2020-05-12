<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Perfume - eCommerce HTML5 Template</title>

  <link href="css\flaticon.css" rel="stylesheet">
  <link href="css\bootstrap.css" rel="stylesheet">
  <link href="css\style.css" rel="stylesheet">
  
  <link href="css\responsive.css" rel="stylesheet">
  <link href="css\color.css" rel="stylesheet">

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>

<div class="pageWrap">
  
  <div class="tp-bar">
    <div class="container">
      <ul class="tp-links">
        <li>
          <span class="dropBox-btn">Account <i class="caret caret-cut"></i></span>
          <div class="dropBox">
            <div class="box-section">
              <h6>Returning Customer - Sign In</h6>
              <form class="accounts-form clearfix">
                <div class="form-left">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email Address" required="">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="">
                  </div>
                </div>
                <input type="submit" class="btn btn-default text-uppercase" value="Sign In">
              </form><!-- /accounts-form -->
              <p class="help-block"><a href="#">Forgot your password?</a></p>
            </div><!-- /box-section -->
            <div class="box-section">
              <h6>New Customer - Register Benifits</h6>
              <ul class="list-1">
                <li>I want access to VIP sales</li>
                <li>I do not want to fill in the form repeatedly</li>
                <li>I want an order summary</li>
              </ul>
              <form class="accounts-form clearfix">
                <div class="form-left">
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email" required="">
                  </div>
                </div>
                <input type="submit" class="btn btn-default text-uppercase" value="Sign Up">
              </form><!-- /accounts-form -->
            </div><!-- /box-section -->
          </div><!-- /dropBox -->
        </li>
        <li>
          <span class="dropBox-btn">English <i class="caret caret-cut"></i></span>
          <div class="dropBox dropBox-condensed">
            <div class="box-section">
              <ul class="langList">
                <li><a href="#">English</a></li>
                <li><a href="#">Gernman</a></li>
                <li><a href="#">French</a></li>
              </ul>
            </div><!-- /box-section -->
          </div><!-- /dropBox -->
        </li>
      </ul><!-- /tp-links -->
    </div>
  </div><!-- /tp-bar -->

  <div class="main-bar">
    <div class="logo">
      <a href="index-1.html"><img src="images\logo.png" alt="perfume"></a>
    </div><!-- /logo -->
    <div class="user-controls-bar">
      <ul class="user-controls">
        <li>
          <span class="site-search-btn dropBox-btn"><i class="flaticon-magnifier56"></i></span>
          <div class="dropBox">
            <div class="box-section">
              <form class="accounts-form clearfix">
                <div class="form-left">
                  <div class="form-group">
                    <input type="search" class="form-control" placeholder="Search Key">
                  </div>
                </div>
                <input type="submit" class="btn btn-default text-uppercase" value="Search">
              </form><!-- /accounts-form -->
            </div><!-- /box-section -->
          </div><!-- /dropBox -->

        </li>
        <li>
          <span class="cart-btn dropBox-btn"><i class="flaticon-shopping191"></i><span class="badge">0</span></span>
          <div class="dropBox">
            <div class="box-section">
              <h6>Your Cart is empty</h6>
              <a href="#" class="btn btn-dark btn-block dismiss-button">Continue Shopping</a>
              <p>Enjoy complimentary shipping on all orders over $75 and also complimentary samples and returns with every order.</p>
            </div><!-- /cart-info-box -->
          </div><!-- /dropBox -->
        </li>
        <li class="toggle-menu">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </li>
      </ul><!-- /user-controls -->
    </div><!-- /user-controls -->

    <div class="main-nav-bar">
      <nav class="navbar-collapse collapse">
        <ul class="main-nav">
          <li><a href="index-1.html">Home</a></li>
          <li>
            <a href="#">Pages</a>
            <ul>
              <li><a href="blog.html">Blog</a></li>
              <li><a href="blog-single.html">Blog Single</a></li>
              <li><a href="product-single.html">Product Single</a></li>
              <li>
                <a href="#">Shop Pages</a>
                <ul>
                  <li><a href="cart.html">Cart</a></li>
                  <li><a href="checkout-shipping-address.html">Checkout Shipping Address</a></li>
                  <li><a href="checkout-shipping-payment.html">Checkout Shipping Payment</a></li>                 
                  <li><a href="my-account.html">My Account</a></li>
                </ul>
              </li>
              <li><a href="services.html">Services</a></li>
              <li><a href="promotions.html">Promotions</a></li>
              <li><a href="testimonials.html">Testimonials</a></li>
              <li><a href="categories.html">Categories</a></li>
              <li><a href="wholesalers.html">Whole Salers</a></li>
              <li><a href="beauty-expert.html">Beauty Expert</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="our-team.html">Out Team</a></li>
              <li><a href="faq.html">FAQ</a></li>
              <li><a href="register.html">Register</a></li>
              <li><a href="coming-soon.html">Coming Soon</a></li>
              <li><a href="error.html">404 Page</a></li>
            </ul>
          </li>
          <li><a href="#">Fragrances</a></li>
          <li><a href="beauty-expert.html">Makeup</a></li>
          <li><a href="shop-by-brand.html">Brand</a></li>
          <li><a href="blog.html">Blog</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
    </div><!-- /main-nav-bar -->
  </div><!-- /main-bar -->

  <section class="section-banner">
    <div class="container">
      <ul class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">My Cart</li>
      </ul>
    </div>
  </section><!-- /section-banner -->

  <section class="section-compact">
    <div class="container">
      <div class="cart-block">
        <header class="heading-3 page-heading">
          <h4><a href="#" class="back-btn"><i class="flaticon-arrowhead7"></i>Back to Shop</a></h4>
        </header>
        
        <div class="steps-holder">
          <div class="step active">
            <span>1</span>
            <p>Pick Your Discount</p>
          </div><!-- /step -->
          <div class="step active">
            <span>2</span>
            <p>Shipping Address</p>
          </div><!-- /step -->
          <div class="step active">
            <span>3</span>
            <p>Shipping and Payment</p>
          </div><!-- /step -->
          <div class="step">
            <span>4</span>
            <p>Order Summery</p>
          </div><!-- /step -->
        </div><!-- /steps-holder -->
        
        <div class="form-main-container">
          <form class="checkout-form" method="post" action="#">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-section-box">
                  <h5>Shipping Method</h5>
                  <ul class="shipping-list">
                    <li>
                      <span class="price">$7.99</span>
                      <div class="radio">
                        <label><input type="radio" name="shipping-company-parent" value="" class="checkParent"><strong>Shipping Company</strong></label>
                      </div>
                      <ul>
                        <li>
                          <div class="radio">
                            <label><input type="radio" name="shipping-company" value="" class="checkChild">UPS (2-5 business days)</label>
                          </div>
                          <p>We are not able to deliver to Virgin Islands, Guam, Marshall Islands and other oversea territories.</p>
                        </li>
                      </ul>
                    </li>
                  </ul><!-- /shipping-list -->
                </div><!-- /form-section-box -->
              </div>
              <div class="col-sm-6">
                <div class="form-section-box">
                  <h5>Method of Payment</h5>
                  <ul class="shipping-list">
                    <li>
                      <div class="radio">
                        <label><input type="radio" name="shipping-payment" value="" class="checkParent">
                        <strong>Credit Card Payment (online)</strong></label>
                      </div>
                      <ul class="list-cards">
                        <li><img alt="" src="images\logo-visa.png"></li>
                        <li><img alt="" src="images\logo-americanexpress.png"></li>
                        <li><img alt="" src="images\logo-mastercard.png"></li>
                      </ul>
                    </li>
                    <li>
                      <div class="radio">
                        <label><input type="radio" name="shipping-payment" value="" class="checkParent">
                        <strong>Paypal</strong></label>
                      </div>
                      <ul class="list-cards">
                        <li><img alt="" src="images\logo-paypal.png"></li>
                      </ul>
                    </li>

                  </ul>
                </div><!-- /form-section-box -->
              </div>
            </div>
            <p class="price-detail">
              Price of items <strong>$44.99</strong> + Shipping <strong>$7.99</strong> = Total price of purchase <strong>$52.98</strong>
            </p>
            
            <div class="row cart-actions">
              <div class="col-sm-6">
                <a href="#" class="go-back"><i class="flaticon-arrow83"></i>Return to previous page</a>
              </div>
              <div class="col-sm-6">
                <a href="#" class="btn btn-default">Continue</a>
              </div>
            </div>



          </form>
        </div><!-- /form-main-container -->


      </div><!-- /cart-block -->
    </div>

  </section>

	<section class="section-focus bg-dark">
		<div class="container">
			
			<div class="promo-box">
				<div class="row">
					<div class="col-sm-9">
						<p><strong>Rewards Club</strong> - Reward yourself Perfume Points everytime you spend</p>
					</div>
					<div class="col-sm-3">
						<a class="btn btn-default btn-lg">Start Shopping</a>
					</div>
				</div>
			</div>
		</div>
	</section>


	<section class="section footer-widgets bg-lighter-grey">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="row">
						<div class="col-sm-4">
							<div class="widget widget-links">
								<header class="widget-heading">
									<h4>Useful Links</h4>
								</header>
								<nav>
									<ul>
										<li><a href="#">home</a></li>
										<li><a href="#">pages</a></li>
										<li><a href="#">fragrances</a></li>
										<li><a href="#">skin &amp; body</a></li>
										<li><a href="#">blog</a></li>
										<li><a href="#">contact</a></li>
									</ul>
								</nav>
							</div><!-- /widget-links -->
						</div>
						<div class="col-sm-4">
							<div class="widget widget-links">
								<header class="widget-heading">
									<h4>Service</h4>
								</header>
								<nav class="widget widget-links">
									<ul>
										<li><a href="#">Order Guide</a></li>
										<li><a href="#">Right of withdrawal</a></li>
										<li><a href="#">Shipping &amp; Delivery</a></li>
										<li><a href="#">Payment</a></li>
										<li><a href="#">Return Policy</a></li>
										<li><a href="#">Terms &amp; Conditions</a></li>
									</ul>
								</nav>
							</div><!-- /widget-links -->
						</div>
						<div class="col-sm-4">
							<div class="widget widget-links">
								<header class="widget-heading">
									<h4>My Account</h4>
								</header>
								<nav class="widget widget-links">
									<ul>
										<li><a href="#">Cart ( 0 )</a></li>
										<li><a href="#">My Account</a></li>
										<li><a href="#">Register</a></li>
										<li><a href="#">Newsletter</a></li>
									</ul>
								</nav>
							</div><!-- /widget-links -->
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="widget widget-contact">
						<h4>keep in touch</h4>
						<p>Join our Newsletter for all the latest arrivals, information on product releases, competitions, news and special offers.</p>
						<form class="contact-widget-form" method="post" action="index.html">
							<div class="form-group">
							  <input type="text" class="form-control" placeholder="Email Address" required="">
							</div>
							<input type="submit" class="btn btn-primary btn-block" value="Subscribe">
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section footer-widgets">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="widget widget-info">
						<header class="widget-heading-2">
							<h4><i class="flaticon-help"></i>Questions?</h4>
						</header>
						<p>We are here for you.</p>
						<nav>
							<ul>
								<li><i class="flaticon-phone72"></i>(012) 345-6789</li>
								<li><a href="#"><i class="flaticon-email15"></i>info@perfumesupport.com</a></li>
								<li><a href="#"><i class="flaticon-google125"></i>Would you like to speak live?</a></li>
							</ul>
						</nav>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget widget-info">
						<header class="widget-heading-2">
							<h4><i class="flaticon-shield90"></i>Security</h4>
						</header>
						<p>Art trade is a matter of trust.</p>
						<ul class="list-2">
							<li><a href="#">Authenticity verification</a></li>
							<li><a href="#">Buyers’ protection</a></li>
							<li><a href="#">Privacy protection</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget widget-info">
						<header class="widget-heading-2">
							<h4><i class="flaticon-shipping"></i>Shipping</h4>
						</header>
						<p>Free on orders over $75.</p>
						<ul class="list-2">
							<li><a href="#">Customized packaging</a></li>
							<li><a href="#">Careful handling</a></li>
							<li><a href="#">Insured shipping</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="widget widget-info">
						<header class="widget-heading-2">
							<h4><i class="flaticon-creditcard21"></i>Payments</h4>
						</header>
						<ul class="list-cards">
							<li><a href="#"><img src="images\logo-visa.png" alt=""></a></li>
							<li><a href="#"><img src="images\logo-americanexpress.png" alt=""></a></li>
							<li><a href="#"><img src="images\logo-mastercard.png" alt=""></a></li>
							<li><a href="#"><img src="images\logo-amazon.png" alt=""></a></li>
							<li><a href="#"><img src="images\logo-paypal.png" alt=""></a></li>
						</ul>
					</div>					
				</div>

			</div>
		</div>
	</section>
	
	<footer class="site-footer">
		<div class="container">
      <nav>
        <ul class="footer-links">
          <li><a href="#">Home</a></li>
          <li><a href="#">Pages</a></li>
          <li><a href="#">Fragrances</a></li>
          <li><a href="#">Skin</a></li>
          <li><a href="#">Body</a></li>
          <li><a href="#">Makeup</a></li>
          <li><a href="#">Brand</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </nav>
		</div>
	</footer>

</div><!-- /pageWrap -->

<div class="preloader-container">
  <div id="loading-center-absolute">
    <div class="object" id="object_one"></div>
    <div class="object" id="object_two"></div>
    <div class="object" id="object_three"></div>
    <div class="object" id="object_four"></div>
    <div class="object" id="object_five"></div>
    <div class="object" id="object_six"></div>
    <div class="object" id="object_seven"></div>
    <div class="object" id="object_eight"></div>
    <div class="object" id="object_big"></div>
  </div><!-- /loading-center-absolute -->
</div><!-- /preloader-container -->


<!-- JavaScript
================================================== -->
<script src="js\jquery-1.11.2.min.js"></script>
<script src="js\bootstrap.min.js"></script>
<script src="js\script.js"></script>

<script src="js\ie10-viewport-bug-workaround.js"></script>

</body>
</html>
