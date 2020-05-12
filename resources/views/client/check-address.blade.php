@extends('client.layouts.app')
@section('title', 'Cart')
@section('content')

<section class="section-compact">
    <div class="container">
    <div class="cart-block">
        <header class="heading-3 page-heading">
        <h4><a href="{{ URL::previous() ?? '/' }}" class="back-btn"><i class="flaticon-arrowhead7"></i>Back to Shop</a></h4>
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
        <div class="step">
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
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="form-section-box border-red">
                                <h5>Shipping Type</h5>
                                <ul class="shipping-list">
                                    @foreach ($typeShipping as $item)
                                        <li>
                                            <span class="price mark-price">{{ $item->price }}</span>
                                            <div class="radio">
                                                <label><input type="radio" name="shipping-type" value="{{ $item->price }}" class="checkParent"><strong>{{ $item->name }}</strong></label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul><!-- /shipping-list -->
                            </div><!-- /form-section-box -->
                        </div>
                        <div class="row">
                            @if (!\Auth::guard('customer')->check() || !\Auth::guard('customer')->user()->location)
                                <div class="form-section-box">
                                    <h5>Billing Address</h5>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">Street and House Number*</label>
                                        <div class="col-md-9">
                                        <input type="text" placeholder="Street and House Number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">City*</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="City" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">Phone Number*</label>
                                        <div class="col-md-9">
                                        <input type="text" placeholder="Phone Number" class="form-control">
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <label class="col-md-3 label-md">State</label>
                                        <div class="col-md-9">
                                        <select class="form-control">
                                            <option value="">- Select State -</option>
                                            <option value="one">option one</option>
                                            <option value="two">option two</option>
                                            <option value="three">option three</option>
                                        </select>
                                        </div>
                                    </div> --}}
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="different_delivery_location" value=""><strong>Delivery to a different address</strong></label>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">Name</label>
                                        <div class="col-md-9">
                                        <input type="text" placeholder="Name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">Company</label>
                                        <div class="col-md-9">
                                        <input type="text" placeholder="Company" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">City*</label>
                                        <div class="col-md-9">
                                        <input type="text" placeholder="City" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 label-md">Phone Number*</label>
                                        <div class="col-md-9">
                                        <input type="text" placeholder="Phone Number" class="form-control">
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row">
                                        <label class="col-md-3 label-md">State</label>
                                        <div class="col-md-9">
                                        <select class="form-control">
                                            <option value="">- Select State -</option>
                                            <option value="one">option one</option>
                                            <option value="two">option two</option>
                                            <option value="three">option three</option>
                                        </select>
                                        </div>
                                    </div> --}}
                                </div><!-- /form-section-box -->
                            @else
                                <h5>Billing Address</h5>
                                <div class="form-group row">
                                    <label class="col-md-3 label-md">Location</label>
                                    <div class="col-md-9">
                                    <input type="text" value="{{ \Auth::guard('customer')->user()->location }}" placeholder="Street and House Number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-md">Phone Number*</label>
                                    <div class="col-md-9">
                                    <input type="text" value="{{ \Auth::guard('customer')->user()->phone }}" placeholder="Phone Number" class="form-control">
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                    </div>
                    <div class="col-sm-4">
                        <div class="widget widget-shipping-info">
                        <ul>
                            <li>Price of items <span class="mark-price">{{ $totalPrice }}</span></li>
                            @if ($voucher)
                                <li>Voucher Fee Reduce <span class="mark-price">{{ $voucher }}</span></li>
                            @endif
                            <li>Shipping Fee <span class="shipping-fee"></span></li>
                            <li class="total-price-hid" hidden>{{ $voucher ? $totalPrice - $voucher : $totalPrice  }}</li>
                            <li>Total <strong class="mark-price total-price">{{ $voucher ? $totalPrice - $voucher : $totalPrice  }}</strong></li>
                        </ul>
                        </div><!-- /widget-shipping-info -->
                    </div>
                </div><!-- /row -->
                <div class="row cart-actions">
                    <div class="col-sm-6">
                        <a href="{{ route('client.cart') }}" class="go-back"><i class="flaticon-arrow83"></i>Return to previous page</a>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-default btn-cont">Continue</button>
                    </div>
                </div>
            </form>
        </div><!-- /form-main-container -->


    </div><!-- /cart-block -->
    </div>

</section>

@endsection

@section('custom-js')
<script>
    $('.mark-price').mask('#.##0', { reverse: true }).append(' đ');
    $('.shipping-list input').on('change', function() {
        $('.border-red').css('border', 'unset')
        var shippingType = $('input[name=shipping-type]:checked').val(); 
        $('.shipping-fee').empty();
        $('.shipping-fee').unmask();
        $('.shipping-fee').text(shippingType)
        $('.shipping-fee').mask('#.##0', { reverse: true }).append(' đ');
        $('.total-price').unmask();
        var currentTotalPrice = $('.total-price-hid').text()
        $('.total-price').text(currentTotalPrice - shippingType)
        $('.total-price').mask('#.##0', { reverse: true }).append(' đ');
    });
    $('.btn-cont').on('click', function() {
        var shippingType = $('input[name=shipping-type]:checked').val();
        if(!shippingType) {
            $('.border-red').css('border', '1px solid red')
        }
        else window.location.href = '{{ route("client.payment") }}'
    });
</script>
@endsection
