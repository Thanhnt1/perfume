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
            <p>Shipping and Payment</p>
            </div><!-- /step -->
            <div class="step active">
            <span>4</span>
            <p>Order Summery</p>
            </div><!-- /step -->
        </div><!-- /steps-holder -->
        
        <div class="form-main-container">
            <form class="checkout-form" method="post" action="#">
            <div class="row">
                <div class="col-sm-6 col-md-offset-3">
                    <div class="widget widget-shipping-info">
                        <div class="text-center">
                            <i class="fas fa-check-circle fa-lg" style="color: green;"></i> Payment Success
                        </div>
                    </div><!-- /widget-shipping-info -->
                    
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