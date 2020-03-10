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
                        </form>
                        <!-- /accounts-form -->
                        <p class="help-block"><a href="#">Forgot your password?</a></p>
                    </div>
                    <!-- /box-section -->
                    <div class="box-section">
                        <h6>New Customer - Register Benifits</h6>
                        {{-- <form class="accounts-form clearfix">
                            <div class="form-left">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email" required="">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-default text-uppercase" value="Sign Up">
                        </form> --}}
                        <!-- /accounts-form -->
                    </div>
                    <!-- /box-section -->
                </div>
                <!-- /dropBox -->
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
                    </div>
                    <!-- /box-section -->
                </div>
                <!-- /dropBox -->
            </li>
        </ul>
        <!-- /tp-links -->
    </div>
</div>
<!-- /tp-bar -->

<div class="main-bar">
    <div class="logo">
        <a href="/"><img src="{{ asset('client/images/logo.png')}}" alt="perfume"></a>
    </div>
    <!-- /logo -->
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
                        </form>
                        <!-- /accounts-form -->
                    </div>
                    <!-- /box-section -->
                </div>
                <!-- /dropBox -->

            </li>
            <li>
                <span class="cart-btn dropBox-btn"><i class="flaticon-shopping191"></i><span class="badge">0</span></span>
                <div class="dropBox">
                    <div class="box-section">
                        <ul class="cart-info-list">
                            <li class="cart-item">
                                <div class="cart-item-bx">
                                    <figure><img src="{{ asset('client/images/resource/img-1.jpeg')}}" alt="image"></figure>
                                    <div class="text">
                                        <h6><a href="#">Thierry Mugler Alien</a></h6>
                                        <p>EDT 30ml</p>
                                        <p>$45.99</p>
                                        <p class="tot">$45.99</p>
                                    </div>
                                    <button type="button" class="close">&times;</button>
                                </div>
                                <!-- /cart-item-bx -->
                            </li>
                            <li class="cart-item">
                                <div class="cart-item-bx">
                                    <figure><img src="{{ asset('client/images/resource/img-2.jpeg')}}" alt="image"></figure>
                                    <div class="text">
                                        <h6><a href="#">Thierry Mugler Alien</a></h6>
                                        <p>3.4 OZ spray</p>
                                        <p>$72.00</p>
                                        <p class="tot">$72.00</p>
                                    </div>
                                    <button type="button" class="close">&times;</button>
                                </div>
                                <!-- /cart-item-bx -->
                            </li>
                        </ul>
                        <!--/ cart-info-list -->
                        <a href="#" class="btn btn-dark btn-block dismiss-button">Continue Shopping</a>
                        <p>Enjoy complimentary shipping on all orders over $75 and also complimentary samples and returns with every order.</p>
                    </div>
                    <!-- /cart-info-box -->

                    <!-- empty cart message -->
                    <!-- <div class="box-section">
            <h6>Your Cart is empty</h6>
            <a href="#" class="btn btn-dark btn-block dismiss-button">Continue Shopping</a>
            <p>Enjoy complimentary shipping on all orders over $75 and also complimentary samples and returns with every order.</p>
          </div> -->
                    <!-- /cart-info-box -->
                </div>
                <!-- /dropBox -->
            </li>
            <li class="toggle-menu">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
            </li>
        </ul>
        <!-- /user-controls -->
    </div>
    <!-- /user-controls -->

    <div class="main-nav-bar">
        <nav class="navbar-collapse collapse">
            <ul class="main-nav">
                <li><a href="/">Home</a></li>
                <li>
                    <a href="#">Pages</a>
                    <ul>
                        {{-- <li><a href="blog.html">Blog</a></li>
                        <li><a href="blog-single.html">Blog Single</a></li>
                        <li><a href="product-single.html">Product Single</a></li> --}}
                        <li>
                            <a href="#">Shop Pages</a>
                            <ul>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout-shipping-address.html">Checkout Shipping Address</a></li>
                                <li><a href="checkout-shipping-payment.html">Checkout Shipping Payment</a></li>
                                <li><a href="my-account.html">My Account</a></li>
                            </ul>
                        </li>
                        {{-- <li><a href="services.html">Services</a></li>
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
                        <li><a href="error.html">404 Page</a></li> --}}
                    </ul>
                </li>
                <li><a href="#">Fragrances</a></li>
                <li><a href="beauty-expert.html">Makeup</a></li>
                <li><a href="shop-by-brand.html">Brand</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </div>
    <!-- /main-nav-bar -->
</div>
<!-- /main-bar -->