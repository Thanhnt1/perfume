@extends('client.layouts.app')
@section('title', 'Product')
@section('content')
    @if (request()->search)
        <div class="section-banner">
            <div class="container">
                <span>Kết quả tìm kiếm cho từ khoá '{{ request()->search }}'</span>
            </div>
        </div><!-- /section-banner -->
    @endif
    <section class="section-compact">
        <div class="container">
            @if (request()->category)
                <header class="heading-3 page-heading">
                    <h4> {{ request()->text_category }} <small>({{ request()->count_category }})</small></h4>
                </header>
            @endif
            
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
                                <li><a href="{{ route('client.products.search', ['category' => $item->id, 'text_category' => $item->name, 'count_category' => $item->products->count() ]) }}">{{ $item->name }} <span class="right">{{ $item->products->count() }}</span></a></li>
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
                                <span class="clear-filters clear-brand"><i class="flaticon-close9"></i>Clear</span>
                            </h4>
                        </header>
                        {{-- <div class="filter-bar">
                            <input type="search" class="form-control" name="SearchProdList" placeholder="Search by Brand">
                        </div><!-- /filter-bar --> --}}
                        <ul class="brands-filter-brands">
                            @foreach ($suppliers as $item)
                                <li>
                                    <div class="checkbox">
                                        <label><input type="checkbox" class="check-box-brand" name="brand[]" {{ request()->brand && in_array($item->id, request()->brand) ? 'checked' : null }} value="{{ $item->id }}">{{ $item->name }}</label> 
                                        <span class="right">{{ $item->products->count() }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div><!-- /widget-prod-filter -->

                    {{-- <div class="widget widget-prod-filter-price">
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

                    </div><!-- /widget-prod-filter-price --> --}}

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
                            {{-- remove class filter in li --}}
                            <li class="sortBy {{ request()->sort_by == "concern" || !request()->sort_by ? 'active' : null }}" data-role="button" data-filter="concern">Concern</li>
                            <li class="sortBy {{ request()->sort_by == "bestseller" ? 'active' : null }}" data-role="button" data-filter="bestseller">Bestseller</li>
                            <li class="sortBy {{ request()->sort_by == "pricehighest" ? 'active' : null }}" data-role="button" data-filter="pricehighest">Highest Price</li>
                            <li class="sortBy {{ request()->sort_by == "pricelowest" ? 'active' : null }}" data-role="button" data-filter="pricelowest">Price Lowest</li>
                            <li class="sortBy {{ request()->sort_by == "rate" ? 'active' : null }}" data-role="button" data-filter="rate">Rate</li>
                            <li class="layout-list" data-role="button"><i class="flaticon-menu10"></i></li>
                            <li class="layout-grid active" data-role="button"><i class="flaticon-nine15"></i></li>
                        </ul>
                    </div><!-- /filter-head -->
                    {{-- sortby: bestsellers, pricefresh, arrivals, rating, popularity --}}
                    <ul class="filter-list">
                        @if (!empty($productList['data']))
                            @foreach ($productList['data'] as $item)
                                <li class="mix bestsellers">
                                    <div class="thumbnail thumbnail-product">
                                        <figure class="image-zoom" style="height: 200px;">
                                            <img src="{{ $item['avatar'] && Storage::disk('dropbox')->exists($item['avatar']) ? Storage::disk('dropbox')->url($item['avatar']) : '/admin/img/no-image.jpg' }}" alt="image" style="width: 100%;height: auto;margin-top: 25%;">
                                        </figure>
                                        <div class="caption" style="padding: unset;">
                                            <div class="text-wrap">
                                                <h5 class="text-truncate" style="max-width: 200px;"><a href="{{ route('client.products.detail', ['id' => $item['uuid'], 'name' => str_replace(' ', '-', strtolower($item['name']))]) }}">{{ $item['name'] }}</a></h5>
                                                <div class="rating-star">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if ($i < $item['rate'])
                                                            <i class="fas fa-star" style="color: #db4437;"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div><!-- /rating-star -->
                                                <div class="prod-price text-primary">
                                                    @if ($item['import_price'])
                                                        <span class="mark-price text-muted" style="text-decoration-line: line-through;">{{ $item['import_price'] }}</span> <span class="text-muted">-</span> 
                                                    @endif
                                                    <span class="mark-price">{{ $item['selling_price'] }}</span>
                                                    <i class="flaticon-shipping fa-lg" style="color: #4abf9f;"></i>
                                                </div>
                                                <a href="{{ route('client.products.detail', ['id' => $item['uuid'], 'name' => str_replace(' ', '-', strtolower($item['name']))]) }}" class="btn btn-default view-detail">View Details</a>
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
                        @else
                            <p class="text-center"><strong>No products available</strong></p>
                        @endif
                    </ul><!-- filter-list -->
                    
                    <div class="pagination-right">
                        <ul class="pagination pagination-lg">
                            <li class="prev disabled"><a href="{{ $productList['prev_page_url'] }}"><i class="flaticon-arrowhead7"></i></a></li>
                            @for ($i = 1; $i <= $productList['last_page']; $i++)
                                <li class="{{ $productList['current_page'] == $i ? 'active' : null }}"><a href="">{{$i}}</a></li>
                            @endfor
                            <li class="next disabled"><a href="{{ $productList['next_page_url'] }}"><i class="flaticon-arrow487"></i></a></li>
                        </ul>
                    </div><!-- /pagination-right -->

                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')
    <script>
        var category = '{{ request()->category ? request()->category : null }}';
        var search = "/products/search?";
        var sortByParams = '{{ request()->sort_by ? request()->sort_by : null }}';
        var searchByParams = '{{ request()->search ? request()->search : null }}';
        var textCategoryByParams = '{{ request()->text_category ? request()->text_category : 0 }}';
        var countCategoryByParams = '{{ request()->count_category ? request()->count_category : 0 }}';

        $('.mark-price').mask('#.##0', { reverse: true });
        $('.mark-price').append(' đ');
        $('.check-box-brand').on('click', function() {
            var brand = $('input[name="brand[]"]:checked').serialize();
            if(brand != '') {
                brand = '&' + brand;
            }
            
            window.location.href = search + "search=" + searchByParams + "&category=" + category + brand + "&sort_by=" + sortByParams + "&text_category=" + textCategoryByParams + "&count_category=" + countCategoryByParams;
        });
        $('.clear-brand').on('click', function() {
            $('input[name="brand[]"]').prop("checked", false);
            window.location.href = search + "search=" + searchByParams + "&category=" + category + "&sort_by=" + sortByParams + "&text_category=" + textCategoryByParams + "&count_category=" + countCategoryByParams;
        });

        $('.sortBy').on('click', function() {
            var sortby = $(this).data('filter');
            var brand = $('input[name="brand[]"]:checked').serialize();
            if(brand != '') {
                brand = '&' + brand;
            }
            window.location.href = search + "search=" + searchByParams + "&category=" + category + brand + "&sort_by=" + sortby + "&text_category=" + textCategoryByParams + "&count_category=" + countCategoryByParams;
        });
            
    </script>
@endsection