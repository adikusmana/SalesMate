@extends('layouts/main')

@section('title', 'SalesMate | Edit Brands')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Brand</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <form action="/brand/{{ $brand->id }}" method="post">
                    @method('patch')
                    {{ csrf_field() }}
                    <div class="form-group col-6">
                        <label for="name">Brand Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{ $brand->name }}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="vendor_id">Vendor</label>
                        <select class="form-control select2" name="vendor_id" id="vendor_id" style="width: 100%;">
                            @foreach ($vendors as $vendor)
                                <option value="{{ $vendor->id }}" @if ($vendor->id == $brand->vendor_id)
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
                        <label for="department_id">Department</label>
                        <select class="form-control select2" name="department_id" id="department_id" style="width: 100%;">
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" @if ($department->id == $brand->department_id)
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
                                <option value="{{ $subdepartment->id }}" @if ($subdepartment->id == $brand->subdepartment_id)
                                    selected
                            @endif
                            >
                            {{ $subdepartment->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('subdepartment_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="note">Note</label>
                        <textarea name="note" id="note" cols="30" rows="5"
                            class="form-control @error('note') is-invalid @enderror">{{ $brand->note }}</textarea>
                        @error('note')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/brand" class="btn btn-danger">Cancel</a>
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
    $("#subdepartment_id").append('<option>=== Select Department ===</option>');
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
@endsection
