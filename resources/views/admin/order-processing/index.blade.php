@extends('admin.layouts.app')
@section('title', 'Order processing')
@section('content')

    <!-- Page Heading -->
    <div class="row justify-content-between mb-4">
        <div class="col-4">
            <h1 class="h3 text-gray-800">Order processing</h1>
        </div>
        {{-- <div class="col-6 text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addUnitModal"><i class="fa fa-plus"></i> Add</button>
            <button type="button" id="btn-remove-all" data-url="{{url(route('admin.units.deleteMultiple'))}}" class="btn btn-danger"><i class="fa fa-trash" ></i> {{trans('product.delete_selected_item')}}</button>
        </div> --}}
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-no-bordered table-hover" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Customer</th>
                            <th>Type shipping</th>
                            <th>Total price</th>
                            <th>Payment methods</th>
                            <th>Total discount</th>
                            <th>Shipping date</th>
                            <th>Receive date</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal Add --}}
    <div class="modal fade bd-example-modal-lg" id="showBillModal" tabindex="-1" role="dialog" aria-labelledby="showBillModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showBillModalLabel">Bill Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="customer" class="control-label">Customer</label>
                            <input type="text" class="form-control" id="customer" name="customer" disabled>
                        </div>
                        <div class="form-group">
                            <label for="total_discount" class="control-label">Total Discount</label>
                            <input type="text" class="form-control" id="total_discount" name="total_discount" disabled>
                        </div>
                        <div class="form-group">
                            <label for="type_shipping" class="control-label">Type Shipping</label>
                            <input type="text" class="form-control" id="type_shipping" name="type_shipping" disabled>
                        </div>
                        <div class="form-group">
                            <label for="shipping_date" class="control-label">Shipping Date</label>
                            <input type="text" class="form-control" id="shipping_date" name="shipping_date" disabled>
                        </div>
                        <div class="form-group">
                            <label for="recipient_name" class="control-label">Recipient Name</label>
                            <input type="text" class="form-control" id="recipient_name" name="recipient_name" disabled>
                        </div>
                        <div class="form-group">
                            <label for="recipient_address" class="control-label">Recipient Address</label>
                            <input type="text" class="form-control" id="recipient_address" name="recipient_address" disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="status" class="control-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status" disabled>
                        </div>
                        <div class="form-group">
                            <label for="total_price" class="control-label">Total Price</label>
                            <input type="text" class="form-control" id="total_price" name="total_price" disabled>
                        </div>
                        <div class="form-group">
                            <label for="payment_methods" class="control-label">Payment Methods</label>
                            <input type="text" class="form-control" id="payment_methods" name="payment_methods" disabled>
                        </div>
                        <div class="form-group">
                            <label for="receive_date" class="control-label">Receive Date</label>
                            <input type="text" class="form-control" id="receive_date" name="receive_date" disabled>
                        </div>
                        <div class="form-group">
                            <label for="recipient_phone" class="control-label">Recipient Phone</label>
                            <input type="text" class="form-control" id="recipient_phone" name="recipient_phone" disabled>
                        </div>
                        <div class="form-group">
                            <label for="created_at" class="control-label">Created At</label>
                            <input type="text" class="form-control" id="created_at" name="created_at" disabled>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="note" class="control-label">Note</label>
                            <textarea name="note" class="form-control" id="note" disabled></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
@endsection

@section('custom-js')
<script type="text/javascript">
    var table = $('#datatable').DataTable({
            ...optionDataTable,
            order: [[0, 'desc']],
            ajax: {
                type: "GET",
                url: "{{ route('admin.order-processing.index') }}",
                data : function ( d ) {}
            },
            columns: [
                { data: 'id_sprintf', className: "text-center", name: 'id' },
                { data: 'customer_name', name: 'customer.name'},
                { data: 'type_shipping_name', name: 'type_shipping.name'},
                { data: 'total_price', name: 'total_price'},
                { 
                    data: 'payment_methods',
                    render: function(data, type, row, meta){
                        // 0: waiting, 1: tranfer to shipping department, 2: in-progress-shipping, 3: done, 4: returned
                        switch (data) {
                            case '1':
                                return 'Paypal';
                            case '2':
                                return 'Credit Card';
                            default:
                                return 'On delivery';
                        }
                    }
                },
                { data: 'total_discount', name: 'total_discount'},
                { data: 'shipping_date', name: 'shipping_date'},
                { data: 'receive_date', name: 'receive_date'},
                {   
                    data: 'status', 
                    "className": "text-center",
                    render: function(data, type, row, meta){
                        // 0: waiting, 1: tranfer to shipping department, 2: in-progress-shipping, 3: done, 4: returned
                        switch (data) {
                            case '1':
                                return '<i class="fas fa-boxes" style="color: rgb(0, 64, 255);"  title="Tranfer to shipping department"></i>';
                            case '2':
                                return '<i class="fas fa-shipping-fast" style="color: rgb(32, 32, 223);" title="In progress shipping"></i> ';
                            case '3':
                                return '<i class="fas fa-check-circle fa-lg" style="color: green;" title="Done"></i> ';
                            case '4':
                                return '<i class="fas fa-undo-alt" style="color: rgb(236, 128, 19);" title="Returned"></i>';
                            default:
                                return '<i class="fas fa-clock" style="color: rgb(153, 153, 0);" title="Waitting"></i>';
                        }
                    }
                },
                { data: 'created_at', name: 'created_at'},
                {
                    "data": 'id',
                    "searchable": false,
                    "sortable": false,
                    "className": "text-center",
                    "render": function(data, type, row, meta){
                        var status;
                        var icon;
                        switch (row.status) {
                            case '1':
                                status = 'Tranfer to shipping department';
                                icon = '<i class="fas fa-shipping-fast" style="color: rgb(32, 32, 223);" title="In progress shipping"></i> ';
                            case '2':
                                status = 'In progress shipping';
                                icon = '<i class="fas fa-check-circle fa-lg" style="color: green;" title="Done"></i> ';
                            case '3':
                                status = 'Done';
                                icon = '<i class="fas fa-undo-alt" style="color: rgb(236, 128, 19);" title="Returned"></i>';
                            case '4':
                                status = 'Returned';
                            default:
                                status = "Waitting";
                                icon = '<i class="fas fa-boxes" style="color: rgb(0, 64, 255);"  title="Tranfer to shipping department"></i>';
                        }
                        var btnTranfer = '<button type="button" class="btn btn-success btn-tranfer" data-id="'+ row.id +'" data-status="'+ row.status +'">'+ icon +' Tranfer</button>';
                        return  btnTranfer + ' <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showBillModal" data-customer="'+ row.customer_name +'" data-type-shipping="'+ row.type_shipping_name +'" data-total-price="'+ row.total_price +'" data-payment-methods="'+ row.payment_methods +'" data-status="'+ status +'" data-total-discount="'+ row.total_discount +'" data-shipping-date="'+ row.shipping_date +'" data-receive-date="'+ row.receive_date +'" data-recipient-name="'+ row.recipient_name +'" data-recipient-phone="'+ row.recipient_phone +'" data-recipient-address="'+ row.recipient_address +'" data-created-at="'+ row.created_at +'" data-note="'+ row.note +'"><i class="fas fa-eye"></i> Show</button>';
                    }
                },
            ],
        });

        $('#showBillModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var customer = button.data('customer')
            var typeShipping = button.data('type-shipping')
            var totalPrice = button.data('total-price')
            var paymentMethods = button.data('payment-methods')
            var status = button.data('status')
            var totalDiscount = button.data('total-discount')
            var shippingDate = button.data('shipping-date')
            var receiveDate = button.data('receive-date')
            var recipientName = button.data('recipient-name')
            var recipientPhone = button.data('recipient-phone')
            var recipientAddress = button.data('recipient-address')
            var createdAt = button.data('created-at')
            var note = button.data('note')

            var modal = $(this)
            modal.find('#customer').val(customer)
            modal.find('#type_shipping').val(typeShipping)
            modal.find('#total_price').val(totalPrice)
            modal.find('#payment_methods').val(paymentMethods)
            modal.find('#status').val(status)
            modal.find('#total_discount').val(totalDiscount)
            modal.find('#shipping_date').val(shippingDate)
            modal.find('#receive_date').val(receiveDate)
            modal.find('#recipient_name').val(recipientName)
            modal.find('#recipient_phone').val(recipientPhone)
            modal.find('#recipient_address').val(recipientAddress)
            modal.find('#created_at').val(createdAt)
            modal.find('#note').val(note)
        });

        $('#datatable').on('click', '.btn-tranfer', function(){
            var id = $(this).data('id')
            var status = parseInt($(this).data('status'))
            if(status < 4) status++;
            $.ajax({
				url : "{{ route('admin.order-processing.update') }}",
				method: 'POST',
				data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    status: status,
				}
			}).done(function(data){
				$.notify({
					// options
					message: data.msg
				});
                $('#datatable').DataTable().ajax.reload();
			});
        });
</script>
@endsection