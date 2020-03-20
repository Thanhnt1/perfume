@extends('client.layouts.app')
@section('title', 'Product')
@section('content')
<div class="section-banner">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Fragrances</a></li>
            <li class="dropdown active breadcrumb-search">
                <a href="#" id="one" data-toggle="dropdown">Men's Perfumes <i class="caret"></i></a>
                <ul class="dropdown-menu" aria-labelledby="one">
                    <li><a href="#">Men's Perfumes</a></li>
                    <li><a href="#">Women's Perfumes</a></li>
                </ul>
            </li>
            <li>
                <div class="bar-form">
                    <form method="post" action="#">
                        <input type="search" placeholder="Search within Men's Perfumes">
                        <input type="submit">
                    </form>
                </div><!-- /bar-form -->
            </li>
        </ul>
    </div>
</div><!-- /section-banner -->

<section class="section-compact">
    <div class="container">
        <header class="heading-3 page-heading">
            <h4> MEN'S PERFUMES <small>(4357)</small></h4>
        </header>
        
        <div class="row">
            <div class="col-md-3">
                <div class="widget widget-prod-categrories">
                    <header class="widget-heading-3">
                        <h4>
                            <span class="caret"></span>
                            By Fragrance
                            <em>{{ $products->count() }}</em>
                        </h4>
                    </header>
                    <ul class="list-align">
                        @foreach ($categories as $item)
                            <li><a href="#">{{ $item->name }} <span class="right">{{ $item->products->count() }}</span></a></li>
                        @endforeach
                    </ul>
                    {{-- <div class="widget-bottom">
                        <strong class="refine-filters">Refine</strong>
                        <span class="clear-filters"><i class="flaticon-close9"></i>Clear all filters</span>
                    </div> --}}
                </div><!-- /widget-prod-categrories -->

                <div class="widget widget-prod-filter">
                    <header class="widget-heading-3">
                        <h4>
                            <span class="caret"></span>
                            By Brand
                            <span class="clear-filters"><i class="flaticon-close9"></i>Clear</span>
                        </h4>
                    </header>
                    <div class="filter-bar">
                        <input type="search" class="form-control" name="SearchProdList" placeholder="Search by Brand">
                    </div><!-- /filter-bar -->
                    <ul class="brands-filter-brands">
                        @foreach ($suppliers as $item)
                            <li>
                                <div class="checkbox"><label><input type="checkbox">{{ $item->name }}</label> <span class="right">{{ $item->products->count() }}</span></div>
                            </li>
                        @endforeach
                    </ul>
                </div><!-- /widget-prod-filter -->

                <div class="widget widget-prod-filter-price">
                    <header class="widget-heading-3">
                        <h4>
                            <span class="caret"></span>
                            Price
                            <span class="clear-filters"><i class="flaticon-close9"></i>Clear</span>
                        </h4>
                    </header>

        <div class="slider-contain">
          <div class="slider-element"></div>
          <div class="slide-values">
            <span class="slide-min"></span>
            <span class="slide-max"></span>
          </div>
        </div><!-- /slider-contain -->

                </div><!-- /widget-prod-filter-price -->

                {{-- <div class="widget widget-prod-filter">
                    <header class="widget-heading-3">
                        <h4>
                            <span class="caret"></span>
                            Discount %
                            <span class="clear-filters"><i class="flaticon-close9"></i>Clear</span>
                        </h4>
                    </header>
                    <ul class="brands-filter-brands">
                        <li>
                            <div class="checkbox"><label><input type="checkbox">0-10</label> <span class="right">1390</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">10-20</label> <span class="right">789</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">20-30</label> <span class="right">345</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">30-40</label> <span class="right">165</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">40-50</label> <span class="right">78</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">50-60</label> <span class="right">45</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">60-70</label> <span class="right">23</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">80-90</label> <span class="right">16</span></div>
                        </li>

                        <li>
                            <div class="checkbox"><label><input type="checkbox">0-10</label> <span class="right">1390</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">10-20</label> <span class="right">789</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">20-30</label> <span class="right">345</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">30-40</label> <span class="right">165</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">40-50</label> <span class="right">78</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">50-60</label> <span class="right">45</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">60-70</label> <span class="right">23</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">80-90</label> <span class="right">16</span></div>
                        </li>
                    </ul>
                </div> --}}

                {{-- <div class="widget widget-prod-filter">
                    <header class="widget-heading-3">
                        <h4>
                            <span class="caret"></span>
                            Perfume Notes
                            <span class="clear-filters"><i class="flaticon-close9"></i>Clear</span>
                        </h4>
                    </header>
                    <ul class="brands-filter-brands">
                        <li>
                            <div class="checkbox"><label><input type="checkbox">Exotic</label> <span class="right">231</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">Floral</label> <span class="right">35</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">Oriental</label> <span class="right">67</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">Woody</label> <span class="right">123</span></div>
                        </li>

                    </ul>
                </div> --}}

                {{-- <div class="widget widget-prod-filter">
                    <header class="widget-heading-3">
                        <h4>
                            <span class="caret"></span>
                            Store
                            <span class="clear-filters"><i class="flaticon-close9"></i>Clear</span>
                        </h4>
                    </header>
                    <ul class="brands-filter-brands">
                        <li>
                            <div class="checkbox"><label><input type="checkbox">Bachelorettes</label> <span class="right">7</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">Friends &amp; Relatives</label> <span class="right">2034</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">Wedding</label> <span class="right">452</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">Reception</label> <span class="right">123</span></div>
                        </li>

                    </ul>
                </div> --}}

                {{-- <div class="widget widget-prod-filter">
                    <header class="widget-heading-3">
                        <h4>
                            <span class="caret"></span>
                            Top Seller
                            <span class="clear-filters"><i class="flaticon-close9"></i>Clear</span>
                        </h4>
                    </header>
                    <ul class="brands-filter-brands">
                        <li>
                            <div class="checkbox"><label><input type="checkbox">Brand</label> <span class="right">67</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">Top 20</label> <span class="right">15</span></div>
                        </li>
                        <li>
                            <div class="checkbox"><label><input type="checkbox">Top 50</label> <span class="right">45</span></div>
                        </li>

                    </ul>
                </div> --}}


            </div>
            <div class="col-md-9">
                
                <div class="filter-head">
                    <strong>Sort By</strong>
                    <ul class="filter-tabs">
                        <li class="filter active" data-role="button" data-filter="popularity">Popularity</li>
                        <li class="filter" data-role="button" data-filter="bestsellers">Bestsellers</li>
                        <li class="filter" data-role="button" data-filter="pricefresh">Pricefresh</li>
                        <li class="filter" data-role="button" data-filter="arrivals">Arrivals</li>
                        <li class="filter" data-role="button" data-filter="rating">Customer Rating</li>
                        <li class="layout-list" data-role="button"><i class="flaticon-menu10"></i></li>
                        <li class="layout-grid active" data-role="button"><i class="flaticon-nine15"></i></li>
                    </ul>
                </div><!-- /filter-head -->
                {{-- sortby: bestsellers, pricefresh, arrivals, rating, popularity --}}
                <ul class="filter-list">
                    @foreach ($productList as $item)
                        <li class="mix">
                            <div class="thumbnail thumbnail-product">
                                <figure class="image-zoom" style="height: 200px;">
                                    <img src="{{ $item->avatar && Storage::disk('dropbox')->exists($item->avatar) ? Storage::disk('dropbox')->url($item->avatar) : '/admin/img/no-image.jpg' }}" alt="image" style="width: 100%;height: auto;margin-top: 25%;">
                                </figure>
                                <div class="caption">
                                    <div class="text-wrap">
                                        <h5><a href="#">{{ $item->name }}</a></h5>
                                        <div class="rating-star">
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="flaticon-favourites7 {{ $item->rate > $i ? 'selected' : null }}"></i>
                                            @endfor
                                        </div><!-- /rating-star -->
                                        <div class="prod-price text-primary">
                                            @if ($item->import_price)
                                                <span class="mark-price text-muted" style="text-decoration-line: line-through;">{{ $item->import_price }}</span> - 
                                            @endif
                                            <span class="mark-price">{{ $item->selling_price }}</span>
                                        </div>
                                        <div class="filter-list-disp">
                                            <p class="dispatch-info"><i class="flaticon-shipping"></i> Dispatched in 2 business days</p>
                                            <a href="#" class="btn btn-default view-detail">View Details</a>
                                        </div>
                                    </div><!-- /text-wrap -->
                                    <div class="list-wrap">
                                        <h5>Highlights:</h5>
                                        <ul class="list-6">
                                            <li>100% Genuine Product</li>
                                            <li>Brand: Guess</li>
                                            <li>Size: 30 ml - 200 ml</li>
                                            <li>Gender: Women</li>
                                            <li>Type: EDT</li>
                                            <li>Fragrance Notes: Orchid</li>
                                        </ul>
                                        <a href="#" class="btn btn-default view-detail">View Details</a>
                                    </div><!-- /list-wrap -->
                                </div>
                            </div><!-- /thumbail -->
                        </li>
                    @endforeach
                </ul><!-- filter-list -->
                
                <div class="pagination-right">
                    <ul class="pagination pagination-lg">
                        <li class="prev disabled"><a href="{{ $arrProduct['prev_page_url'] }}"><i class="flaticon-arrowhead7"></i></a></li>
                        @for ($i = 1; $i <= $arrProduct['last_page']; $i++)
                            <li class="{{ $arrProduct['current_page'] == $i ? 'active' : null }}"><a href="">{{$i}}</a></li>
                        @endfor
                        <li class="next disabled"><a href="{{ $arrProduct['next_page_url'] }}"><i class="flaticon-arrow487"></i></a></li>
                    </ul>
                </div><!-- /pagination-right -->

            </div>
        </div>
    </div>
</section>

<div class="section-focus bg-dark">
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
</div>


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
        $('.mark-price').mask('#.##0', { reverse: true });
        $('.mark-price').append(' đ');
    </script>
@endsection