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
                        <div class="form-group">
                            <label for="quantity">Quantity<i class="text-danger">&nbsp;*</i></label>
                            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" tabindex="7" required>
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
                        <div class="form-group">
                            <label for="unit_id">Unit<i class="text-danger">&nbsp;*</i></label>
                            <select id="unit_id" name="unit_id" class="form-control" tabindex="8" required>
                                @foreach($unit as $value)
                                    <option value="{{ $value->id }}" {{ old('unit_id', $product->unit_id) == $value->id ? 'selected="selected"' : '' }}>{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!--/.row-->

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="avatar">Avatar</label>
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
                            <textarea class="form-control" id="description" name="description" tabindex="11"></textarea>
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
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        success: function (file, response) {
            $('#product-form').append('<input type="hidden" name="fileUpload[]" value="' + response.name + '">')
            uploadedDocumentMap[file.name] = response.name
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
        init: function () {
            @if(isset($product) && $images)
                var files = {!! json_encode($images) !!}
                for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.path);
                    file.previewElement.classList.add('dz-complete')
                    $('#product-form').append('<input type="hidden" name="fileUpload[]" value="' + file.url + '">')
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
        autoProcessQueue: false,
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
            $('#product-form').find('input[name="avatar"][value="' + name + '"]').remove()
            $("#product-form").append("<input type='hidden' name='avatar' value='" + name + "'>");
        },
        init: function () {
            @if(isset($product) && $avatar)
                var file = "{{ $avatar }}"
                // var reader = new FileReader();
                // reader.onload = function(event) {
                //     base64 = event.target.result;
                //     _this.processQueue()
                // };
                // for (var i in files) {
                    // var file = files[i]
                    this.options.addedfile.call(this, file)
                    // file.previewElement.classList.add('dz-complete')
                    $('#product-form').append('<input type="hidden" name="fileAvatar[]" value="' + file + '">')
                // }
                // this.on("addedfile", function (file) {
                //     var reader = new FileReader();
                //     reader.onload = function(event) {
                //         // event.target.result contains base64 encoded image
                //         var base64String = event.target.result;
                //         var fileName = file.name
                //         handlePictureDropUpload(base64String ,fileName );
                //     };
                //     reader.readAsDataURL(file);

                // });
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


    CKEDITOR.replace( 'description', {
        filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
    } );
   

    $('#import_price').mask('#,##0', { reverse: true });
    $('#selling_price').mask('#,##0', { reverse: true });
    $('#quantity').mask('#,##0', { reverse: true });
</script>
@include('ckfinder::setup')
@endsection