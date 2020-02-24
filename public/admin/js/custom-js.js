var optionDataTable = {
    pageLength: 10,
    lengthMenu: [[10, 20, 30], [10, 20, 30]],
    order: [
        [0, 'desc']
    ],
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