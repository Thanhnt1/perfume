@extends('admin.layouts.app')
@section('title', 'Shipping Department')
@section('content')

    <!-- Page Heading -->
    <div class="row justify-content-between mb-4">
        <div class="col-4">
            <h1 class="h3 text-gray-800">Shipping Department</h1>
        </div>
        <div class="col-6 text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addShippingDepartmentModal"><i class="fa fa-plus"></i> Add</button>
            <button type="button" id="btn-remove-all" data-url="{{url(route('admin.shipping-department.deleteMultiple'))}}" class="btn btn-danger"><i class="fa fa-trash" ></i> {{trans('product.delete_selected_item')}}</button>
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
    <div class="modal fade" id="addShippingDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="addShippingDepartmentModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addShippingDepartmentModalLabel">Add new shipping department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.shipping-department.store') }}" method="POST" id="add-shipping-department">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="control-label">Name<i class="text-danger">&nbsp;*</i></label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="control-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="add-shipping-department">Submit</button>
            </div>
          </div>
        </div>
    </div>

    {{-- Modal Update --}}
    <div class="modal fade" id="updateShippingDepartmentModal" tabindex="-2" role="dialog" aria-labelledby="updateShippingDepartmentModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateShippingDepartmentModalLabel">Update shipping department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.shipping-department.update') }}" method="POST" id="update-shipping-department">
                    {{ method_field('PUT') }}
                    @csrf
                    <input type="hidden" id="idShippingDepartment" name="id" value="">
                    <div class="form-group">
                        <label for="nameShippingDepartment" class="control-label">Name<i class="text-danger">&nbsp;*</i></label>
                        <input type="text" class="form-control" id="nameShippingDepartment" name="name">
                    </div>
                    <div class="form-group">
                        <label for="phoneShippingDepartment" class="control-label">Phone</label>
                        <input type="text" class="form-control" id="phoneShippingDepartment" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="emailShippingDepartment" class="control-label">Email</label>
                        <input type="text" class="form-control" id="emailShippingDepartment" name="email" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="update-shipping-department">Submit</button>
            </div>
          </div>
        </div>
    </div>

    {{-- Modal Show Type --}}
    <div class="modal fade" id="showTypeShippingDepartmentModal" tabindex="-2" role="dialog" aria-labelledby="showTypeShippingDepartmentModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showTypeShippingDepartmentModalLabel">Type shipping department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="datatableTypeShipping" class="table table-striped table-no-bordered table-hover" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Day Shipping</th>
                                <th>Created Date</th>
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#addTypeShippingDepartmentModal">Add Type Shipping</button>
            </div>
          </div>
        </div>
    </div>

    {{-- Modal Add Type --}}
    <div class="modal fade" id="addTypeShippingDepartmentModal" tabindex="-2" role="dialog" aria-labelledby="addTypeShippingDepartmentModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTypeShippingDepartmentModalLabel">Add type shipping department</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="shipping_department_id" name="shipping_department_id">
                <div class="form-group">
                    <label for="name" class="control-label">Name<i class="text-danger">&nbsp;*</i></label>
                    <input type="text" class="form-control" id="nameType" name="name" required>
                </div>
                <div class="form-group">
                    <label for="priceType" class="control-label">Price<i class="text-danger">&nbsp;*</i></label>
                    <input type="text" class="form-control price" id="priceType" name="type" required>
                </div>
                <div class="form-group">
                    <label for="dayShipping" class="control-label">Day shipping<i class="text-danger">&nbsp;*</i></label>
                    <input type="text" class="form-control" id="dayShipping" name="dayShipping" required>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-add-type" >Submit</button>
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
            order: [[4, 'desc']],
            ajax: {
                type: "GET",
                url: "{{ route('admin.shipping-department.index') }}",
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
                        return  '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateShippingDepartmentModal" data-name="'+ row.name +'" data-id="'+ row.id +'" data-phone="'+ row.phone +'" data-email="'+ row.email +'" ><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-success btn-show-type" data-toggle="modal" data-target="#showTypeShippingDepartmentModal" data-shipping-department-id="'+ row.id +'"><i class="fas fa-gifts"></i> Show Type</button>';
                    }
                },
            ],
        });
        var shippingDepartmentId = null
        var tableTypeShipping = $('#datatableTypeShipping').DataTable({
            ...optionDataTable,
            order: [[0, 'desc']],
            ajax: {
                type: "GET",
                url: "{{ route('admin.shipping-department.typeShipping') }}",
                data : function(){
                    return {shipping_department_id: shippingDepartmentId};
                }
            },
            columns: [
                { data: 'name', name: 'name'},
                { data: 'price', name: 'price'},
                { data: 'day_shipping_count', name: 'day_shipping_count'},
                { data: 'created_at', name: 'created_at'},
                // {
                //     "data": 'id',
                //     "searchable": false,
                //     "sortable": false,
                //     "className": "text-center",
                //     "render": function(data, type, row, meta){
                //         return  '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateShippingDepartmentModal" data-name="'+ row.name +'" data-id="'+ row.id +'" data-phone="'+ row.phone +'" data-email="'+ row.email +'" ><i class="fas fa-edit"></i> Edit</button>';
                //     }
                // },
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

        $('#updateShippingDepartmentModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var name = button.data('name')
            var phone = button.data('phone')
            var email = button.data('email')

            var modal = $(this)
            modal.find('#idShippingDepartment').val(id)
            modal.find('#nameShippingDepartment').val(name)
            modal.find('#phoneShippingDepartment').val(phone)
            modal.find('#emailShippingDepartment').val(email)
        });

        $('#datatable').on('click', '.btn-show-type', function(){
            var dataShippingDepartmentId = $(this).data('shipping-department-id');
            shippingDepartmentId = dataShippingDepartmentId
            console.log(dataShippingDepartmentId, shippingDepartmentId)
            // reload data
            $('#datatableTypeShipping').DataTable().ajax.reload();
        });

        $('.btn-add-type').on('click', function(){
            $.ajax({
				url : "{{ route('admin.shipping-department.addTypeShipping') }}",
				method: 'POST',
				data: {
                    _token: '{{ csrf_token() }}',
                    name: $('#nameType').val(),
					price: $('#priceType').val(),
					day_shipping_count: $('#dayShipping').val(),
                    shipping_department_id: $('#shipping_department_id').val()
				}
			}).done(function(data){
				$.notify({
					// options
					message: data.msg
				});
                $('#addTypeShippingDepartmentModal').modal('toggle');
                $('#datatableTypeShipping').DataTable().ajax.reload();

			});
        });

        $('#showTypeShippingDepartmentModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var shipping_department_id = button.data('shipping-department-id')
            $('#shipping_department_id').val(shipping_department_id)
        });

        $('.price').mask('#,##0', { reverse: true });

</script>
@endsection