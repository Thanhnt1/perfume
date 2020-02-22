@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
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
<script>
    $(function() {
        $('#datatable').DataTable({
            ...optionDataTable,
            ajax: {
                url: '/admin/post/data',
                data : JSON.parse('<?php echo json_encode(request()->all()) ?>')
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },{
                    data: 'title',
                    name: 'title'
                },{
                    data: 'language',
                    name: 'language',
                    className: 'text-center'
                },{
                    data: 'created_at',
                    name: 'created_at'
                },{
                    data: 'actions',
                    name: 'actions',
                    className: 'text-right',
                    orderable: false
                }
            ],
        });
    });
</script>   
@endsection