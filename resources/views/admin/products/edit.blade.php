@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')

    <!-- Page Heading -->
    <div class="row row justify-content-between">
        <div class="col-4"><h1 class="h3 mb-4 text-gray-800">Create Page</h1></div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.products.update',['id' => $product->uuid]) }}" method="post" id="product-form">
                {{ method_field('PUT') }}
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="name">Name<i class="text-danger">&nbsp;*</i></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" tabindex="1" required>
                        </div>
                        <div class="form-group">
                            <label for="supplier_id">Supplier</label>
                            <select id="supplier_id" name="supplier_id" class="form-control" tabindex="3" required>
                                @foreach($supplier as $value)
                                    <option value="{{ $value->id }}" {{ old('supplier_id', $product->supplier_id) == $value->id ? 'selected="selected"' : '' }}>{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="import_price">Import price<i class="text-danger">&nbsp;*</i></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" id="import_price" name="import_price" value="{{ old('import_price', $product->import_price) }}" tabindex="5" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">đ</span>
                                </div>
                            </div>
                        </div>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" {{ $productProperty ? 'checked' : null }}>
                            <label class="custom-control-label" for="customSwitch1">Multiple Quantity</label>
                        </div>
                        <div class="form-group single-quantity">
                            <label for="quantity">Quantity<i class="text-danger">&nbsp;*</i></label>
                            <input type="text" class="form-control" id="quantity-all" name="quantity" value="{{ old('quantity', $product->quantity) }}" tabindex="7">
                        </div>
                        <div class="form-group multiple-quantity">
                            <label for="text-property">Property<i class="text-danger">&nbsp;*</i></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <select id="property_id" class="border rounded-left" tabindex="10" required>
                                        @foreach($property as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="text" class="form-control" id="text-property" placeholder="Ex:'Red', 'Green',...">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-primary" id="btn-update-property" hidden>Update</button>
                                    <button type="button" class="btn btn-outline-success" id="btn-add-property">Add</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group multiple-quantity">
                            <label for="quantity">Quantity<i class="text-danger">&nbsp;*</i></label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="quantity" tabindex="7" placeholder="Ex:'10', '20',...">
                                <div class="input-group-append">
                                    <select id="unit_id" class="border rounded-right" tabindex="8">
                                        @foreach($unit as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                    </select>
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
                                    <option value="{{ $key }}" {{ old('status', $product->status) == $key ? 'selected="selected"' : '' }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select id="category_id" name="category_id" class="form-control" tabindex="4" required>
                                @foreach($categories as $value)
                                    <option value="{{ $value->id }}" {{ old('category_id', $product->category_id) == $value->id ? 'selected="selected"' : '' }}>{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="selling_price">Selling price<i class="text-danger">&nbsp;*</i></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">$</span>
                                </div>
                                <input type="text" class="form-control" id="selling_price" name="selling_price" value="{{ old('import_price', $product->selling_price) }}" tabindex="6" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">đ</span>
                                </div>
                            </div>
                        </div>
                        <div class="custom-control custom-switch"></div>
                        <div class="form-group single-quantity">
                            <label for="unit_id_all">Unit<i class="text-danger">&nbsp;*</i></label>
                            <select id="unit_id_all" name="unit_id" class="form-control" tabindex="8" required>
                                @foreach($unit as $value)
                                    <option value="{{ $value->id }}" {{ old('unit_id', $product->unit_id) == $value->id ? 'selected="selected"' : '' }}>{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group multiple-quantity">
                            <label for="table-property">List property <span id="name-property"></span></label>
                            <table class="table" id="table-property">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Unit</th>
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
                    <div class="col-3">
                        <div class="form-group">
                            <label for="avatar">Avatar<i class="text-danger">&nbsp;*</i></label>
                            <div class="needsclick dropzone" id="fileAvatar" name="fileAvatar" tabindex="9"></div>
                        </div>
                    </div>
                    <div class="col-9">
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
                            <textarea class="form-control" id="description" placeholder="Description..." name="description" tabindex="11">
                                {!! old('description', $product->description) !!}
                            </textarea>
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
    var countImage = {!! count($images) !!}
    Dropzone.options.images = {
        url: "{{ route('admin.products.uploadImages') }}",
        maxFiles: 10,
        maxFilesize: 16, // MB
        dictFileTooBig: 'Image is larger than 16MB',
        acceptedFiles: ".jpg,.png,.jpeg,.gif",
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
            $('#product-form').append('<input type="hidden" name="fileUpload[]" value="' + response.hash_name + '">')
            uploadedDocumentMap[file.name] = response.hash_name
            countImage++;
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
            if(typeof name == "undefined") {
                name = file.name
            }
            $('#product-form').find('input[name="fileUpload[]"][value="' + name + '"]').remove()
            $("#product-form").append("<input type='hidden' name='fileRemove[]' value='" + name + "'>");
           
            countImage--;
            if (countImage >= 1) {
                $('#images .dz-message').hide();
            }
            else {
                $('#images .dz-message').show();
            }
        },
        init: function () {
            @if(isset($product) && $images)
                var files = {!! json_encode($images) !!}
                for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.path);
                    file.previewElement.classList.add('dz-complete')
                    $('#product-form').append('<input type="hidden" name="fileUpload[]" value="' + file.name + '">')
                }
            @endif
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
        removedfile: function (file) {
            file.previewElement.remove()
            var name = ''
            if (typeof file.file_name !== 'undefined') {
                name = file.file_name
            } else {
                name = uploadedDocumentMap[file.name]
            }
            if(typeof name == "undefined") {
                name = file.name
            }

            $('#product-form').find('input[name="avatar"]').remove()
            $("#product-form").append("<input type='hidden' name='avatarRemove[]' value='" + name + "'>");
        },
        init: function () {
            @if(isset($product) && $avatar)
                // binding data from server
                var file = {!! json_encode($avatar) !!}
                this.options.addedfile.call(this, file)
                this.options.thumbnail.call(this, file, file.path);
                file.previewElement.classList.add('dz-complete')
                $('#product-form').append('<input type="hidden" name="avatar" value="'+ file.name +'">')
            @endif
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

    $('#quantity, #quantity-all, #selling_price, #import_price').mask('#,##0', { reverse: true });

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
    var arrUnit = {!! json_encode($unit) !!};
    var indexFirstProperty = null;

    function reloadData(property_id) {
        // remove input list properties
        // $('#product-form').find('input[name="properties[]"]').remove()
        
        // reload table
        $("#table-property tbody").empty();
        $('#product-form').find('input[class="list-pro"]').remove();
        var sumQuantity = 0;
        listProperty.forEach((elementPro,keyPro) => {
            elementPro.forEach((elementList,keyList) => {
                if(keyPro == property_id) { // add record to table
                    $('#table-property tbody:last-child').append('<tr><th scope="row">'+ (keyList+1) +'</th><td class="text-truncate" style="max-width: 125px;">'+ elementList[0] +'</td><td>'+ elementList[1] +'</td><td>'+ getNameUnit(elementList[2]) +'</td><td><button type="button" data-property-key="'+ keyList +'" data-property-value="'+ elementList[0] +'" data-property-quantity="'+ elementList[1] +'" data-property-unit="'+ elementList[2] +'" class="btn btn-info btn-sm btn-edit-property mr-1"><i class="fa fa-edit"></i> Edit</button><button type="button" data-property-key="'+ keyList +'" class="btn btn-danger btn-sm btn-remove-property"><i class="fa fa-trash"></i> Remove</button></td></td></tr>');
                }
                elementList.forEach((elementAll,keyAll) => {
                    $('#product-form').append('<input type="hidden" class="list-pro" name="properties['+ keyPro +']['+ keyList +']['+ keyAll +']" data-property-key="'+ keyList +'" value="' + (keyAll == 1 ? parseInt(elementAll.replace(/,/g, '')) : elementAll) + '">')
                    sumQuantity = keyAll == 1 ? sumQuantity + parseInt(elementAll.replace(/,/g, ''))  : sumQuantity
                });
            });
        });
        // add sum quantity params
        $('#product-form').find('input[name="quantity"][type="hidden"]').remove();
        $('#product-form').append('<input type="hidden" name="quantity" value="' + sumQuantity + '">')
    }

    $('#property_id').on('click', function(){
        var name = $('#property_id option:selected').text().toLowerCase()
        $('#name-property').text(name)

    }).trigger('click');

    $('#property_id').on('change', function(){
        var property_id = $(this).val();
        var arrProductProperty = {!! json_encode($productProperty) !!};
        var num = 0;
        var arrProperty = [];
        listAddProperty = listProperty[property_id] ? listProperty[property_id] : [];

        $("#table-property tbody").empty();
            console.log('asd',listProperty)
        if(listProperty[property_id]) {
            listProperty[property_id].forEach((element, key) => {
                $('#table-property tbody:last-child').append('<tr><th scope="row">'+ (key+1) +'</th><td class="text-truncate" style="max-width: 125px;">'+ element[0] +'</td><td>'+ element[1] +'</td><td>'+ getNameUnit(element[2]) +'</td><td><button type="button" data-property-key="'+ key +'" data-property-value="'+ element[0] +'" data-property-quantity="'+ element[1] +'" data-property-unit="'+ element[2] +'" class="btn btn-info btn-sm btn-edit-property mr-1"><i class="fa fa-edit"></i> Edit</button><button type="button" data-property-key="'+ key +'" class="btn btn-danger btn-sm btn-remove-property"><i class="fa fa-trash"></i> Remove</button></td></td></tr>');
            });
            // reloadData(property_id)
        }
        else {
            if(arrProductProperty.length != 0 && indexFirstProperty == null) {
                arrProductProperty.forEach(element => {
                    if (element.pivot.property_id == property_id) {
                        $('#table-property tbody:last-child').append('<tr><th scope="row">'+ (num+1) +'</th><td class="text-truncate" style="max-width: 125px;">'+ element.pivot.value +'</td><td>'+ element.pivot.quantity +'</td><td>'+ getNameUnit(element.pivot.unit_id) +'</td><td><button type="button" data-property-key="'+ num +'" data-property-value="'+ element.pivot.value +'" data-property-quantity="'+ element.pivot.quantity +'" data-property-unit="'+ element.pivot.unit_id +'" class="btn btn-info btn-sm btn-edit-property mr-1"><i class="fa fa-edit"></i> Edit</button><button type="button" data-property-key="'+ num +'" class="btn btn-danger btn-sm btn-remove-property"><i class="fa fa-trash"></i> Remove</button></td></td></tr>');
                        num++;
                    }
                    if(arrProperty[element.pivot.property_id] == null) {
                        arrProperty[element.pivot.property_id] = []
                    }
                    arrProperty[element.pivot.property_id].push([element.pivot.value,element.pivot.quantity.toString(),element.pivot.unit_id])
                    if(indexFirstProperty == null) {
                        indexFirstProperty = element.pivot.property_id
                    }
                });
                listProperty = arrProperty;
                listAddProperty = arrProperty[indexFirstProperty]
            }
        }
        console.log(listProperty)
    }).trigger('change');

    $('#customSwitch1').on('change', function(){
        if($(this).is(":checked")) {
            // hide single quantity
            $('.single-quantity').hide()
            $('.multiple-quantity').show()
            // $('#quantity-all').val('')
            // console.log($('#quantity-all').val())
        }
        else {
            // show single quantity
            $('.single-quantity').show()
            $('.multiple-quantity').hide()

            // reload multiple quantity
            var property_id = $(this).val();
            listProperty = []
            listAddProperty = []
            updateListPropertyKey = 0
            reloadData(property_id)
            $('#product-form').find('input[name="quantity"][type="hidden"]').remove();
            $('#text-property').val('');
            $('#quantity').val('');
        }
    }).trigger('change');

    $('#text-property').on('change', function(){
        $(this).removeClass('border border-danger');
    });

    $('#quantity').on('change', function(){
        $(this).removeClass('border border-danger');
    });

    function getNameUnit(id){
        let result = null;
        arrUnit.forEach(element => {
            if(element.id == id)
                result = element.name
        });
        return result;
    };

    $('#btn-add-property').on('click', function(){
        var property_id = parseInt($('#property_id').val());
        var text_property = $('#text-property').val();
        var quantity = $('#quantity').val();
        var unit_id = parseInt($('#unit_id option:selected').val());

        if(text_property == '' || $('#quantity').val() == '') {
            if(text_property == '') {
                $('#text-property').addClass('border border-danger');
            }
            if($('#quantity').val() == '') {
                $('#quantity').addClass('border border-danger');
            }
            return;
        }
        listAddProperty.push([text_property,quantity,unit_id])
        listProperty[property_id] = listAddProperty

        console.log('dd',listAddProperty)

        // reload data
        reloadData(property_id)

        // Clear input text property
        $('#text-property').val('');
        $('#quantity').val('');
        // console.log(listProperty)
    });

    // issue https://stackoverflow.com/questions/15420558/jquery-click-event-not-working-after-append-method
    $('#table-property').on('click', '.btn-remove-property', function(){
        var property_id = parseInt($('#property_id').val());
        var property_key = $(this).data('property-key');

        // remove in list array property current
        listProperty[property_id].splice(property_key,1);

        // reload data
        reloadData(property_id)

        console.log(listProperty)
    });

    $('#table-property').on('click', '.btn-edit-property', function(){
        $('#text-property').val($(this).data('property-value'));
        $('#quantity').val($(this).data('property-quantity'));
        $('#unit_id').val($(this).data('property-unit'));
        $('#btn-update-property').removeAttr('hidden');
        $('#btn-update-property').show();
        $('#text-property').focus();
        updateListPropertyKey = $(this).data('property-key');
        console.log(updateListPropertyKey)
    });

    $('#btn-update-property').on('click', function(){
        var text_property = $('#text-property').val();
        var property_id = $('#property_id').val();
        var quantity = $('#quantity').val();
        var unit_id = parseInt($('#unit_id option:selected').val());

        if(text_property == '' || quantity == '') {
            if(text_property == '') {
                $('#text-property').addClass('border border-danger');
            }
            if(quantity == '') {
                $('#quantity').addClass('border border-danger');
            }
            return;
        }
        $('#text-property').removeClass('border border-danger');

        listProperty[property_id][updateListPropertyKey] = [text_property,quantity,unit_id];

        // reload data
        reloadData(property_id)
        
        // Clear input text property
        $('#text-property').val('');
        $('#quantity').val('');

        // Hide button
        $(this).hide();

        console.log(listProperty)
    });
</script>
@endsection