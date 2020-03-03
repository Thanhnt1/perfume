@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')

    <!-- Page Heading -->
    <div class="row row justify-content-between">
        <div class="col-4"><h1 class="h3 mb-4 text-gray-800">Blank Page</h1></div>
        <div class="col-4 text-right">
            <a href="{{ route('admin.products.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Add</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-no-bordered table-hover" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="unsort"></th>
                            <th>Name</th>
                            <th>Image</th>
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

@section('custom-js')
<script type="text/javascript">
    var table = $('#datatable').DataTable({
            ...optionDataTable,
            order: [[1, 'desc']],
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
                        return '<input type="checkbox" name="remove[]" id="'+ row.uuid +'">';
                    }
                },
                { 
                    data: 'product_name',
                    name: 'products.name',
                    className: 'text-center text-nowrap',
                    render: function(data, type, row, meta){
                        var html = '<a href="{{ route('admin.products.edit', ['id' => '__ID__']) }}">'+ row.product_name +'</a>'
                        return html.replace(/__ID__/g, row.uuid);
                    }
                },
                { 
                    data: 'avatar',
                    render: function(data, type, row, meta){
                        var url = data ? '/storage/products/' + data : '/admin/img/no-image.jpg'

                        return '<img src="' + url + '" alt="' + data + '" class="img-fluid">';
                    } 
                },
                { data: 'category_name', name: 'categories.name'},
                { data: 'supplier_name', name: 'suppliers.name'},
                { data: 'import_price', name: 'import_price'},
                { data: 'selling_price', name: 'selling_price'},
                { data: 'quantity', name: 'quantity'},
                { data: 'unit_name', name: 'units.name'},
                { data: 'rate', name: 'rate'},
                { data: 'status', name: 'status'},
                { data: 'created_at', name: 'created_at'},
            ],
        });
</script>
@endsection

@section('custom-css')
    <style>
        .unsort {
            background-image: unset !important;
        }
    </style>
@endsection