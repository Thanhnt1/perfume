@extends('client.layouts.app')
@section('title', 'Product')
@section('content')

	<section class="section-compact">
		<div class="container">

			<div class="single-container">
				<div class="product-single">
				  <div class="featured-box">
				    <div class="row">
				      <div class="col-sm-5">
				        <figure class="image text-center">
				          <img src="{{ $product->avatar_url ? $product->avatar_url : '/admin/img/no-image.jpg' }}" alt="image" width="250" style="height: auto; margin-left:auto;">
				          <figcaption>
				            <a href="#product-more" data-toggle="collapse">More pictures and videos  <i class="flaticon-small63"></i></a>
				          </figcaption>
				        </figure>
				      </div>
				      <div class="col-sm-7">
				        <div class="text">
							<p>Brand: <a href="{{ route('client.products.search', ['category' => $product->supplier->id, 'text_category' => $suppliers->name, 'count_category' => $suppliers->products->count()]) }}" class="text-primary">{{ $product->supplier->name }}</a></p>
							<h4>{{ $product->name }}</h4>
							<p>
								@if ($product->rate)
									<a href="#" class="read-more text-primary">{{$product->rate}}</a>
									@for ($i = 0; $i < 5; $i++)
										@if ($i < $product->rate)
											<i class="fas fa-star" style="color: #db4437;"></i>
										@else
											<i class="far fa-star"></i>
										@endif
									@endfor
									| <a href="#" class="read-more text-primary">{{$comments->total()}}</a> Đánh Giá
								@else
									Chưa Có Đánh Giá
								@endif
								| <strong>{{ $product->quantity_sold }}</strong>  Đã Bán
							</p>
							
							<p><span style="font-size: 30px; color: #bd081c;" id="selling_price">{{ $product->selling_price }}</span><span style="font-size: 15px;">đ</span></p>
							<p>
								<a href="#info-1" data-toggle="collapse">When do I receive my items, if I order now? <i class="flaticon-small63"></i></a>
							</p>
							<div id="info-1" class="collapse in">
								<p>Thursday 1/8/2020</p>
								<p>The times are just approximate, estimated according to the previous delivery times of shipping companies.</p>
							</div>
							@if (!$color->isEmpty())
								<div class="row" style="margin-bottom: 30px;">
									<div class="col-sm-3">Màu Sắc</div>
									<div class="col-sm-9">
										@foreach ($color as $item)
											<button type="button" class="btn btn-info btn-color" style="pointer-events: unset;" {{ $item->pivot->quantity <= 0 ? 'disabled' : null}} data-id="{{ $item->pivot->id }}" >{{$item->pivot->value}}</button>
										@endforeach
									</div>
								</div>
							@endif
							@if (!$volume->isEmpty())
								<div class="row" style="margin-bottom: 30px;">
									<div class="col-sm-3">Dung Tích</div>
									<div class="col-sm-9">
										@foreach ($volume as $item)
											<button type="button" class="btn btn-info btn-volume" style="pointer-events: unset;" {{ $item->pivot->quantity <= 0 ? 'disabled' : null}} data-id="{{ $item->id }}" >{{$item->pivot->value}}</button>
										@endforeach
									</div>
								</div>
							@endif
							<div class="row" style="margin-bottom: 30px;">
								<div class="col-sm-3">Số Lượng</div>
								<div class="col-sm-4">
									<div class="input-group">
										<div class="input-group-addon"><button style="background-color: #eee; border: 2px solid transparent;border-radius: 0px;" id="down">-</button></div>
										{{-- <input type="text" class="form-control" id="exampleInputAmount" placeholder="Amount"> --}}
										<input type="text" class="form-control text-center" id="quantity" value="1" disabled>
										<div class="input-group-addon"><button style="background-color: #eee; border: 2px solid transparent;border-radius: 0px;" id="up">+</button></div>
									</div>
								</div>
								<div class="col-sm-4">{{ $product->quantity }} sản phẩm có sẵn</div>
							</div>
							<button type="button" class="btn-custom btn-default" id="add-cart">Thêm Vào Giỏ Hàng</button>
							{{-- <button type="button" class="btn-custom btn-default" id="buy-it">Mua Ngay</button> --}}
				        </div>
				      </div>
				    </div>
				  </div><!-- /featured-box -->
				  <div id="product-more" class="product-more collapse in">
						@foreach ($product->images as $item)
							<figure class="media-left" style="vertical-align: middle;"><img src="{{ Storage::disk('dropbox')->exists($item->url) ? Storage::disk('dropbox')->url($item->url) : 'admin/img/no-image.jpg' }}" alt="image" width="200" style="height: auto;"></figure>
						@endforeach
				    </div><!-- /cart-table -->
				  </div><!-- /product-more -->
				</div><!-- /product-single -->

	        <div class="other-products">
				<header class="heading">
					<span class="caro-prev other-prev"><i class="flaticon-arrowhead7"></i></span>
					<span class="caro-next other-next"><i class="flaticon-arrow487"></i></span>
					<h4>other products from Calvin Klein Euphoria</h4>
				</header>
				<div class="carousel-multiple owl-carousel">
					@foreach ($otherProducts as $item)
						<div class="item">
							<div class="thumbnail thumbnail-product">
								<figure class="image-zoom">
									<img src="{{ $item->avatar_url ?? '/admin/img/no-image.jpg' }}" alt="image" width="150px" style="height: auto;">
								</figure>
								<div class="caption text-center"  style="padding: unset;">
									<h5 class="text-truncate" style="max-width: 200px;"><a href="{{ route('client.products.detail', ['id' => $item->uuid, 'name' => str_replace(' ', '-', strtolower($item->name)) ]) }}">{{ $item->name }}</a></h5>
									<div class="rating-star">
										@for ($i = 0; $i < 5; $i++)
											@if ($i < $item->rate)
												<i class="fas fa-star" style="color: #db4437;"></i>
											@else
												<i class="far fa-star"></i>
											@endif
										@endfor
									</div>
									<div class="prod-price text-primary">
										@if ($item->import_price)
											<span class="mark-price text-muted" style="text-decoration-line: line-through;">{{ $item->import_price }}</span> <span class="text-muted">-</span> 
										@endif
										<span class="mark-price">{{ $item->selling_price }}</span>
									</div>
								</div>
							</div><!-- /thumbail -->
						</div>
					@endforeach
				</div>
				</div><!-- /other-products -->
				
				<div class="product-description">
					<div class="row">
						<div class="col-sm-6">
							<div class="prod-desc-box">
								<h4>Chi tiết sản phẩm {{ $product->name }}</h4>
								{!!  $product->description !!}
							</div>
						</div>
						{{-- <div class="col-sm-6">
							<div class="row">
								<div class="col-sm-6">
									<div class="prod-desc-box">
										<h4>Composition</h4>
										<h5>Top notes</h5>
										<p>kaki persimmon, green notes, pomegranate</p>

										<h5>Middle notes</h5>
										<p>orchid, lotus</p>

										<h5>Base notes</h5>
										<p>amber, creamy notes, mahogany, musk, violet</p>
									</div><!-- /prod-desc-box -->
								</div>
								<div class="col-sm-6">
									<div class="prod-desc-box">
										<h4>Ratings</h4>
										<h5>Perfume bottle review</h5>
										<div class="rating-star">
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7"></i>
										</div><!-- /rating-star -->
										<h5>Lasting</h5>
										<div class="rating-star">
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7"></i>
										</div><!-- /rating-star -->
										<h5>Intensity</h5>
										<div class="rating-star">
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7"></i>
										</div><!-- /rating-star -->
										<h5>Overall impression</h5>
										<div class="rating-star">
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7 selected"></i>
											<i class="flaticon-favourites7"></i>
										</div><!-- /rating-star -->
										<p><a href="#">Rated by 1567 customers <i class="flaticon-small63"></i></a></p>
									</div><!-- /prod-desc-box -->
								</div>
							</div>
						</div> --}}
					</div>
				</div><!-- /product-description -->

				<div class="product-review-container">
					<header class="heading">
					  <h4>Đánh giá sản phẩm</h4>
					</header>
					@if ($product->rate)
						<div class="review-masthead">
							<div class="rating-star">
								@for ($i = 0; $i < 5; $i++)
									@if ($i < $product->rate)
										<i class="fas fa-star" style="color: #db4437;"></i>
									@else
										<i class="far fa-star"></i>
									@endif
								@endfor
							</div><!-- /rating-star -->
							<span>({{$comments->total()}} người đã đánh giá)</span>
						</div><!-- /review-masthead -->
						<div class="head-info">
							<div class="pagination-box">
								<ul class="pagination">
									@for ($i = 1; $i <= $comments->lastPage(); $i++)
										<li class="{{ $i == $comments->currentPage() ? 'active' : null }}"><a href="#">{{$i}}</a></li>
									@endfor
								</ul>
							</div><!-- /pagination-box -->
						</div><!-- /head-info -->

						<ul class="review-listing">
							@foreach ($comments->items() as $item)
								<li>
									<div class="prod-review-box">
										<div class="row">
											<div class="col-sm-4">
												<div class="product-meta-info">
													<div class="prod-ratings">
														<div class="row">
															<div class="col-sm-6"><strong>Overall</strong></div>
															<div class="col-sm-6">
															<div class="rating-star">
																@for ($i = 0; $i < 5; $i++)
																	@if ($i < $item->rate)
																		<i class="fas fa-star" style="color: #db4437;"></i>
																	@else
																		<i class="far fa-star"></i>
																	@endif
																@endfor
															</div><!-- /rating-star -->
															</div>
														</div>
														<div class="row">
															<div class="col-sm-6">Quality</div>
															<div class="col-sm-6">
																<div class="progress">
																	<div class="progress-bar" style="width: {{ $item->quality }}%;"></div>
																</div><!-- /progress -->
															</div>
														</div>
													</div><!-- /prod-ratings -->
													<ul class="prod-meta">
														<li>
															<span class="text-primary">Reviewer:</span>
															{{ $item->customer->name }}
														</li>
														<li>
															<span class="text-primary">Location:</span>
															{{ $item->customer->location }}
														</li>
														<li>
															<span class="text-primary">Date:</span>
															{{ $item->created_at }}
														</li>
													</ul>
												</div><!-- /produt-meta-info -->
											</div>
											<div class="col-sm-8">
												<div class="text">
													{!! $item->description !!}
													<div class="review-remark" style="margin-top: 40px;">
														<div class="like-icon">
															<span class="icon-like" data-id="{{ $item->id }}" data-like="{{ $item->like }}" style="{{ \Auth::guard('customer')->check() && $item->customer_id == \Auth::guard('customer')->user()->id && $item->choose  ? 'color: rgb(219, 68, 55);' : null }}">
																<i class="fas fa-thumbs-up" style="margin-right: 5px; cursor: pointer;"></i>
															</span>
															<span>{{ $item->like ? $item->like : 'Hữu ích?'}}</span>
														</div>
													</div>
												</div><!-- /text -->
											</div>
										</div>
									</div><!-- /prod-review-box -->
								</li>
							@endforeach
						</ul><!-- /review-listing -->
					@else
						Chưa Có Đánh Giá
					@endif
				</div><!-- /product-review-container -->

				{{-- <div class="product-review-edit-container">
					<form class="prod-review-form" method="post" action="#">
						<ul class="prod-review-edit-list">
							<li>
								<label class="form-label">Overall Rating*:</label>
								<div class="rating-star">
								  <i class="flaticon-favourites7 selected"></i>
								  <i class="flaticon-favourites7 selected"></i>
								  <i class="flaticon-favourites7 selected"></i>
								  <i class="flaticon-favourites7 selected"></i>
								  <i class="flaticon-favourites7"></i>
								</div><!-- /rating-star -->
								<span class="form-span">Average</span>
							</li>
							<li>
								<div class="row">
									<label class="col-sm-2">Value for Money*:</label>
									<div class="col-sm-10">
										<span class="form-span">Poor</span>
										<div class="progress">
											<div class="progress-bar" style="width: 90%;"></div>
										</div><!-- /progress -->
										<span class="form-span">Excellent</span>
										<span class="form-span text-primary">Great</span>
				           			</div>
		            			</div>
							</li>
							<li>
								<div class="row">
									<label class="col-sm-2">Quality*:</label>
									<div class="col-sm-10">
										<span class="form-span">Poor</span>
										<div class="progress">
				            	<div class="progress-bar" style="width: 60%;"></div>
				            </div><!-- /progress -->
				            <span class="form-span">Excellent</span>
				            <span class="form-span text-primary">Good</span>
									</div>
								</div>
							</li>
							<li>
							  <label class="form-label">Would you recommend this product?</label>
							  <label class="radio-inline">
							    <input type="radio" value="By Email" name="preferred-contact"> By Email
							  </label>
							  <label class="radio-inline">
							    <input type="radio" value="By Phone" name="preferred-contact"> By Phone
							  </label>
							</li>
						</ul>

						<div class="form-group row">
							<label class="col-md-2 label-md">Review Title:*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="Review Title">
								<p class="help-block">E.g. Wonderful Fragrance!</p>
							</div>
	          			</div>
						<div class="form-group row">
							<label class="col-md-2 label-md">Your Review:*</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="Review Title">
								<p class="help-block">
									Please enter at least 50 characters.
									<span data-placement="top" data-toggle="popover" data-trigger="focus" tabindex="0" data-content="here is your help information"><i class="flaticon-information51"></i> <span>Need some tips?</span></span>
								</p>
							</div>
	          			</div>
						<div class="form-group row">
							<label class="col-md-2 label-md">Username:*</label>
							<div class="col-md-6">
							<input type="text" class="form-control" placeholder="Username">
							<p class="help-block">E.g. Tom84. For privacy reasons, don’t use your full name or email address. Once entered, this can’t be edited.</p>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 label-md">Location:</label>
							<div class="col-md-6">
							<input type="text" class="form-control" placeholder="Location">
							<p class="help-block">E.g. Nottingham, UK</p>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-2 label-md">Age:</label>
							<div class="col-md-2">
								<select class="form-control">
												<option value="0">- age -</option>
												<option value="one">option one</option>
												<option value="two">option two</option>
												<option value="three">option three</option>
								</select>
							</div>
	          			</div>
						<div class="row">
							<div class="col-sm-6 col-sm-push-2">
								<div class="checkbox">
									<label><input type="checkbox" checked="checked">Please send me an email when my review has been published.</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox">Please send me an email when someone comments on my review.</label>
								</div>
								<div class="checkbox">
									<label><input type="checkbox">Publish this review to Facebook</label>
								</div>
							</div>
	          			</div>
	          			<hr>
						<div class="checkbox">
							<label><input type="checkbox">I have read the terms & conditions and agree to them.</label>
						</div>
					</form>
				</div><!-- /product-review-edit-container --> --}}

				{{-- <div class="row cart-actions">
					<div class="col-sm-6">
						<a class="btn btn-grey" href="#"><i class="flaticon-arrowhead7"></i> Cancel</a>
					</div>
					<div class="col-sm-6">
						<a class="btn btn-default" href="#">preview your review</a>
					</div>
				</div> --}}
			
			</div><!-- /single-container -->
        </div>
    </section>
@endsection

@section('custom-js')
    <script>
		var color = null;
		var volume = null;
		// var quantity = null;
		
		$('#selling_price, #quantity').mask('#.##0', { reverse: true });
		$('#up').on('click', function(){
			if($('#quantity').val() < {!! $product->quantity !!}) {
				$('#quantity').val(function(i, val) { return +val+1 })
			}
		});
		$('#down').on('click', function(){
			if($('#quantity').val() > 1) {
				$('#quantity').val(function(i, val) { return +val-1 })
			}
		});
		$('.mark-price').mask('#.##0', { reverse: true }).append(' đ');

		$('.like-icon .icon-like').on('click', function(){
			var user = "{{ \Auth::guard('customer')->check() }}"
			var idComment = $(this).data('id')
			var numLike = $(this).data('like')
			var increase = null

			if(user == '') {
				// window.location.href = "{{ route('client.loginView') }}"
			}
			else {
				if($(this).css('color') == 'rgb(219, 68, 55)') {
					$(this).removeAttr("style")
					var currentNumLike = $(this).next('span').text() - 1
					text = currentNumLike != 0 ? currentNumLike : 'Hữu ích?';
					increase = 0;
				}
				else {
					text = numLike ? numLike+1 : 1;
					$(this).css('color', 'rgb(219, 68, 55)')
					increase = 1;
				}
				
				$(this).next('span').text(text)

				$.ajax({
					url : "{{ route('client.comments.update') }}",
					method: 'POST',
					data: {
						_token: "{{ csrf_token() }}",
						id: idComment,
						increase: increase,
						choose: increase
					}
				}).done(function(data){
					// location.reload();
					console.log(data)
				});
			}
		});
		$('.btn-color').on('click', function() {
			$('.btn-color').each(function(){
				$(this).css('border-color', 'unset')
			});
			if($(this).css('border-color') != 'rgb(0, 0, 255)') {
				$(this).css('border-color', 'rgb(0, 0, 255)')
				color = $(this).data('id');
			}
			else color = null;
		});
		$('.btn-volume').on('click', function() {
			$('.btn-volume').each(function(){
				$(this).css('border-color', 'unset')
			});
			if($(this).css('border-color') != 'rgb(0, 0, 255)') {
				$(this).css('border-color', 'rgb(0, 0, 255)')
				volume = $(this).data('id');
			}
			else volume = null;
		});
		$('#add-cart').on('click', function() {
			if({!! !$color->isEmpty() ? 'true' : 'false' !!} && color == null) {
				console.log(1)
				$.notify({ message: 'Vui lòng chọn phân loại hàng' },{ type: 'warning' });
				return;
			}

			if({!! !$volume->isEmpty() ? 'true' : 'false' !!} && volume == null) {
				console.log(2)
				$.notify({ message: 'Vui lòng chọn phân loại hàng' },{ type: 'warning' });
				return;
			}

			if('{{ !\Auth::guard("customer")->check() }}') {
				location.href = "{{ route('client.loginView') }}"
			}
			
			var arrValue = [];
			if(color) arrValue.push(color);
			if(volume) arrValue.push(volume);
			console.log(arrValue)
			$.ajax({
				url : "{{ route('client.ajaxAddToCart') }}",
				method: 'POST',
				data: {
					product_id: '{{ $product->id }}',
					value: arrValue.toString(),
					quantity: $('#quantity').val()
				}
			}).done(function(data){
				$.notify({
					// options
					message: data.msg
				});
				
				// location.reload();
				console.log(data)
			});

			loadCart()
		});

		$('#buy-it').on('click', function() {
			console.log('asd')
		});

		
    </script>
@endsection