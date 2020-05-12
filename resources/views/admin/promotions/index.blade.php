@extends('admin.layouts.app')
@section('title', 'Promotions')
@section('content')

    <!-- Page Heading -->
    <div class="row justify-content-between mb-4">
        <div class="col-4">
            <h1 class="h3 text-gray-800">Promotions</h1>
        </div>
        <div class="col-6 text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addPromotionModal"><i class="fa fa-plus"></i> Add</button>
            <button type="button" id="btn-remove-all" data-url="{{url(route('admin.promotions.deleteMultiple'))}}" class="btn btn-danger"><i class="fa fa-trash" ></i> {{trans('product.delete_selected_item')}}</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-no-bordered table-hover" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                <div class="unsort custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="all-item" name="all-item" data-select="{{ (old('all-item')) }}">
                                    <label class="custom-control-label" for="all-item"></label>
                                </div>
                            </th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Price</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Created Date</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Add --}}
    <div class="modal fade" id="addPromotionModal" tabindex="-1" role="dialog" aria-labelledby="addPromotionModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPromotionModalLabel">Add new promotion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.promotions.store') }}" method="POST" id="add-promotion">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label">Name<i class="text-danger">&nbsp;*</i></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="code" class="control-label">Code<i class="text-danger">&nbsp;*</i></label>
                                <input type="text" class="form-control text-uppercase" id="code" name="code" value="{{ old('code') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="start_date" class="control-label">Start Date<i class="text-danger">&nbsp;*</i></label>
                                <input type="text" class="form-control datepicker" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="price">Price<i class="text-danger">&nbsp;*</i></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control price" id="price" name="price" tabindex="6" value="{{ old('price') }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">đ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="end_date" class="control-label">End Date<i class="text-danger">&nbsp;*</i></label>
                                <input type="text" class="form-control datepicker" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="add-promotion">Submit</button>
            </div>
          </div>
        </div>
    </div>

    {{-- Modal Update --}}
    <div class="modal fade" id="updatePromotionModal" tabindex="-2" role="dialog" aria-labelledby="updatePromotionModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePromotionModalLabel">Update promotion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.promotions.update') }}" method="POST" id="update-promotion">
                    {{ method_field('PUT') }}
                    @csrf
                    <input type="hidden" id="idPromotion" name="id" value="">
                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" class="form-control" id="name_update" name="name">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="code_update" class="control-label">Code<i class="text-danger">&nbsp;*</i></label>
                                <input type="text" class="form-control text-uppercase" id="code_update" name="code" value="{{ old('code') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="start_date_update" class="control-label">Start Date<i class="text-danger">&nbsp;*</i></label>
                                <input type="text" class="form-control datepicker" name="start_date" id="start_date_update" value="{{ old('start_date') }}" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="price_price">Price<i class="text-danger">&nbsp;*</i></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                    </div>
                                    <input type="text" class="form-control price" id="price_update" name="price" tabindex="6" value="{{ old('price') }}" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">đ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="end_date_update" class="control-label">End Date<i class="text-danger">&nbsp;*</i></label>
                                <input type="text" class="form-control datepicker" name="end_date" id="end_date_update" value="{{ old('end_date') }}" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="update-promotion">Submit</button>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('modal')
    <!-- The Modal Delete -->
    @include('admin.components.modals.delete')
@endsection


@section('custom-js')
<script type="text/javascript" src="/admin/vendor/jquery-mask/dist/jquery.mask.min.js"></script>
<script type="text/javascript">
    var table = $('#datatable').DataTable({
        ...optionDataTable,
        order: [[6, 'desc']],
        ajax: {
            type: "GET",
            url: "{{ route('admin.promotions.index') }}",
            data : function ( d ) {}
        },
        columns: [
            {
                data: 'id',
                orderable: false,
                searchable: false,
                className: 'text-center',
                render: function(data, type, row, meta){
                    return '<div class="unsort custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="'+ row.id +'" name="remove[]"><label class="custom-control-label" for="'+ row.id +'"></label></div>'
                }
            },
            { data: 'name', name: 'name'},
            { data: 'code', name: 'Code'},
            { 
                data: 'price', 
                render: function(data, type, row, meta){
                    return data.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
                }
            },
            { data: 'start_date', name: 'start_date'},
            { data: 'end_date', name: 'end_date'},
            { data: 'created_at', name: 'created_at'},
            {
                "data": 'id',
                "searchable": false,
                "sortable": false,
                "className": "text-center",
                "render": function(data, type, row, meta){
                    return  '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updatePromotionModal" data-name="'+ row.name +'" data-id="'+ row.id +'" data-code="'+ row.code +'" data-price="'+ row.price +'" data-start-date="'+ row.start_date +'" data-end-date="'+ row.end_date +'"><i class="fas fa-edit"></i> Edit</button>';
                }
            },
        ],
    });

    $('#btn-remove-all').on('click', function(){
        var arraySelected = $("#datatable input:checkbox:checked").map(function(){
            return $(this).attr('id');
        }).get();

        if(arraySelected.length <= 0) {
            alert("{{ trans('product.pls-choose-item') }}");
            return;
        }

        let url = $(this).attr('data-url');

        // $('#modal-delete .btn-submit-delete').attr('data-ids', arraySelected);
        $('#modal-delete .btn-submit-delete').attr('data-array-selected', arraySelected);
        $('#modal-delete .btn-submit-delete').attr('data-url', url);
        $('#modal-delete').modal('show');
    });

    // action check all in table permissions
    $('#all-item').on('change', function(){
        $(this).is(':checked') ? checked=true : checked=false ;
        $('#datatable tr td input:checkbox').prop('checked', checked);
    }).trigger('change');
    
    // change checked button all-permisson when change any checkbox in datatable permissions
    $('#datatable').on('change',"tr td input:checkbox", function(){
        var countSelect = 0;
        table.rows().every(function () {
            var data = this.node();
            if($(data).find('input').prop('checked') == false)
            {
                countSelect++;
            }
        });
        var check = countSelect != 0 ? false : true ;
        $('#all-item').prop('checked', check);
    });

    $('#updatePromotionModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var name = button.data('name')
        var code = button.data('code')
        var price = button.data('price').toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
        var startDate = button.data('start-date')
        var endDate = button.data('end-date')

        var modal = $(this)
        modal.find('#idPromotion').val(id)
        modal.find('#name_update').val(name)
        modal.find('#code_update').val(code)
        modal.find('#price_update').val(price)
        modal.find('#start_date_update').val(startDate)
        modal.find('#end_date_update').val(endDate) 

    });

    $('.price').mask('#,##0', { reverse: true });
    $('.datepicker').datepicker({ dateFormat: 'yy-mm-dd', showAnim: 'slideDown' });

</script>
@endsection