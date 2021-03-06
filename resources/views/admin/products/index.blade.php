@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')

    <!-- Page Heading -->
    <div class="row justify-content-between mb-4">
        <div class="col-4">
            <h1 class="h3 text-gray-800">Products</h1>
        </div>
        <div class="col-6 text-right">
            <a href="{{ route('admin.products.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
            <button type="button" id="btn-remove-all" data-url="{{url(route('admin.products.deleteMultiple'))}}" class="btn btn-danger"><i class="fa fa-trash" ></i> {{trans('product.delete_selected_item')}}</button>
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
                            <th>Avatar</th>
                            <th>Category</th>
                            <th>Supplier</th>
                            <th>Import Price(đ)</th>
                            <th>Selling Price(đ)</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Rate</th>
                            <th>Status</th>
                            <th>Created Date</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('modal')
    <!-- The Modal Delete -->
    @include('admin.components.modals.delete')
@endsection

@section('custom-js')
<script type="text/javascript">
    var table = $('#datatable').DataTable({
            ...optionDataTable,
            order: [[11, 'desc']],
            ajax: {
                type: "GET",
                url: "{{ route('admin.products.index') }}",
                data : function ( d ) {}
            },
            columns: [{
                    data: 'uuid',
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    render: function(data, type, row, meta){
                        return '<div class="unsort custom-control custom-checkbox"><input type="checkbox" class="custom-control-input" id="'+ row.uuid +'" name="remove[]"><label class="custom-control-label" for="'+ row.uuid +'"></label></div>'
                    }
                },
                { 
                    data: 'product_name',
                    name: 'products.name',
                    className: 'text-center text-truncate w-125',
                    render: function(data, type, row, meta){
                        var html = '<a href="{{ route('admin.products.edit', ['id' => '__ID__']) }}" class="">'+ row.product_name +'</a>'
                        return html.replace(/__ID__/g, row.uuid);
                    }
                },
                { 
                    data: 'avatar_url',
                    render: function(data, type, row, meta){
                        var url = data ?? '/admin/img/no-image.jpg'

                        return '<img src="' + url + '" data-src="' + url + '" alt="" class="img-fluid" style="width:150px">';
                    } 
                },
                { data: 'category_name', name: 'categories.name'},
                { data: 'supplier_name', name: 'suppliers.name'},
                { 
                    data: 'import_price', 
                    render: function(data, type, row, meta){
                        return data.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
                    }
                },
                { 
                    data: 'selling_price', 
                    render: function(data, type, row, meta){
                        return data.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
                    }
                },
                { 
                    data: 'quantity', 
                    render: function(data, type, row, meta){
                        return data.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
                    }
                },
                { data: 'unit_name', name: 'units.name'},
                { data: 'rate', name: 'rate'},
                { 
                    data: 'status', 
                    render: function(data, type, row, meta){
                        return data == 1 ? 'Open' : 'Close';
                    }
                },
                { data: 'created_at', name: 'products.created_at'},
            ],
        });

        $('#btn-remove-all').on('click', function(){
            var arraySelected = $("#datatable input:checkbox:checked").map(function(){
                return $(this).attr('id');
            }).get();
            console.log(arraySelected)
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
</script>
@endsection