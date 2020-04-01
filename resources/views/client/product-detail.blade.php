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
				        <figure class="image">
				          <img src="{{ Storage::disk('dropbox')->exists($product->avatar) ? Storage::disk('dropbox')->url($product->avatar) : 'admin/img/no-image.jpg' }}" alt="image">
				          <figcaption>
				            <a href="#product-more" data-toggle="collapse">More pictures and videos  <i class="flaticon-small63"></i></a>
				          </figcaption>
				        </figure>
				      </div>
				      <div class="col-sm-7">
				        <div class="text">
				          <p>Brand: <a href="{{ route('client.products.search', ['category' => $product->supplier->id, 'text_category' => $suppliers->name, 'count_category' => $suppliers->products->count()]) }}" class="text-primary">{{ $product->supplier->name }}</a></p>
				          <h4>{{ $product->name }}</h4>
				          <p><a href="#" class="read-more text-primary">More Information</a></p>
				          <p>
				          	<a href="#info-1" data-toggle="collapse">When do I receive my items, if I order now? <i class="flaticon-small63"></i></a>
				          </p>
				          <div id="info-1" class="collapse in">
				            <p>Thursday 1/8/2015</p>
				            <p>The times are just approximate, estimated according to the previous delivery times of shipping companies.</p>
				            <a href="#" class="btn btn-default">Add to Cart</a>
				          </div>
				        </div>
				      </div>
				    </div>
				  </div><!-- /featured-box -->
				  <div id="product-more" class="product-more collapse in">
				    <div class="cart-table table-responsive">
				      <table class="table">
				        <tbody>
				          <tr>
				            <td>
				              <div class="prod-list-thumb media">
				                <figure class="media-left"><img src="images\resource\img-15.jpeg" alt="image"></figure>
				                <div class="media-body">
				                  <h4 class="text-primary"><a href="#">Eau de parfum for men 3.4 oz</a></h4>
				                  <p class="code">Code:CAK0084</p>
				                  <p>More than 20 pcs in our stock & Ready to Ship!</p>
				                </div>
				              </div>
				            </td>
				            <td><div class="prod-price">$44.50</div></td>
				            <td><div class="prod-qty"><input type="text">pcs</div></td>
				            <td><div class="prod-price"><strong>$44.50</strong></div></td>
				            <td><a href="#" class="btn btn-default btn-sm">Add to cart</a></td>
				          </tr>
				          <tr>
				            <td>
				              <div class="prod-list-thumb media">
				                <figure class="media-left"><img src="images\resource\img-15.jpeg" alt="image"></figure>
				                <div class="media-body">
				                  <h4 class="text-primary"><a href="#">Eau de parfum for men 1.7 oz</a></h4>
				                  <p class="code">Code:CAK0086</p>
				                  <p>More than 20 pcs in our stock & Ready to Ship!</p>
				                </div>
				              </div>
				            </td>
				            <td><div class="prod-price">$44.50</div></td>
				            <td><div class="prod-qty"><input type="text">pcs</div></td>
				            <td><div class="prod-price"><strong>$31.60</strong></div></td>
				            <td><a href="#" class="btn btn-default btn-sm">Add to cart</a></td>
				          </tr>
				          <tr>
				            <td>
				              <div class="prod-list-thumb media">
				                <figure class="media-left"><img src="images\resource\img-15.jpeg" alt="image"></figure>
				                <div class="media-body">
				                  <h4 class="text-primary"><a href="#">Eau de parfum for men 1 oz</a></h4>
				                  <p class="code">Code:CAK0087</p>
				                  <p>More than 5 pcs in our stock & Ready to Ship!</p>
				                </div>
				              </div>
				            </td>
				            <td><div class="prod-price">$44.50</div></td>
				            <td><div class="prod-qty"><input type="text">pcs</div></td>
				            <td><div class="prod-price"><strong>$26.21</strong></div></td>
				            <td><a href="#" class="btn btn-default btn-sm">Add to cart</a></td>
				          </tr>
				        </tbody>
				      </table>
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
		        <div class="item">
		          <div class="thumbnail thumbnail-product">
		            <figure class="image-zoom">
		              <img alt="image" src="images\resource\img-18.jpeg">
		            </figure>
		            <div class="caption text-center">
		              <h5><a href="#">Euphoria body milk for women</a></h5>
		              <div class="rating-star">
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7"></i>
		                <i class="flaticon-favourites7"></i>
		              </div><!-- /rating-star -->
		              <p class="prod-price text-primary">from $25.00</p>
		            </div>
		          </div><!-- /thumbail -->
		        </div>
		        <div class="item">
		          <div class="thumbnail thumbnail-product">
		            <figure class="image-zoom">
		              <img alt="image" src="images\resource\img-19.jpeg">
		            </figure>
		            <div class="caption text-center">
		              <h5><a href="#">Euphoria eau de toilette for women</a></h5>
		              <div class="rating-star">
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7"></i>
		              </div><!-- /rating-star -->
		              <p class="prod-price text-primary">from $32.45</p>
		            </div>
		          </div><!-- /thumbail -->
		        </div>

		        <div class="item">
		          <div class="thumbnail thumbnail-product">
		            <figure class="image-zoom">
		              <img alt="image" src="images\resource\img-18.jpeg">
		            </figure>
		            <div class="caption text-center">
		              <h5><a href="#">Euphoria body milk for women</a></h5>
		              <div class="rating-star">
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7"></i>
		                <i class="flaticon-favourites7"></i>
		              </div><!-- /rating-star -->
		              <p class="prod-price text-primary">from $25.00</p>
		            </div>
		          </div><!-- /thumbail -->
		        </div>
		        <div class="item">
		          <div class="thumbnail thumbnail-product">
		            <figure class="image-zoom">
		              <img alt="image" src="images\resource\img-19.jpeg">
		            </figure>
		            <div class="caption text-center">
		              <h5><a href="#">Euphoria eau de toilette for women</a></h5>
		              <div class="rating-star">
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7"></i>
		              </div><!-- /rating-star -->
		              <p class="prod-price text-primary">from $32.45</p>
		            </div>
		          </div><!-- /thumbail -->
		        </div>
		        <div class="item">
		          <div class="thumbnail thumbnail-product">
		            <figure class="image-zoom">
		              <img alt="image" src="images\resource\img-18.jpeg">
		            </figure>
		            <div class="caption text-center">
		              <h5><a href="#">Euphoria body milk for women</a></h5>
		              <div class="rating-star">
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7"></i>
		                <i class="flaticon-favourites7"></i>
		              </div><!-- /rating-star -->
		              <p class="prod-price text-primary">from $25.00</p>
		            </div>
		          </div><!-- /thumbail -->
		        </div>
		        <div class="item">
		          <div class="thumbnail thumbnail-product">
		            <figure class="image-zoom">
		              <img alt="image" src="images\resource\img-19.jpeg">
		            </figure>
		            <div class="caption text-center">
		              <h5><a href="#">Euphoria eau de toilette for women</a></h5>
		              <div class="rating-star">
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7 selected"></i>
		                <i class="flaticon-favourites7"></i>
		              </div><!-- /rating-star -->
		              <p class="prod-price text-primary">from $32.45</p>
		            </div>
		          </div><!-- /thumbail -->
		        </div>

		      </div>
				</div><!-- /other-products -->
				
				<div class="product-description">
					<div class="row">
						<div class="col-sm-6">
							<div class="prod-desc-box">
								<h4>Description of perfume Calvin Klein Euphoria</h4>
								<p>Sensual. Mysteriously glamourous. Illuminous. Experience the mystery of euphoria with a luminescent, more delicate and sensual interpretation of the original fragrance. It is inspired by a new found freedom, about living one's dream.</p>
							</div>
						</div>
						<div class="col-sm-6">
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
						</div>
					</div>
				</div><!-- /product-description -->

				<div class="pic-vid-box">
					<div class="row">
						<div class="col-sm-5">
							<figure class="image"><img src="images\resource\img-21.jpeg" alt="image"></figure>
						</div>
						<div class="col-sm-7">
							<div class="video-box">
								<img src="images\resource\img-22.jpeg" alt="image">
							</div>
						</div>
					</div>
				</div><!-- /pic-vid-box -->

				<div class="product-review-container">
					<header class="heading">
					  <h4>Product Reviews</h4>
					</header>
					<div class="review-masthead">
		        <div class="rating-star">
		          <i class="flaticon-favourites7 selected"></i>
		          <i class="flaticon-favourites7 selected"></i>
		          <i class="flaticon-favourites7 selected"></i>
		          <i class="flaticon-favourites7 selected"></i>
		          <i class="flaticon-favourites7"></i>
		        </div><!-- /rating-star -->
						<span class="text-primary">4.87</span>
						<span>(3 Customer Reviews)</span>
					</div><!-- /review-masthead -->
					<div class="head-info">
						<p>Displaying reviews 1 - 10</p>
						<div class="pagination-box">
							<span>Pages:</span>
							<ul class="pagination">
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
							</ul>
						</div><!-- /pagination-box -->
					</div><!-- /head-info -->

					<ul class="review-listing">
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
							                <i class="flaticon-favourites7 selected"></i>
							                <i class="flaticon-favourites7 selected"></i>
							                <i class="flaticon-favourites7 selected"></i>
							                <i class="flaticon-favourites7 selected"></i>
							                <i class="flaticon-favourites7"></i>
							              </div><!-- /rating-star -->
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">Quality</div>
													<div class="col-sm-6">
							              <div class="progress">
							              	<div class="progress-bar" style="width: 90%;"></div>
							              </div><!-- /progress -->
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">Value for money</div>
													<div class="col-sm-6">
							              <div class="progress">
							              	<div class="progress-bar" style="width: 100%;"></div>
							              </div><!-- /progress -->
													</div>
												</div>
											</div><!-- /prod-ratings -->
											<ul class="prod-meta">
												<li>
													<span class="text-primary">Reviewer:</span>
													Monica Johnson
												</li>
												<li>
													<span class="text-primary">Location:</span>
													California
												</li>
												<li>
													<span class="text-primary">Date:</span>
													March 5, 2015
												</li>
											</ul>
										</div><!-- /produt-meta-info -->
									</div>
									<div class="col-sm-8">
										<div class="text">
											<h4><a href="#">Great value, very beautiful scent!</a></h4>
											<ul class="prod-meta">
												<li>
													<strong>Pros:</strong>
													clean & fresh, draws compliments, great smell, great value, not overpowering, long-lasting
												</li>
												<li>
													<strong>Cons:</strong>
													pricey/poor value
												</li>
												<li>
													<strong>Best Uses:</strong>
													daily use
												</li>
											</ul><!-- /prod-meta -->
											<p>I had heard about this fragrance from a few friends who like it. So I tried it. It is so nice that I wear it everyday</p>
											<div class="review-remark">
												<span>Was this review helpful?</span>
												<label class="radio-inline">
												  <input type="radio" value="yes" name="review-helpful"> Yes
												</label>
												<label class="radio-inline">
												  <input type="radio" value="no" name="review-helpful"> Now
												</label>
											</div>
										</div><!-- /text -->
									</div>
								</div>
							</div><!-- /prod-review-box -->
						</li>
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
							                <i class="flaticon-favourites7 selected"></i>
							                <i class="flaticon-favourites7 selected"></i>
							                <i class="flaticon-favourites7 selected"></i>
							                <i class="flaticon-favourites7"></i>
							                <i class="flaticon-favourites7"></i>
							              </div><!-- /rating-star -->
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">Quality</div>
													<div class="col-sm-6">
							              <div class="progress">
							              	<div class="progress-bar" style="width: 75%;"></div>
							              </div><!-- /progress -->
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">Value for money</div>
													<div class="col-sm-6">
							              <div class="progress">
							              	<div class="progress-bar" style="width: 90%;"></div>
							              </div><!-- /progress -->
													</div>
												</div>
											</div><!-- /prod-ratings -->
											<ul class="prod-meta">
												<li>
													<span class="text-primary">Reviewer:</span>
													Meredith James
												</li>
												<li>
													<span class="text-primary">Location:</span>
													New York
												</li>
												<li>
													<span class="text-primary">Date:</span>
													March 1, 2015
												</li>
											</ul>
										</div><!-- /produt-meta-info -->
									</div>
									<div class="col-sm-8">
										<div class="text">
											<h4><a href="#">My Go To Site for my Perfume</a></h4>
											<ul class="prod-meta">
												<li>
													<strong>Pros:</strong>
													draws compliments, great smell, great value, not overpowering, long-lasting
												</li>
												<li>
													<strong>Cons:</strong>
													overpowering
												</li>
												<li>
													<strong>Best Uses:</strong>
													anytime, signature fragrance
												</li>
											</ul><!-- /prod-meta -->
											<p>A dear friend wears this and I was asking her, "What are you wearing? It smells great!" She told me, Burberry Brit, and the name of the department store she bought it at. Of course, armed with this info, I went to the mall in search of this. After wear ing a few weeks, another friend wanted to know what fragrance I was wearing because, she too, loved the scent. She had a birthday coming up and to surprise her, I bought her the Burberry Brit, she was thrilled. It has been her signature scent for the past 4 or 5 yrs now. After discovering your site and making my own first purchase of Burberry Brit and being impressed.</p>
											<div class="review-remark">
												<span>Was this review helpful?</span>
												<label class="radio-inline">
												  <input type="radio" value="yes" name="review-helpful"> Yes
												</label>
												<label class="radio-inline">
												  <input type="radio" value="no" name="review-helpful"> Now
												</label>
											</div>
										</div><!-- /text -->
									</div>
								</div>
							</div><!-- /prod-review-box -->
						</li>
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
							                <i class="flaticon-favourites7 selected"></i>
							                <i class="flaticon-favourites7 selected"></i>
							                <i class="flaticon-favourites7 selected"></i>
							                <i class="flaticon-favourites7 selected"></i>
							                <i class="flaticon-favourites7 selected"></i>
							              </div><!-- /rating-star -->
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">Quality</div>
													<div class="col-sm-6">
							              <div class="progress">
							              	<div class="progress-bar" style="width: 100%;"></div>
							              </div><!-- /progress -->
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">Value for money</div>
													<div class="col-sm-6">
							              <div class="progress">
							              	<div class="progress-bar" style="width: 95%;"></div>
							              </div><!-- /progress -->
													</div>
												</div>
											</div><!-- /prod-ratings -->
											<ul class="prod-meta">
												<li>
													<span class="text-primary">Reviewer:</span>
													Derick Dons
												</li>
												<li>
													<span class="text-primary">Location:</span>
													New Jersey
												</li>
												<li>
													<span class="text-primary">Date:</span>
													March 5, 2015
												</li>
											</ul>
										</div><!-- /produt-meta-info -->
									</div>
									<div class="col-sm-8">
										<div class="text">
											<h4><a href="#">It's the One</a></h4>
											<ul class="prod-meta">
												<li>
													<strong>Pros:</strong>
													clean & fresh, draws compliments, great smell, great value, not overpowering, long-lasting
												</li>
												<li>
													<strong>Cons:</strong>
													expensive
												</li>
												<li>
													<strong>Best Uses:</strong>
													special occasions
												</li>
											</ul><!-- /prod-meta -->
											<p>Will definatly be purchasing again once this one is gone.</p>
											<div class="review-remark">
												<span>Was this review helpful?</span>
												<label class="radio-inline">
												  <input type="radio" value="yes" name="review-helpful"> Yes
												</label>
												<label class="radio-inline">
												  <input type="radio" value="no" name="review-helpful"> Now
												</label>
											</div>
										</div><!-- /text -->
									</div>
								</div>
							</div><!-- /prod-review-box -->
						</li>
					</ul><!-- /review-listing -->
				</div><!-- /product-review-container -->

				<div class="product-review-edit-container">
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
				</div><!-- /product-review-edit-container -->

				<div class="row cart-actions">
				  <div class="col-sm-6">
				    <a class="btn btn-grey" href="#"><i class="flaticon-arrowhead7"></i> Cancel</a>
				  </div>
				  <div class="col-sm-6">
				    <a class="btn btn-default" href="#">preview your review</a>
				  </div>
				</div>
			
			</div><!-- /single-container -->
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
							<li><a href="#"><img src="images\logo-visa.png" alt=""></a></li>
							<li><a href="#"><img src="images\logo-americanexpress.png" alt=""></a></li>
							<li><a href="#"><img src="images\logo-mastercard.png" alt=""></a></li>
							<li><a href="#"><img src="images\logo-amazon.png" alt=""></a></li>
							<li><a href="#"><img src="images\logo-paypal.png" alt=""></a></li>
						</ul>
					</div>					
				</div>

			</div>
		</div>
	</section>
@endsection

@section('custom-js')
    <script>
        
    </script>
@endsection