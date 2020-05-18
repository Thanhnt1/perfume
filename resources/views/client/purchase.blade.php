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
                    <li role="presentation" class="active"><a data-toggle="tab" href="#my-order">My Orders</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#my-return">My Returns</a></li>
                    <li role="presentation"><a data-toggle="tab" href="#my-cancel">My Cancellations</a></li>
                </ul>
            </div>
            <div class="col-sm-9">
                <div class="tab-content">
                    <div id="my-order" class="tab-pane fade ">
                      <h3>HOME</h3>
                      <p>Some content.</p>
                    </div>
                    <div id="my-return" class="tab-pane fade in active">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <b>Đơn Hàng Của Tôi</b>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="table-filter">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="show-entries">
                                            <span>Hiển Thị</span>
                                            <select class="form-control">
                                                <option>5 Đơn Hàng Gần Đây</option>
                                                <option>15 Ngày Gần Đây</option>
                                                <option>30 Ngày Gần Đây</option>
                                                <option>Tất Cả Đơn Hàng</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                         
                                        <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                        <div class="filter-group" >
                                            <label>Tìm kiếm</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                
                            </div>
                        </div>
                    </div>
                    <div id="my-cancel" class="tab-pane fade">
                      <h3>Menu 2</h3>
                      <p>Some content in menu 2.</p>
                    </div>
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