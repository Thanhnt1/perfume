@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')

    <!-- Page Heading -->
    <div class="row row justify-content-between">
        <div class="col-4"><h1 class="h3 mb-4 text-gray-800">Create Page</h1></div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="post" id="product-form">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name<i class="text-danger">&nbsp;*</i></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" tabindex="1" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="supplier_id">Supplier<i class="text-danger">&nbsp;*</i></label>
                            <select id="supplier_id" name="supplier_id" class="form-control" tabindex="3" required>
                                @foreach($supplier as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="import_price">Import price<i class="text-danger">&nbsp;*</i></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" id="import_price" name="import_price" value="{{ old('import_price') }}" tabindex="5" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">đ</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity<i class="text-danger">&nbsp;*</i></label>
                            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" tabindex="7" required>
                        </div>
                        <div class="form-group">
                            <label for="text-property">Property<i class="text-danger">&nbsp;*</i></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <select id="property_id" class="border rounded-left" tabindex="10" required>
                                        @foreach($property as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="text" class="form-control" name="asd" id="text-property" aria-label="Amount (to the nearest dollar)" placeholder="Text property..." required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-primary" id="btn-update-property" hidden>Update</button>
                                    <button type="button" class="btn btn-outline-success" id="btn-add-property">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control" tabindex="2" required>
                                @php
                                    $arrStatus = ["Close","Open","Active","Unactive"];
                                @endphp
                                @foreach ($arrStatus as $key => $item)
                                    <option value="{{ $key }}" {{ old('status') == $key ? 'selected="selected"' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category<i class="text-danger">&nbsp;*</i></label>
                            <select id="category_id" name="category_id" class="form-control" tabindex="4" required>
                                @foreach($categories as $value)
                                    <option value="{{ $value->id }}" {{ old('category_id') == $value->id ? 'selected="selected"' : '' }}>{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selling_price">Selling price<i class="text-danger">&nbsp;*</i></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" id="selling_price" name="selling_price" value="{{ old('import_price') }}" tabindex="6" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">đ</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="unit_id">Unit<i class="text-danger">&nbsp;*</i></label>
                            <select id="unit_id" name="unit_id" class="form-control" tabindex="8" required>
                                @foreach($unit as $value)
                                    <option value="{{ $value->id }}" {{ old('unit_id') == $value->id ? 'selected="selected"' : '' }}>{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="unit_id">List property <span id="name-property"></span></label>
                            <table class="table" id="table-property">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/.row-->

                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="avatar">Avatar<i class="text-danger">&nbsp;*</i></label>
                            <div class="needsclick dropzone" id="fileAvatar" name="fileAvatar" tabindex="9"></div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <label for="images">Images</label>
                            <div class="needsclick dropzone" id="images" name="images" tabindex="10"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" placeholder="Description..." name="description" tabindex="11"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col text-right">
                        <button type="submit" id="save" class="btn btn-primary" aria-pressed="true" tabindex="12">Save</button>
                        <a class="btn btn-secondary btn-submit-gallery" aria-pressed="true" tabindex="12" href="{{ route('admin.products.index') }}" title="Cancel" tabindex="10">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('custom-js')
<script type="text/javascript" src="/admin/vendor/jquery-mask/dist/jquery.mask.min.js"></script>

<script type="text/javascript">
    var uploadedDocumentMap = {}
    Dropzone.options.images = {
        url: "{{ route('admin.products.uploadImages') }}",
        maxFiles: 10,
        maxFilesize: 16, // MB
        dictFileTooBig: 'Image is larger than 16MB',
        addRemoveLinks: true,
        acceptedFiles: ".jpg,.png,.jpeg,.gif",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
            $('#product-form').append('<input type="hidden" name="fileUpload[]" value="' + response.hash_name + '">')
            uploadedDocumentMap[file.name] = response.hash_name
            console.log(file, response)
        },
        removedfile: function (file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('#product-form').find('input[name="fileUpload[]"][value="' + name + '"]').remove()
            $("#product-form").append("<input type='hidden' name='fileRemove[]' value='" + name + "'>");
        },
        error: function(file, response) {
            return false;
        }
    }

    Dropzone.options.fileAvatar = {
        url: "{{ route('admin.products.uploadImages') }}",
        maxFiles: 1,
        maxFilesize: 16, // MB
        dictFileTooBig: 'Image is larger than 16MB',
        addRemoveLinks: true,
        acceptedFiles: ".jpg,.png,.jpeg,.gif",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
            $('#product-form').append('<input type="hidden" name="avatar" value="' + response.hash_name + '">')
            uploadedDocumentMap[file.name] = response.hash_name
            console.log(file, response)
        },
        removedfile: function (file, response) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            $('#product-form').find('input[name="avatar"]').remove()
        },
        init: function () {
            this.on('addedfile', function(file) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            });
        },
        error: function(file, response) {
            return false;
        }
    }

    $('#import_price').mask('#,##0', { reverse: true });
    $('#selling_price').mask('#,##0', { reverse: true });
    $('#quantity').mask('#,##0', { reverse: true });

    $('#description').summernote({
        height: 250,
        maximumImageFileSize: 1024*1024, // 1 MB
        callbacks:{
            onImageUploadError: function(msg){
                alert(msg + ' (1 MB)')
            }
        }
    });

    var listProperty = [];
    var listAddProperty = [];
    var updateListPropertyKey = 0;

    $('#property_id').on('click', function(){
        var name = $('#property_id option:selected').text().toLowerCase()
        $('#name-property').text(name)

    }).trigger('click');

    $('#property_id').on('change', function(){
        var property_id = $(this).val();
        listAddProperty = listProperty[property_id] ? listProperty[property_id] : []; 
        $("#table-property tbody").empty();
        if(listProperty[property_id]) {
            listProperty[property_id].forEach((element, key) => {
                $('#table-property tbody:last-child').append('<tr><th scope="row">'+ (key+1) +'</th><td>'+ element +'</td><td><button type="button" data-property-key="'+ key +'" data-property-value="'+ element +'" class="btn btn-info btn-sm btn-edit-property mr-1"><i class="fa fa-edit"></i> Edit</button><button type="button" data-property-key="'+ key +'" class="btn btn-danger btn-sm btn-remove-property"><i class="fa fa-trash"></i> Remove</button></td></td></tr>');
            });
        }
    }).trigger('change');

    $('#btn-add-property').on('click', function(){
        var property_id = $('#property_id').val();
        var text_property = $('#text-property').val();
        if(text_property == '') {
            $('#text-property').addClass('border border-danger');
            return;
        }
        $('#text-property').removeClass('border border-danger');
        listAddProperty.push(text_property)
        listProperty[property_id] = listAddProperty

        // remove input list properties
        $('#product-form').find('input[name="properties[]"]').remove()
        
        // reload table
        $("#table-property tbody").empty();
        listProperty[property_id].forEach((element, key) => {
            $('#table-property tbody:last-child').append('<tr><th scope="row">'+ (key+1) +'</th><td>'+ element +'</td><td><button type="button" data-property-key="'+ key +'" data-property-value="'+ element +'" class="btn btn-info btn-sm btn-edit-property mr-1"><i class="fa fa-edit"></i> Edit</button><button type="button" data-property-key="'+ key +'" class="btn btn-danger btn-sm btn-remove-property"><i class="fa fa-trash"></i> Remove</button></td></td></tr>');
        });
        $('#product-form').find('input[class="list-pro"]').remove()
        listProperty.forEach((elementPro,keyPro) => {
            elementPro.forEach((elementList,keyList) => {
                $('#product-form').append('<input type="hidden" class="list-pro" name="properties['+ keyPro +']['+ keyList +']" data-property-key="'+ keyList +'" value="' + elementList + '">')
            });
        });
        
        // Clear input text property
        $('#text-property').val('');
        console.log(listProperty)
    });

    // issue https://stackoverflow.com/questions/15420558/jquery-click-event-not-working-after-append-method
    $('#table-property').on('click', '.btn-remove-property', function(){
        var property_id = $('#property_id').val();
        var property_key = $(this).data('property-key');

        // remove in list array property current
        listProperty[property_id].splice(property_key,1);

        // reload table
        $("#table-property tbody").empty();
        listProperty[property_id].forEach((element, key) => {
            $('#table-property tbody:last-child').append('<tr><th scope="row">'+ (key+1) +'</th><td>'+ element +'</td><td><button type="button" data-property-key="'+ key +'" data-property-value="'+ element +'" class="btn btn-info btn-sm btn-edit-property mr-1"><i class="fa fa-edit"></i> Edit</button><button type="button" data-property-key="'+ key +'" class="btn btn-danger btn-sm btn-remove-property"><i class="fa fa-trash"></i> Remove</button></td></td></tr>');
        });
        $('#product-form').find('input[class="list-pro"]').remove()
        listProperty.forEach((elementPro,keyPro) => {
            elementPro.forEach((elementList,keyList) => {
                $('#product-form').append('<input type="hidden" class="list-pro" name="properties['+ keyPro +']['+ keyList +']" data-property-key="'+ keyList +'" value="' + elementList + '">')
            });
        });

        console.log(listProperty)
    });

    $('#table-property').on('click', '.btn-edit-property', function(){
        $('#text-property').val($(this).data('property-value'));
        $('#btn-update-property').removeAttr('hidden');
        $('#btn-update-property').show();
        $('#text-property').focus();
        updateListPropertyKey = $(this).data('property-key');
        // console.log($(this).data('property-key'))
    });

    $('#btn-update-property').on('click', function(){
        var text_property = $('#text-property').val();
        var property_id = $('#property_id').val();
        if(text_property == '') {
            $('#text-property').addClass('border border-danger');
            return;
        }
        $('#text-property').removeClass('border border-danger');

        listProperty[property_id][updateListPropertyKey] = text_property;

        // reload table
        $("#table-property tbody").empty();
        listProperty[property_id].forEach((element, key) => {
            $('#table-property tbody:last-child').append('<tr><th scope="row">'+ (key+1) +'</th><td>'+ element +'</td><td><button type="button" data-property-key="'+ key +'" data-property-value="'+ element +'" class="btn btn-info btn-sm btn-edit-property mr-1"><i class="fa fa-edit"></i> Edit</button><button type="button" data-property-key="'+ key +'" class="btn btn-danger btn-sm btn-remove-property"><i class="fa fa-trash"></i> Remove</button></td></td></tr>');
        });
        $('#product-form').find('input[class="list-pro"]').remove()
        listProperty.forEach((elementPro,keyPro) => {
            elementPro.forEach((elementList,keyList) => {
                $('#product-form').append('<input type="hidden" class="list-pro" name="properties['+ keyPro +']['+ keyList +']" data-property-key="'+ keyList +'" value="' + elementList + '">')
            });
        });
        
        // Clear input text property
        $('#text-property').val('');

        // Hide button
        $(this).hide();

        console.log(listProperty)
    });
</script>
@endsection