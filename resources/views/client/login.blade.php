@extends('client.layouts.app')
@section('title', 'Login')
@section('content')
<section class="section-banner">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Register</li>
        </ul>
    </div>
</section><!-- /section-banner -->

<section class="section-compact">
    <div class="container">
        <header class="heading-3 page-heading">
            <h4> Login &amp; Register</h4>
        </header>
        
        <div class="row">
            <div class="col-sm-6">
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
                    <div class="text-center">
                        <button type="submit" class="btn btn-default text-uppercase" style="position: static;">Sign In</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <div class="accounts-form clearfix">
                    <div class="form-left">
                        <div class="input-group">
                            <span class="input-group-addon">(+84)</span>
                            <input type="text" class="form-control" id="phone_login" name="phone" autocomplete="off" placeholder="{{ trans('index.phone') }}" name="{{ trans('index.phone') }}">
                        </div>
                        <br>
                        <div class="input-group check-code">
                            <div class="input-group-btn">
                                <button class="btn btn-default" style="padding-top: 6px; padding-bottom: 6px;" id="check-code-login">Check Code</button>
                            </div>
                            <input type="text" class="form-control" id="code_login" name="code" placeholder="Code">
                            <div class="input-group-btn">
                                <button class="btn btn-info text-uppercase" style="padding-top: 6px; padding-bottom: 6px;" id="send-sms-login">Send SMS</button>
                            </div>
                            <span id="message-login"></span>
                        </div>
                        <br>
                        <div class="input-group password">
                            <span class="input-group-addon">Password</span>
                            <input type="password" class="form-control" id="password-reg-login" name="password-reg" autocomplete="off" placeholder="{{ trans('index.password') }}">
                        </div>
                    </div>
                </div>
                <div class="text-center" style="margin-top: 20px;">
                    <button class="btn btn-default text-uppercase ml-3" id="sign-up-login">Sign Up</button>
                </div>
                
            </div>
        </div>
        <hr class="hr-text" data-content="OR">
        <div class="box-section text-center">
            <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary" style="background-color: #337ab7; border-color: #2e6da4;"><i class="fab fa-facebook"></i> Facebook</a>
            <a href="{{ url('/auth/redirect/google') }}" class="btn btn-danger"><i class="fab fa-google"></i> Google</a>
        </div>
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
@endsection

@section('custom-js')
    <script>
        var code = '';
        $('#phone_login').mask('0000000000');
        $('#sign-up-login').hide();
        $('.password').hide();
        $('#send-sms-login').on('click', function(){
            var phone = $('#phone_login').val();
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
        $('#check-code-login').on('click', function(){
            var inputCode = $('#code_login').val();
            if(inputCode == code) {
                // success
                $('.check-code').removeClass('has-error').addClass('has-success has-feedback');
                $('#message-login').removeClass('glyphicon-remove').addClass('form-control-feedback');
                $('.password').show();
                $('#sign-up-login').show();
            }
            else {
                // fail
                $('.check-code').removeClass('has-success').addClass('has-error has-feedback');
                $('#message-login').removeClass('glyphicon-ok').addClass('form-control-feedback');
                $('.password').hide();
                $('#sign-up-login').hide();
            }
        });
        $('#sign-up-login').on('click', function(){
            var inputCode = $('#code_login').val();
            var phone = $('#phone_login').val();
            var phoneTrim = 0 + phone.replace(/^0+/, '');
            var password = $('#password-reg-login').val();

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