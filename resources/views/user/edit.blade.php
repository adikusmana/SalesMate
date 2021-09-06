@extends('layouts/main')

@section('title', 'SalesMate | Edit User')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Edit User</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <form action="/user/{{ $user->id }}" method="post" enctype="multipart/form-data">
                    @method('patch')
                    {{ csrf_field() }}
                    @if (file_exists(public_path() . '/img/users/' . $user->email . '.jpg'))
                        <div class="form-group col-6">
                            <label for="photo">Photo (max 1MB)</label><br>
                            <img height="100" width="100" src="/img/users/{{ $user->email }}.jpg" /><br>
                            <input type="file" id="photo" name="photo">
                        </div>
                    @else
                        <div class="form-group col-6">
                            <label for="photo">Photo (max 1MB)</label><br>
                            <img height="100" width="100" src="/img/users/default.jpg" /><br>
                            <input type="file" id="photo" name="photo">
                        </div>
                    @endif
                    <div class="form-group col-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{ $user->name }}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="email">Email</label>
                        <input disabled type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ $user->email }}">
                        <input type="hidden" id="email" name="email" value="{{ $user->email }}">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="role_id">Role</label>
                        <select class="form-control select2" name="role_id" id="role_id" style="width: 100%;">
                            @if ($user->role_id == 1)
                                <option value="1" selected='selected'>Admin</option>
                                <option value="2">User</option>
                            @else
                                <option value="1">Admin</option>
                                <option value="2" selected='selected'>User</option>
                            @endif
                        </select>
                        @error('role_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="site_id">Site</label>
                        <select class="form-control select2" name="site_id" id="site_id" style="width: 100%;">
                            @foreach ($sites as $site)
                                <option value="{{ $site->id }}" @if ($site->id == $user->site_id)
                                    selected
                            @endif
                            >
                            {{ $site->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('site_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="vendor_id">Vendor</label>
                        <select class="form-control select2" name="vendor_id" id="vendor_id" style="width: 100%;">
                            @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}" @if ($vendor->id == $user->vendor_id)
                                    selected
                            @endif
                            >
                            {{ $vendor->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('vendor_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="brand_id">Brand</label>
                        <select class="form-control select2" name="brand_id" id="brand_id" style="width: 100%;">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" @if ($brand->id == $user->brand_id)
                                    selected
                            @endif
                            >
                            {{ $brand->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('brand_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="department_id">Department</label>
                        <select class="form-control select2" name="department_id" id="department_id" style="width: 100%;">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" @if ($department->id == $user->department_id)
                                    selected
                            @endif
                            >
                            {{ $department->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('department_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="subdepartment_id">Sub Department</label>
                        <select class="form-control select2" name="subdepartment_id" id="subdepartment_id"
                            style="width: 100%;">
                            @foreach ($subdepartments as $subdepartment)
                                <option value="{{ $subdepartment->id }}" @if ($subdepartment->id == $user->subdepartment_id)
                                    selected
                            @endif
                            >
                            {{ $subdepartment->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('subdepartment_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/user" class="btn btn-danger">Cancel</a>
                </form>
                <hr size="2px">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#resetpassword">Reset
                    Password</button>
                @if ($errors->any())
                    <p class="text-danger">{{ $errors->first() }}</p>
                @endif

                <div class="modal fade" id="resetpassword" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Reset Password</h4>
                            </div>
                            <form action="/user/{{ $user->id }}" method="post">
                                @method('patch')
                                {{ csrf_field() }}
                                <div class="clearfix"></div>
                                <div class="form-group col-6">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control  @error('new_password') is-invalid @enderror"
                                        id="new_password" name="new_password">
                                </div>
                                <div class="form-group col-6">
                                    <label for="password_confirmation">Password Confirmation</label>
                                    <input type="password"
                                        class="form-control  @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    $('#department_id').change(function(){
    var subdepartment_id = $(this).val();
    if(subdepartment_id){
    $.ajax({
    type:"GET",
    url:"{{ url('get-subdepartment-list') }}?department_id="+subdepartment_id,
    success:function(res){
    if(res){
    $("#subdepartment_id").empty();
    $("#subdepartment_id").append('<option>=== Select Sub Department ===</option>');
    $.each(res,function(key,value){
    $("#subdepartment_id").append('<option value="'+key+'">'+value+'</option>');
    });
    }else{
    $("#subdepartment_id").empty();
    }
    }
    });
    }
    });

    $('#vendor_id').change(function(){
    var brand_id = $(this).val();
    if(brand_id){
    $.ajax({
    type:"GET",
    url:"{{ url('get-brand-list') }}?vendor_id="+brand_id,
    success:function(res){
    if(res){
    $("#brand_id").empty();
    $("#brand_id").append('<option>=== Select Brand ===</option>');
    $.each(res,function(key,value){
    $("#brand_id").append('<option value="'+key+'">'+value+'</option>');
    });
    }else{
    $("#brand_id").empty();
    }
    }
    });
    }
    });

@endsection
