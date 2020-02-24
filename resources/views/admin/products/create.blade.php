@extends('admin.layouts.app')
@section('title', 'Products')
@section('content')

    <!-- Page Heading -->
    <div class="row row justify-content-between">
        <div class="col-4"><h1 class="h3 mb-4 text-gray-800">Create Page</h1></div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="post" id="user-form">
                @csrf
                <div class="row">
                    <div class="col-sm-5">
                        <!-- <hr class="mt-0"> -->
                        <div class="form-group">
                            <label for="name">Name<i class="text-danger">&nbsp;*</i></label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" tabindex="1" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity<i class="text-danger">&nbsp;*</i></label>
                            {{-- <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" tabindex="3" required> --}}
                        </div>
                        <div class="form-group">
                            <label for="import_price">Import price<i class="text-danger">&nbsp;*</i></label>
                            {{-- <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" pattern="^(?=.*[A-Z])(?=.*[0-9]).{6,}$"
                            oninvalid="setCustomValidity('{{ trans('user.mesValidatePassword')}}')" oninput="setCustomValidity('')" tabindex="5" required> --}}
                        </div>
            
                        <div class="form-group">
                            <label for="category_id">Category<i class="text-danger">&nbsp;*</i></label>
                            <div class="">
                                <select id="category_id" name="category_id[]" multiple class="form-control" tabindex="7" required>
                                    {{-- @foreach($roles as $value => $name)
                                        <option value="{{ $value }}" {{ in_array($value, old('role_id', [])) ? 'selected="selected"' : '' }}>{{ $name }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--/.col-->
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="last_name">{{ trans('user.lastName') }}<i class="text-danger">&nbsp;*</i></label>
                            {{-- <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" tabindex="2" required> --}}
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ trans('user.phoneNumber') }}<i class="text-danger">&nbsp;*</i></label>
                            {{-- <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" tabindex="4" required> --}}
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">{{ trans('user.confirmPassword') }}<i class="text-danger">&nbsp;*</i></label>
                            {{-- <input type="password" class="form-control" id="confirm-password" name="confirm-password" tabindex="6" required> --}}
                        </div>
                    </div>
                    <!--/.col-->
                    <div style="width: 39%;">
                        <div class="row">
                            <div class="col">
                            <button type="submit" id="save" class="btn btn-primary" aria-pressed="true" tabindex="9">Save</button>
                            </div>
            
                            <div class="col">
                            <a class="btn btn-secondary" aria-pressed="true" href="{{ route('admin.products.index') }}" title="Cancel" tabindex="10">Cancel</a>
                            </div>
                        </div>
                    </div>
                  </div>
                <!--/.row-->
            </form>
        </div>
    </div>
            
@endsection

@section('custom-js')

@endsection