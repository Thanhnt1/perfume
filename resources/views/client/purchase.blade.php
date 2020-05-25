@extends('client.layouts.app')
@section('title', 'My Order')
@section('content')
<section class="section-compact">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <ul class="nav nav-pills nav-stacked">
                    <li role="presentation"><a href="{{ route('client.user.profile') }}">My Account</a></li>
                </ul>
                <ul class="nav nav-pills nav-stacked" style="margin-top: 20px;">
                    <li role="presentation" class="presentation"><a data-toggle="tab" class="btn-toggle" href="#my-order">My Orders</a></li>
                    <li role="presentation" class="presentation"><a data-toggle="tab" class="btn-toggle" href="#my-return">My Returns</a></li>
                    <li role="presentation" class="presentation"><a data-toggle="tab" class="btn-toggle" href="#my-cancel">My Cancellations</a></li>
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="tab-content">
                    <div id="my-order" class="tab-pane fade">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <b>My Order</b>
                                    </div>
                                </div>
                            </div>
                            <div class="table-filter">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="show-entries">
                                            <span>Show</span>
                                            <select class="form-control" id="showOrder">
                                                <option value="5" {{ request()->showOrder == 5 || !request()->showOrder ? 'selected' : null }} >Last 5 orders</option>
                                                <option value="15" {{ request()->showOrder == 15 ? 'selected' : null }}>Last 15 days</option>
                                                <option value="30" {{ request()->showOrder == 30 ? 'selected' : null }}>Last 30 days</option>
                                                <option value="all" {{ request()->showOrder == 'all' ? 'selected' : null }}>All orders</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="list-bill">
                                    @if (!$billProducts->isEmpty())
                                        @foreach ($billProducts as $item)
                                            <div class="row">
                                                <article class="card fl-left">
                                                    <section class="date">
                                                        <time datetime="{{ $item->created_at->format('d') }}th {{ $item->created_at->format('M') }}">
                                                            <span>{{ $item->created_at->format('d') }}</span><span>{{ $item->created_at->format('M') }}</span>
                                                        </time>
                                                    </section>
                                                    <section class="card-cont">
                                                        <small>Order {{ sprintf('#SF%07d', $item->id) }}</small>
                                                        <div class="row">
                                                            <div class="line hidden-xs"></div>
                                                            <div class="col text-center">
                                                                <div class="col-sm-3" >
                                                                    <span class="glyphiconProcess {{ $item->status == 0 ? 'active' : '' }}"><i class="fas fa-clock" style="color: rgb(153, 153, 0);" title="Waitting"></i></i></span>
                                                                    <h5>Waitting Checking</h5>
                                                                </div>
                                                                <div class="col-sm-3" >
                                                                    <span class="glyphiconProcess {{ $item->status == 1 ? 'active' : '' }}"><i class="fas fa-boxes" style="color: rgb(0, 64, 255);"  title="Tranfer to shipping department"></i></i> </span>
                                                                    <h5>Tranfer to shipping department</h5>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <span class="glyphiconProcess {{ $item->status == 2 ? 'active' : '' }}"><i class="fas fa-shipping-fast" style="color: rgb(32, 32, 223);" title="In progress shipping"></i></span>
                                                                    <h5>In progress</h5>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <span class="glyphiconProcess {{ $item->status == 3 ? 'active' : '' }}"><i class="fas fa-check-circle fa-lg" style="color: green;" title="Done"></i></span>
                                                                    <h5>Done</h5>
                                                                </div>
                                                            </div>  
                                                        </div>
                                                        <div class="even-date">
                                                            <i class="fa fa-calendar"></i>
                                                            <span>Date receive: {{  $item->receive_date ? \Carbon\Carbon::parse($item->receive_date)->format('j F, Y') : null }}</span>
                                                        </div>
                                                        <div class="even-info">
                                                            <i class="fa fa-map-marker"></i>
                                                            <span>Shipping Address: {{  $item->recipient_address }}</span>
                                                        </div>
                                                        <div class="even-info">
                                                            <i class="fas fa-user"></i>
                                                            <span>Name receive: {{  $item->recipient_name }} - {{  $item->recipient_phone }}</span>
                                                        </div>
                                                        @if ($item->status == 0)
                                                            <a href="{{ route('client.deleteBill', ['uuid' => $item->uuid]) }}">Remove</a>
                                                        @endif
                                                    </section>
                                                </article>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-center">No order available</p>
                                    @endif
                                </div>
                            </div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                    <div id="my-return" class="tab-pane fade">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <b>My Returns</b>
                                    </div>
                                </div>
                            </div>
                            <div class="table-filter">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="show-entries">
                                            <span>Show</span>
                                            <select class="form-control" id="showReturns">
                                                <option value="5" {{ request()->showReturns == 5 || !request()->showReturns ? 'selected' : null }} >Last 5 orders</option>
                                                <option value="15" {{ request()->showReturns == 15 ? 'selected' : null }}>Last 15 days</option>
                                                <option value="30" {{ request()->showReturns == 30 ? 'selected' : null }}>Last 30 days</option>
                                                <option value="all" {{ request()->showReturns == 'all' ? 'selected' : null }}>All orders</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="list-bill">
                                    @if (!$billProductsReturn->isEmpty())
                                        @foreach ($billProductsReturn as $item)
                                            <div class="row">
                                                <article class="card fl-left">
                                                    <section class="date">
                                                        <time datetime="{{ $item->created_at->format('d') }}th {{ $item->created_at->format('M') }}">
                                                            <span>{{ $item->created_at->format('d') }}</span><span>{{ $item->created_at->format('M') }}</span>
                                                        </time>
                                                    </section>
                                                    <section class="card-cont">
                                                        <small>Order {{ sprintf('#SF%07d', $item->id) }}</small>
                                                        <div class="row">
                                                            <div class="line hidden-xs"></div>
                                                            <div class="col text-center">
                                                                <div class="col-sm-3" >
                                                                    <span class="glyphiconProcess"><i class="fas fa-boxes" style="color: rgb(0, 64, 255);"  title="Tranfer to shipping department"></i></i> </span>
                                                                    <h5>Tranfer to shipping department</h5>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <span class="glyphiconProcess"><i class="fas fa-shipping-fast" style="color: rgb(32, 32, 223);" title="In progress shipping"></i></span>
                                                                    <h5>In progress</h5>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <span class="glyphiconProcess"><i class="fas fa-check-circle fa-lg" style="color: green;" title="Done"></i></span>
                                                                    <h5>Done</h5>
                                                                </div>
                                                                <div class="col-sm-3" >
                                                                    <span class="glyphiconProcess active"><i class="fas fa-undo-alt" style="color: rgb(236, 128, 19);" title="Returned"></i></span>
                                                                    <h5>Returned</h5>
                                                                </div>
                                                            </div>  
                                                        </div>
                                                        <div class="even-date">
                                                            <i class="fa fa-calendar"></i>
                                                            <span>Date receive: {{  $item->receive_date ? \Carbon\Carbon::parse($item->receive_date)->format('j F, Y') : null }}</span>
                                                        </div>
                                                        <div class="even-info">
                                                            <i class="fa fa-map-marker"></i>
                                                            <span>Shipping Address: {{  $item->recipient_address }}</span>
                                                        </div>
                                                        <div class="even-info">
                                                            <i class="fas fa-user"></i>
                                                            <span>Name receive: {{  $item->recipient_name }} - {{  $item->recipient_phone }}</span>
                                                        </div>
                                                    </section>
                                                </article>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-center">No order available</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="my-cancel" class="tab-pane fade">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <b>My Cancellations</b>
                                    </div>
                                </div>
                            </div>
                            <div class="table-filter">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="show-entries">
                                            <span>Show</span>
                                            <select class="form-control" id="showCancel">
                                                <option value="5" {{ request()->showCancel == 5 || !request()->showCancel ? 'selected' : null }} >Last 5 orders</option>
                                                <option value="15" {{ request()->showCancel == 15 ? 'selected' : null }}>Last 15 days</option>
                                                <option value="30" {{ request()->showCancel == 30 ? 'selected' : null }}>Last 30 days</option>
                                                <option value="all" {{ request()->showCancel == 'all' ? 'selected' : null }}>All orders</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="list-bill">
                                    @if (!$billProductsCancel->isEmpty())
                                        @foreach ($billProductsCancel as $item)
                                            <div class="row">
                                                <article class="card fl-left">
                                                    <section class="date">
                                                        <time datetime="{{ $item->created_at->format('d') }}th {{ $item->created_at->format('M') }}">
                                                            <span>{{ $item->created_at->format('d') }}</span><span>{{ $item->created_at->format('M') }}</span>
                                                        </time>
                                                    </section>
                                                    <section class="card-cont">
                                                        <small>Order {{ sprintf('#SF%07d', $item->id) }}</small>
                                                        <div class="row">
                                                            <div class="line hidden-xs"></div>
                                                            <div class="col text-center">
                                                                <div class="col-sm-3" >
                                                                    <span class="glyphiconProcess {{ $item->status == 0 ? 'active' : '' }}"><i class="fas fa-clock" style="color: rgb(153, 153, 0);" title="Waitting"></i></i></span>
                                                                    <h5>Waitting Checking</h5>
                                                                </div>
                                                                <div class="col-sm-3" >
                                                                    <span class="glyphiconProcess {{ $item->status == 1 ? 'active' : '' }}"><i class="fas fa-boxes" style="color: rgb(0, 64, 255);"  title="Tranfer to shipping department"></i></i> </span>
                                                                    <h5>Tranfer to shipping department</h5>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <span class="glyphiconProcess {{ $item->status == 2 ? 'active' : '' }}"><i class="fas fa-shipping-fast" style="color: rgb(32, 32, 223);" title="In progress shipping"></i></span>
                                                                    <h5>In progress</h5>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <span class="glyphiconProcess {{ $item->status == 3 ? 'active' : '' }}"><i class="fas fa-check-circle fa-lg" style="color: green;" title="Done"></i></span>
                                                                    <h5>Done</h5>
                                                                </div>
                                                            </div>  
                                                        </div>
                                                        <div class="even-date">
                                                            <i class="fa fa-calendar"></i>
                                                            <span>Date receive: {{  $item->receive_date ? \Carbon\Carbon::parse($item->receive_date)->format('j F, Y') : null }}</span>
                                                        </div>
                                                        <div class="even-info">
                                                            <i class="fa fa-map-marker"></i>
                                                            <span>Shipping Address: {{  $item->recipient_address }}</span>
                                                        </div>
                                                        <div class="even-info">
                                                            <i class="fas fa-user"></i>
                                                            <span>Name receive: {{  $item->recipient_name }} - {{  $item->recipient_phone }}</span>
                                                        </div>
                                                    </section>
                                                </article>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-center">No order available</p>
                                    @endif
                                </div>
                            </div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-js')
<script>
    $('#showOrder').on('change',function() {
        var url = '{{ route("client.user.purchase", ["showOrder" => "__SHOW__"]) }}'+'#my-order'
        url = url.replace(/__SHOW__/g,$(this).val())
        window.location.href = url
    });
    $('#showReturns').on('change',function() {
        var url = '{{ route("client.user.purchase", ["showReturns" => "__SHOW__"]) }}'+'#my-return'
        url = url.replace(/__SHOW__/g,$(this).val())
        window.location.href = url
    });
    $('#showCancel').on('change',function() {
        var url = '{{ route("client.user.purchase", ["showCancel" => "__SHOW__"]) }}'+'#my-cancel'
        url = url.replace(/__SHOW__/g,$(this).val())
        window.location.href = url
    });
    $('.btn-toggle').on('click', function(){
        window.location.hash = $(this).attr('href')
    });

    if(window.location.hash) {
        $(window.location.hash).addClass('in active')
        if(window.location.hash == '#my-order') {
            $('.presentation').first().addClass('active')
        }
        if(window.location.hash == '#my-return') {
            $('.presentation:nth-child(2)').addClass('active')
        }
        if(window.location.hash == '#my-cancel') {
            $('.presentation:nth-child(3)').addClass('active')
        }
    }
    else {
        $('#my-order').addClass('in active')
        $('.presentation').first().addClass('active')
    }
</script>
@endsection