@extends('admin.layouts.app')
@section('title', 'Suppliers')
@section('content')

    <!-- Page Heading -->
    <div class="row justify-content-between mb-4">
        <div class="col-4">
            <h1 class="h3 text-gray-800">Suppliers</h1>
        </div>
        <div class="col-6 text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addSupplierModal"><i class="fa fa-plus"></i> Add</button>
            <button type="button" id="btn-remove-all" data-url="{{url(route('admin.suppliers.deleteMultiple'))}}" class="btn btn-danger"><i class="fa fa-trash" ></i> {{trans('product.delete_selected_item')}}</button>
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
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Created Date</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Add --}}
    <div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSupplierModalLabel">Add new supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.suppliers.store') }}" method="POST" id="add-supplier">
                    @csrf
                    <div class="form-group">
                        <label for="name-add" class="control-label">Name:</label>
                        <input type="text" class="form-control" id="name-add" name="name">
                    </div>
                    <div class="form-group">
                        <label for="phone-add" class="control-label">Phone:</label>
                        <input type="text" class="form-control" id="phone-add" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="email-add" class="control-label">Email:</label>
                        <input type="email" class="form-control" id="email-add" name="email">
                    </div>
                    <div class="form-group">
                        <label for="address-add" class="control-label">Address:</label>
                        <textarea class="form-control" id="address-add" name="address"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="add-supplier">Submit</button>
            </div>
          </div>
        </div>
    </div>

    {{-- Modal Update --}}
    <div class="modal fade" id="updateSupplierModal" tabindex="-2" role="dialog" aria-labelledby="updateSupplierModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateSupplierModalLabel">Update supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.suppliers.update') }}" method="POST" id="update-supplier">
                    {{ method_field('PUT') }}
                    @csrf
                    <input type="hidden" id="idSupplier" name="id" value="">
                    <div class="form-group">
                        <label for="name-update" class="control-label">Name:</label>
                        <input type="text" class="form-control" id="name-update" name="name">
                    </div>
                    <div class="form-group">
                        <label for="phone-update" class="control-label">Phone:</label>
                        <input type="text" class="form-control" id="phone-update" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="email-update" class="control-label">Email:</label>
                        <input type="email" class="form-control" id="email-update" name="email">
                    </div>
                    <div class="form-group">
                        <label for="address-update" class="control-label">Address:</label>
                        <textarea class="form-control" id="address-update" name="address"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="update-supplier">Submit</button>
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
            order: [[4, 'desc']],
            ajax: {
                type: "GET",
                url: "{{ route('admin.suppliers.index') }}",
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
                { data: 'phone', name: 'phone'},
                { data: 'email', name: 'email'},
                { data: 'created_at', name: 'created_at'},
                {
                    "data": 'id',
                    "searchable": false,
                    "sortable": false,
                    "className": "text-center",
                    "render": function(data, type, row, meta){
                        return  '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateSupplierModal" data-name="'+ row.name +'" data-id="'+ row.id +'" data-phone="'+ row.phone +'" data-email="'+ row.email +'" data-address="'+ row.address +'"><i class="fas fa-edit"></i> Edit</button>';
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

        $('#updateSupplierModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var name = button.data('name')
            var email = button.data('email')
            var phone = button.data('phone')
            var address = button.data('address')
            var modal = $(this)
            modal.find('#idSupplier').val(id)
            modal.find('#name-update').val(name)
            modal.find('#email-update').val(email)
            modal.find('#phone-update').val(phone)
            modal.find('#address-update').val(address)
        });
</script>
@endsection