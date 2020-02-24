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
                            <th>
                                <input type="checkbox" id="all-banner" name="all-banner">
                            </th>
                            <th>ID</th>
                            <th>{{trans('admin.title')}}</th>
                            <th>Banner</th>
                            <th>{{trans('admin.priority')}}</th>
                            <th>{{trans('admin.language')}}</th>
                            <th>{{trans('admin.created_at')}}</th>
                            <th></th>
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
            ajax: {
                type: "GET",
                url: "{{ route('admin.products.index') }}",
                data : function ( d ) {}
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                // {
                //     data: 'actions',
                //     name: 'actions',
                //     className: 'text-right',
                //     orderable: false
                // }
            ],
        });
</script>   
@endsection