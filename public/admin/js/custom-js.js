var _token = $('meta[name="_token"]').attr('content');


var optionDataTable = {
    pageLength: 10,
    lengthMenu: [[10, 20, 30], [10, 20, 30]],
    // order: [
    //     [1, 'desc']
    // ],
    // language: {
    //     "zeroRecords": "No results found."
    // },
    // columnDefs: [{
    //     targets: 0,
    //     searchable: false,
    //     orderable: false,
    //     className: 'dt-body-center',
    //     render: function (data){
    //         return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
    //     }
    // }],
    responsive: true,
    processing: true,
    serverSide: true,
    searching: true,
    fnDrawCallback: function(oSettings) {
        let pagination = $('#' + oSettings.sTableId).closest('.dataTables_wrapper').find('.dataTables_paginate');
        if(oSettings._iDisplayLength >= oSettings._iRecordsDisplay) {
            pagination.hide();
        } else {
            pagination.show();
        }
    }
};

$('.alert').alert()

setTimeout(function(){
    $('.alert-custom').fadeOut('slow', function(){
        $(this).remove()
    });
}, 5000);

$( document ).on( "click", ".btn-submit-delete", function() {
    // let id = parseInt($(this).attr('data-id')) ? parseInt($(this).attr('data-id')) : '';
    let url = $(this).attr('data-url');
    let arraySelected = $(this).attr('data-array-selected');

    $.ajax({
        type: "POST",
        url: url,
        data: { 
            _token: _token,
            arraySelected: arraySelected
        },  
        complete:function(data){
            $('#modal-delete').modal('hide');
        },
        success: function(data){
            $.notify({ message: 'The item was deleted successfully!' },{ type: 'success' });
            $('#datatable').DataTable().ajax.reload();
        },
        error: function(data) {
            $.notify({ message: 'The item was delete fail!' },{ type: 'danger' });
        }
    });
});