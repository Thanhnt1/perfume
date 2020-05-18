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
            <div class="step active">
            <span>3</span>
            <p>Payment</p>
            </div><!-- /step -->
            <div class="step">
            <span>4</span>
            <p>Order Summery</p>
            </div><!-- /step -->
        </div><!-- /steps-holder -->
        
        <div class="form-main-container">
            <form class="checkout-form" method="post" action="{{ route('client.order') }}">
                @csrf
                <input type="hidden" name="customer_id" value="{{ \Auth::guard('customer')->user()->id }}">
                <input type="hidden" name="type_shipping_id" value="{{ request()->shipping_type }}">
                <input type="hidden" name="total_price" value="{{ request()->total }}">
                <input type="hidden" name="total_discount" value="{{ $voucher }}">
                <input type="hidden" name="shipping_date" value="{{ Carbon\Carbon::now()->addDays(1)->format('Y-m-d')  }}">
                <input type="hidden" name="receive_date" value="{{ Carbon\Carbon::now()->addDays($typeShipping->day_shipping_count+1)->format('Y-m-d')  }}">
                <input type="hidden" name="recipient_name" value="{{ request()->name }}">
                <input type="hidden" name="recipient_address" value="{{ request()->location }}">
                <input type="hidden" name="recipient_phone" value="{{ request()->phone }}">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-section-box">
                            <h5>Method of Payment</h5>
                            <ul class="shipping-list">
                                <li>
                                    <div class="radio">
                                    <label><input type="radio" name="payment_methods" value="2" class="checkParent" disabled>
                                    <strong>Credit Card Payment (online)</strong></label>
                                    </div>
                                    <ul class="list-cards">
                                    <li><img alt="" src="client\images\logo-visa.png"></li>
                                    <li><img alt="" src="client\images\logo-americanexpress.png"></li>
                                    <li><img alt="" src="client\images\logo-mastercard.png"></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="radio">
                                    <label><input type="radio" name="payment_methods" value="1" class="checkParent" disabled>
                                    <strong>Paypal</strong></label>
                                    </div>
                                    <ul class="list-cards">
                                    <li><img alt="" src="client\images\logo-paypal.png"></li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="radio">
                                        <label><input type="radio" name="payment_methods" value="0" class="checkParent" checked>
                                        <strong>Shipping to your location <i class="fas fa-shipping-fast"></i></strong></label>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- /form-section-box -->
                    </div>
                    <div class="col-sm-6">
                        <div class="widget widget-shipping-info" style="margin-bottom: 15px;">
                            <ul>
                                <li>Price of items <span class="mark-price">{{ $totalPrice }}</span></li>
                                @if ($voucher)
                                    <li>Voucher Fee Reduce <span class="mark-price">{{ $voucher }}</span></li>
                                @endif
                                <li>Shipping Fee <span class="shipping-fee mark-price">{{ $typeShipping->price }}</span></li>
                                <li class="total-price-hid" hidden>{{ $voucher ? $totalPrice - $voucher : $totalPrice  }}</li>
                                <li>Total <strong class="mark-price total-price">{{ request()->total  }}</strong></li>
                            </ul>
                        </div><!-- /widget-shipping-info -->
                        <div class="form-group">
                            <label for="note" class="control-label">Note</label>
                            <textarea name="note" class="form-control" id="note"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="row cart-actions">
                    <div class="col-sm-6">
                        <a href="{{ route('client.shippingAddress', ['voucher' => request()->voucher]) }}" class="go-back"><i class="flaticon-arrow83"></i>Return to previous page</a>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-default">Continue</button>
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
</script>
@endsection