@extends('client.layouts.app')
@section('title', 'Profile')
@section('content')
    <section class="section-banner">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">My Account</li>
            </ul>
        </div>
    </section><!-- /section-banner -->

    <section class="section-compact">
        <div class="container">
            <div class="cart-block">

                <div class="form-main-container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="shipping-info">
                                <div class="section-inner">
                                    <p>{{ Auth::guard('customer')->user()->name }}
                                    <ul class="meta-list">
                                        <li><a href="#edit-password-box" class="text-primary" data-toggle="collapse">Change Password</a></li>
                                    </ul>
                                    <!-- /form-section-box -->
                                    <div id="edit-password-box" class="form-section-box collapse">
                                        <form class="edit-password-form text-center" method="post" action="#">
                                            <h5>Change Password</h5>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Previous Password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="New Password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <input type="text" class="form-control" placeholder="Repeat New Password">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-default">Save</button>
                                        </form>
                                        <!-- /edit-contact-form -->
                                    </div>
                                    <!-- /form-section-box -->
                                </div>
                                <!-- /section-inner -->

                                <div class="section-inner">
                                    <ul class="meta-list">
                                        <li><a href="{{ route('client.user.purchase') }}">Edit Information</a></li>
                                    </ul>
                                    {{-- <ul class="meta-list">
                                        <li><a href="#">Edit Information</a></li>
                                    </ul> --}}
                                </div>
                                <!-- /section-inner -->
                            </div>
                            <!-- /shipping-info -->
                        </div>
                        <div class="col-sm-9">
                            <div class="form-section-box">
                                <form action="{{ route('client.user.update', [ 'id' => $user->id ]) }}" method="post">
                                    @csrf
                                    <h3>Hồ Sơ Của Tôi</h3>
                                    <h5>Quản lý thông tin hồ sơ để bảo mật tài khoản</h5>
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name', $user->name) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email', $user->email) }}">
                                            <p class="help-block">We will send information about the status of your order to this address.</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">Phone Number</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="phone" placeholder="Phone Number" value="{{ old('phone', $user->phone) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">Street and house number</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="Street and house number">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">City</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" placeholder="City">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">State</label>
                                        <div class="col-md-9">
                                            <select class="form-control">
                                                <option value="">- State -</option>
                                                <option value="one">option one</option>
                                                <option value="two">option two</option>
                                                <option value="three">option three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-default" value="Save">
                                </form>
                            </div>
                            <!-- /form-section-box -->
                            <div class="special-offer-text">
                                <p>I keep myself updated about special offers, discounts, and new arrivals via email.</p>
                                <a href="#edit-description-box" class="text-primary" data-toggle="collapse">Edit Information</a>

                                <div id="edit-description-box" class="form-section-box collapse">
                                    <form class="edit-password-form" method="post" action="#">
                                        <h5>Newsletter</h5>
                                        <div class="checks">
                                            <p>Select the special offers, new arrivals and VIP offers you are interested in and you will receive them via email:</p>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="">Perfumes</label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="">Beauty Products</label>
                                        </div>
                                        <div class="checks">
                                            <p>Select the magazines you want to receive via email:</p>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="">Magazines for women only</label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="">Magazines for men only</label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" value="">Magazines for men and women</label>
                                        </div>
                                        <input type="submit" class="btn btn-default btn-lg" value="Save">
                                    </form>
                                    <!-- /edit-contact-form -->
                                </div>
                                <!-- /form-section-box -->

                            </div>
                            <!-- /special-offer-text -->

                        </div>
                    </div>
                </div>
                <!-- /form-main-container -->

            </div>
            <!-- /cart-block -->
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
							<li><a href="#"><img src="/client/images/logo-visa.png" alt=""></a></li>
							<li><a href="#"><img src="/client/images/logo-americanexpress.png" alt=""></a></li>
							<li><a href="#"><img src="/client/images/logo-mastercard.png" alt=""></a></li>
							<li><a href="#"><img src="/client/images/logo-amazon.png" alt=""></a></li>
							<li><a href="#"><img src="/client/images/logo-paypal.png" alt=""></a></li>
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
@endsection
@section('advertisement')
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
        </div>
        <!-- /loading-center-absolute -->
    </div>
    <!-- /preloader-container -->

@endsection