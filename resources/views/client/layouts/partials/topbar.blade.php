<div class="tp-bar">
    <div class="container">
        <ul class="tp-links">
            @if(Auth::guard('customer')->check())
                <li>
                    <span class="dropBox-btn">{{ Auth::guard('customer')->user()->name }} <i class="caret caret-cut"></i></span>
                    <div class="dropBox dropBox-condensed">
                        <div class="box-section">
                            <ul class="langList">
                                <li><a href="{{ route('client.user.profile') }}">My Account</a></li>
                                <li><a href="{{ route('client.user.purchase') }}">My Order</a></li>
                                <li><a href="{{ route('client.logout') }}">Logout</a></li>
                            </ul>
                        </div>
                        <!-- /box-section -->
                    </div>
                    <!-- /dropBox -->
                </li>
            @else
                <li>
                    <span class="dropBox-btn">Account <i class="caret caret-cut"></i></span>
                    <div class="dropBox">
                        <div class="box-section">
                            <h6>Returning Customer - Sign In</h6>
                            <form action="{{ route('client.login') }}" method="POST" class="accounts-form clearfix">
                                @csrf
                                <div class="form-left">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" placeholder="{{ trans('index.phone') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="{{ trans('index.password') }}" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-default text-uppercase" style="position: static;">Sign In</button>
                            </form>
                            <!-- /accounts-form -->
                            <p class="help-block"><a href="#">Forgot your password?</a></p>
                        </div>
                        <!-- /box-section -->
                        <div class="box-section">
                            <h6>New Customer - Register Benifits</h6>
                            <div class="accounts-form clearfix">
                                <div class="form-left">
                                    <div class="input-group">
                                        <span class="input-group-addon">(+84)</span>
                                        <input type="text" class="form-control" id="phone" name="phone" autocomplete="off" placeholder="{{ trans('index.phone') }}" name="{{ trans('index.phone') }}">
                                    </div>
                                    <br>
                                    <div class="input-group check-code">
                                        <div class="input-group-btn">
                                            <button class="btn btn-default" style="padding-top: 6px; padding-bottom: 6px;" id="check-code">Check Code</button>
                                        </div>
                                        <input type="text" class="form-control" id="code" name="code" placeholder="Code">
                                        <span id="message"></span>
                                    </div>
                                    <br>
                                    <div class="input-group password">
                                        <span class="input-group-addon">Password</span>
                                        <input type="password" class="form-control" id="password-reg" name="password-reg" autocomplete="off" placeholder="{{ trans('index.password') }}">
                                    </div>
                                </div>
                                <button class="btn btn-default text-uppercase" id="send-sms">Send SMS</button>
                            </div>
                            <br>
                            <!-- /accounts-form -->
                        </div>
                        <div class="text-center">
                            <button class="btn btn-default text-uppercase ml-3" id="sign-up">Sign Up</button>
                        </div>
                        <hr class="hr-text" data-content="OR">
                        <div class="box-section text-center">
                            <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary" style="background-color: #337ab7; border-color: #2e6da4;"><i class="fab fa-facebook"></i> Facebook</a>
                            <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger"><i class="fab fa-google"></i> Google</a>
                        </div>
                        <!-- /box-section -->
                    </div>
                    <!-- /dropBox -->
                </li>
            @endif

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
                            <a href="{{ route('client.products') }}">Shop Pages</a>
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

@section('custom-js')
    <script>
        var code = null;
        $('#phone').mask('0000000000');
        $('#sign-up').hide();
        $('.password').hide();
        $('#send-sms').on('click', function(){
            var phone = $('#phone').val();
            var phoneTrim = 84 + phone.replace(/^0+/, '');
            var baseUrl = "{{ route('client.sendSms', ['phone' => '__PHONE__']) }}";
            var url = baseUrl.replace(/__PHONE__/g, phoneTrim);

            $.ajax({
                    url : url,
                    method: "GET",
                }).done(function(data){
                    if(data.status) {
                        $.notify({
                            // options
                            message: data.msg
                        });
                        code = data.data
                    } else {
                    }
                }).fail(function(data){
                    console.log(data);
                });
        });
        $('#check-code').on('click', function(){
            var inputCode = $('#code').val();
            if(inputCode == code) {
                // success
                $('.check-code').removeClass('has-error').addClass('has-success has-feedback');
                $('#message').removeClass('glyphicon-remove').addClass('glyphicon glyphicon-ok form-control-feedback');
                $('.password').show();
                $('#sign-up').show();
            }
            else {
                // fail
                $('.check-code').removeClass('has-success').addClass('has-error has-feedback');
                $('#message').removeClass('glyphicon-ok').addClass('glyphicon glyphicon-remove form-control-feedback');
                $('.password').hide();
                $('#sign-up').hide();
            }
        });
        $('#sign-up').on('click', function(){
            var inputCode = $('#code').val();
            var phone = $('#phone').val();
            var phoneTrim = 0 + phone.replace(/^0+/, '');
            var password = $('#password-reg').val();

            if(inputCode == code) {
                $.ajax({
                    url : "{{ route('client.register') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        name: phoneTrim,
                        email: phoneTrim,
                        phone: phoneTrim,
                        password: password
                    }
                }).done(function(data){
                    location.reload();
                });
            }
            else {
                $.notify({
                    message: '{{ trans("Code not match") }}'
                }, {
                    type: 'danger'
                });
            }
        });

    </script>
@endsection