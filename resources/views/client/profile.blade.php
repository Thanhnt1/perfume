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
                                    <p>{{ $user->name }}
                                    <ul class="meta-list">
                                        <li><a href="#edit-password-box" class="text-primary" data-toggle="collapse">Change Password</a></li>
                                    </ul>
                                    <!-- /form-section-box -->
                                    <div id="edit-password-box" class="form-section-box collapse">
                                        <form class="edit-password-form text-center" method="post" action="{{ route('client.user.update', ['id' => $user->uuid]) }}">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col">
                                                    <input type="password" class="form-control" name="pre_password" placeholder="Previous Password" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <input type="password" id="new_password" class="form-control" name="new_password" placeholder="New Password" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <input type="password" id="confirm_password" class="form-control" name="confirm_password"  placeholder="Repeat New Password" required>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-default" id="updatePassword">Save</button>
                                        </form>
                                        <!-- /edit-contact-form -->
                                    </div>
                                    <!-- /form-section-box -->
                                </div>
                                <!-- /section-inner -->

                                <div class="section-inner">
                                    <ul class="meta-list">
                                        <li><a href="{{ route('client.user.purchase') }}">Đơn Mua</a></li>
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
                                <form action="{{ route('client.user.update', [ 'id' => $user->uuid ]) }}" method="post">
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
                                            <input type="text" id="email" class="form-control" name="email" placeholder="Email" value="{{ old('email', $user->email) }}">
                                            <p class="help-block">We will send information about the status of your order to this address.</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">Location</label>
                                        <div class="col-md-9">
                                            <input type="text" id="location" class="form-control" name="location" placeholder="Location" value="{{ old('location', $user->location) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">Phone Number</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{ old('phone', $user->phone) }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">Sex</label>
                                        <div class="col-md-9">
                                            <select id="sex" name="sex"  class="form-control">
                                                <option value="2" {{ old('sex', $user->sex) == 2 ? 'selected' : '' }}>FeMale</option>
                                                <option value="1" {{ old('sex', $user->sex) == 1 ? 'selected' : '' }}>Male</option>
                                                <option value="0" {{ old('sex', $user->sex) == 0 ? 'selected' : '' }}>other</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
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
                                    </div> --}}
                                    <button type="submit" class="btn btn-default">Save</button>
                                </form>
                            </div>
                            <!-- /form-section-box -->
                            {{-- <div class="special-offer-text">
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

                            </div> --}}
                            <!-- /special-offer-text -->

                        </div>
                    </div>
                </div>
                <!-- /form-main-container -->

            </div>
            <!-- /cart-block -->
        </div>
    </section>
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

@section('custom-js')
    <script>
        $('#phone').mask('00000000000');

        $('#email').attr("pattern","^[-a-zA-Z0-9#$%^&'`?{}_=+\/}{\'?]+(\.[-a-zA-Z0-9#$%^&'`?{}_=+\/}{\'?]+)+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$");

        $('#updatePassword').click(function(){
            var confirmpassword = $('#confirm_password').val();
            var password = $('#new_password').val()
            $("#new_password").prop('required',true);
            if(confirmpassword != password)
                $('#confirm_password')[0].setCustomValidity('Passwords must match.');
            else 
                $('#confirm_password')[0].setCustomValidity('');
        });
    </script>
@endsection