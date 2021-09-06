@extends('layouts/main')

@section('title', 'SalesMate | Add User')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Add User</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <form action="/user" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group col-6">
                        <label for="photo"><strong>Photo (max 1MB)</strong></label><br>
                        <input type="file" id="photo" name="photo" value="{{ old('photo') }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="name"><strong>Name</strong></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{ old('name') }}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="email"><strong>Email</strong></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" value="{{ old('email') }}">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="date"><strong>Date Birth</strong> (for password)</label>
                        <input class="form-control" class='date' type="date" name="date" required='required'>
                    </div>
                    <div class="form-group col-6">
                        <label for="role_id"><strong>Role</strong></label>
                        <select class="form-control select2" name="role_id" id="role_id" style="width: 100%;">
                            <option value=""> === Select Role === </option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                        @error('role_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="site_id"><strong>Site</strong></label>
                        <select class="form-control select2" name="site_id" id="site_id" style="width: 100%;">
                            <option value=""> === Select Site === </option>
                            @foreach ($sites as $site)
                                <option value="{{ $site->id }}">{{ $site->name }}</option>
                            @endforeach
                        </select>
                        @error('site_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="vendor_id"><strong>Vendor</strong></label>
                        <select class="form-control select2" name="vendor_id" id="vendor_id" style="width: 100%;">
                            <option value=""> === Select Vendor === </option>
                            @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                            @endforeach
                        </select>
                        @error('vendor_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="brand_id"><strong>Brand</strong></label>
                        <select class="form-control select2" name="brand_id" id="brand_id" style="width: 100%;">
                        </select>
                        @error('brand_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="department_id"><strong>Department</strong></label>
                        <select class="form-control select2" name="department_id" id="department_id" style="width: 100%;">
                            <option value=""> === Select Department === </option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                        @error('department_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="subdepartment_id"><strong>Sub Department</strong></label>
                        <select class="form-control select2" name="subdepartment_id" id="subdepartment_id"
                            style="width: 100%;">
                        </select>
                        @error('subdepartment_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/user" class="btn btn-danger">Cancel</a>
                </form>
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
