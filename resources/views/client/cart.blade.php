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
            <div class="step">
                <span>4</span>
                <p>Order Summery</p>
            </div><!-- /step -->
            </div><!-- /steps-holder -->
            
            <div class="cart-main-container">
            
            <div class="cart-table table-responsive">
                <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                        <tr class="prod-{{ $item->pivot->id }}">
                            <td>
                                <div class="prod-list-thumb media">
                                    <figure class="media-left"><a href="{{ route('client.products.detail', ['id' => $item->uuid, 'name' => str_replace(' ', '-', strtolower($item->name)) ]) }}"><img src="{{ $item->avatar_url ?? '/admin/img/no-image.jpg' }}" alt="image" width="150px" style="height: auto;"></a></figure>
                                    <div class="media-body" style="width: 200px;">
                                        <h4 class="text-primary"><a href="{{ route('client.products.detail', ['id' => $item->uuid, 'name' => str_replace(' ', '-', strtolower($item->name)) ]) }}">{{ $item->name }}</a></h4>
                                    </div>
                                </div>
                            </td>
                            <td><div class="prod-price mark-price">{{ $item->selling_price }}</div></td>
                            <td><div class="prod-qty"><input type="text" value="{{ $item->pivot->quantity }}">pcs</div></td>
                            <td><div class="prod-price" style="width: 100px;"><strong class="mark-price">{{ $item->selling_price * $item->pivot->quantity }}</strong></div></td>
                            <td><a href="#" class="prod-del remove-prod" data-id="{{ $item->pivot->id }}"><i class="flaticon-close9"></i>Delete</a></td>
                        </tr>
                    @endforeach
                    <tr>
                        {{-- <td colspan="3">
                            <div class="checkbox">
                            <label><input type="checkbox"><strong>Shipping Insurance - Special Offer!</strong></label>
                            </div>
                            <p>I want the guarantee of delivery and prevention from any possible needs to make a complaint. In case of lost or damages items, we will send you new ones right away.</p>
                        </td>
                        <td colspan="2">
                            <div class="prod-price"><strong>$44.50</strong></div>
                        </td> --}}
                    </tr>

                    {{-- Multiple sale for product --}}
                    {{-- <tr>
                        <td colspan="5">
                            <div><a data-toggle="collapse" href="#gift-infor-1"><strong>Select a free gift with purchase</strong> <i class="flaticon-small63"></i></a></div>
                            <div id="gift-infor-1" class="gift-boxes collapse">
                            <div class="row">
                                <div class="col-sm-6  col-md-4">
                                <div class="gift-list-thumb media">
                                    <figure class="media-left"><img src="images\resource\img-16.jpeg" alt="image"></figure>
                                    <div class="media-body">
                                    <div class="radio">
                                        <label><input type="radio" name="free-gift">Bvlgari Jasmin Noir eau de parfum tester for women</label>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6  col-md-4">
                                <div class="gift-list-thumb media">
                                    <figure class="media-left"><img src="images\resource\img-17.jpeg" alt="image"></figure>
                                    <div class="media-body">
                                        <div class="radio">
                                            <label><input type="radio" name="free-gift">Thierry Mugler Alien eau de parfum for women</label>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div><!-- /#gift-infor-1 -->
                        </td>
                    </tr> --}}
                    <tr>
                        <td colspan="5">
                            <div class="form-inline">
                                <label>Gift Voucher or discount code</label>
                                <div class="form-group">
                                    <input type="text" id="voucher" name="voucher" class="form-control" placeholder="voucher or discount code">
                                </div>
                                <button type="button" class="btn btn-dark get-promotion">Submit</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="prod-price-tot">Total price of items</div>
                        </td>
                        <td colspan="2">
                        <div class="prod-price"><strong id="total-price" class="mark-price">{{ $totalPrice }}</strong></div>
                    </td>
                    </tr>
                </tbody>
                </table>

            </div><!-- /cart-table -->

            <div class="row cart-actions">
                <div class="col-sm-6">
                <a class="go-back" href="/"><i class="flaticon-arrow83"></i>Back to Shop</a>
                </div>
                <div class="col-sm-6">
                    <a class="btn btn-default btn-lg" id="btn-check-address" href="{{ route('client.shippingAddress') }}">Proceed to Checkout</a>
                </div>
            </div>
            


            </div><!-- /cart-main-container -->


        </div><!-- /cart-block -->
        </div>

    </section>

@endsection

@section('custom-js')
    <script>
        $('.mark-price').mask('#.##0', { reverse: true }).append(' đ');
        $('.get-promotion').on('click', function() {
            $.ajax({
                url : "{{ route('client.ajaxCheckPromotion') }}",
                method: 'GET',
                data: {
                    voucher: $('#voucher').val()
                }
            }).done(function(data){
                $.notify({
					// options
					message: data.msg
				});
                var href = "{{ route('client.shippingAddress', ['voucher' => '__VOUCHER__' ]) }}"
                href = href.replace(/__VOUCHER__/g, $('#voucher').val());
                $('#btn-check-address').attr('href', href)

                var totalPrice = '{{ $totalPrice ?? 0 }}'
                var totalPriceReduction = parseInt(totalPrice) - data.data.price
                console.log(parseInt(totalPrice), data.data.price)
                $('#total-price').text(totalPriceReduction.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")).append(' đ')
            });
		});
       
    </script>
@endsection