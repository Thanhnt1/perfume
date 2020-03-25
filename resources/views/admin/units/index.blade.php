@extends('admin.layouts.app')
@section('title', 'Units')
@section('content')

    <!-- Page Heading -->
    <div class="row justify-content-between mb-4">
        <div class="col-4">
            <h1 class="h3 text-gray-800">Units</h1>
        </div>
        <div class="col-6 text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addUnitModal"><i class="fa fa-plus"></i> Add</button>
            <button type="button" id="btn-remove-all" data-url="{{url(route('admin.units.deleteMultiple'))}}" class="btn btn-danger"><i class="fa fa-trash" ></i> {{trans('product.delete_selected_item')}}</button>
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
                            <th>Created Date</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Add --}}
    <div class="modal fade" id="addUnitModal" tabindex="-1" role="dialog" aria-labelledby="addUnitModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUnitModalLabel">Add new unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.units.store') }}" method="POST" id="add-unit">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    {{-- <div class="form-group">
                        <label for="note" class="control-label">Note:</label>
                        <textarea class="form-control" id="note" name="note"></textarea>
                    </div> --}}
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="add-unit">Submit</button>
            </div>
          </div>
        </div>
    </div>

    {{-- Modal Update --}}
    <div class="modal fade" id="updateUnitModal" tabindex="-2" role="dialog" aria-labelledby="updateUnitModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateUnitModalLabel">Update unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.units.update') }}" method="POST" id="update-unit">
                    {{ method_field('PUT') }}
                    @csrf
                    <input type="hidden" id="idUnit" name="id" value="">
                    <div class="form-group">
                        <label for="name" class="control-label">Name:</label>
                        <input type="text" class="form-control" id="nameUnit" name="name">
                    </div>
                    {{-- <div class="form-group">
                        <label for="noteProperty" class="control-label">Note:</label>
                        <textarea class="form-control" id="noteProperty" name="noteProperty"></textarea>
                    </div> --}}
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="update-unit">Submit</button>
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
<script type="text/javascript">
    var table = $('#datatable').DataTable({
            ...optionDataTable,
            order: [[2, 'desc']],
            ajax: {
                type: "GET",
                url: "{{ route('admin.units.index') }}",
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
                { data: 'created_at', name: 'created_at'},
                {
                    "data": 'id',
                    "searchable": false,
                    "sortable": false,
                    "className": "text-center",
                    "render": function(data, type, row, meta){
                        return  '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateUnitModal" data-name="'+ row.name +'" data-id="'+ row.id +'" ><i class="fas fa-edit"></i> Edit</button>';
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

        $('#updateUnitModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var name = button.data('name')
            // var note = button.data('note')
            var modal = $(this)
            modal.find('#idUnit').val(id)
            modal.find('#nameUnit').val(name)
            // modal.find('#noteProperty').append(note)
        });
</script>
@endsection