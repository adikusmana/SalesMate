@extends('layouts/main')

@section('title', 'SalesMate | Sales Transaction')
@section('content')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sales Transaction</h2>
                    <div class="clearfix"></div>
                </div>
                <form action='/transaction/search' method="post" role="search">
                    {{ csrf_field() }}
                    <div class="row">
                        @if (Auth::user()->role_id == '1')
                            <div class="col-sm-6">
                                <div class="form-group col-10">
                                    <label for="vendor_id"><strong>Vendor</strong></label>
                                    <select class="form-control select2" name="vendor_id" id="vendor_id"
                                        style="width: 100%;" required>
                                        <option value=""> === Select Vendor === </option>
                                        @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('vendor_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group col-10">
                                    <label for="brand_id"><strong>Brand</strong></label>
                                    <select class="form-control select2" name="brand_id" id="brand_id" style="width: 100%;"
                                        required>
                                    </select>
                                    @error('brand_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group col-10">
                                    <label for="department_id"><strong>Department</strong></label>
                                    <select class="form-control select2" name="department_id" id="department_id"
                                        style="width: 100%;" required>
                                        <option value=""> === Select Department === </option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('department_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group col-10">
                                    <label for="subdepartment_id"><strong>Sub Department</strong></label>
                                    <select class="form-control select2" name="subdepartment_id" id="subdepartment_id"
                                        style="width: 100%;" required>
                                    </select>
                                    @error('subdepartment_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group col-10">
                                    <label for="site">Site</label>
                                    <select class="form-control select2" disabled name="site" id="site"
                                        style="width: 100%;">
                                        @foreach ($sites as $site)
                                            <option value="{{ $site->id }}" @if ($site->id == Auth::user()->site_id)
                                                selected
                                        @endif
                                        >
                                        {{ $site->name }}
                                        </option>
                        @endforeach
                        </select>
                        <input type="hidden" id="site_id" name="site_id" value="{{ Auth::user()->site_id }}">
                        @error('site_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-10">
                        <label for="startdate"><strong>Start Date</strong></label>
                        <input type="date" id="startdate" class="form-control @error('startdate') is-invalid @enderror"
                            name="startdate" required>
                        @error('startdate')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-10">
                        <label for="enddate"><strong>End Date</strong></label>
                        <input type="date" id="enddate" class="form-control @error('enddate') is-invalid @enderror"
                            name="enddate" required>
                        @error('enddate')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <br>
                    <div class="form-group col-10">
                        <button type="submit" class="btn btn-primary">Search</button>
                        <a href="/transaction" class="btn btn-danger">Cancel</a>
                    </div>
            </div>
        @else
            <div class="col-sm-6">
                <div class="form-group col-10">
                    <label for="vendor">Vendor</label>
                    <select class="form-control select2" disabled name="vendor" id="vendor" style="width: 100%;">
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}" @if ($vendor->id == Auth::user()->vendor_id)
                                selected
                        @endif
                        >
                        {{ $vendor->name }}
                        </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="vendor_id" value="{{ Auth::user()->vendor_id }}">
                    @error('vendor_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group col-10">
                    <label for="brand">Brand</label>
                    <select class="form-control select2" disabled name="brand" id="brand" style="width: 100%;">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" @if ($brand->id == Auth::user()->brand_id)
                                selected
                        @endif
                        >
                        {{ $brand->name }}
                        </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="brand_id" value="{{ Auth::user()->brand_id }}">
                    @error('brand_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group col-10">
                    <label for="department">Department</label>
                    <select class="form-control select2" disabled name="department" id="department" style="width: 100%;">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" @if ($department->id == Auth::user()->department_id)
                                selected
                        @endif
                        >
                        {{ $department->name }}
                        </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="department_id" value="{{ Auth::user()->department_id }}">
                    @error('department_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group col-10">
                    <label for="subdepartment">Sub Department</label>
                    <select class="form-control select2" disabled name="subdepartment" id="subdepartment"
                        style="width: 100%;">
                        @foreach ($subdepartments as $subdepartment)
                            <option value="{{ $subdepartment->id }}" @if ($subdepartment->id == Auth::user()->subdepartment_id)
                                selected
                        @endif
                        >
                        {{ $subdepartment->name }}
                        </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="subdepartment_id" value="{{ Auth::user()->subdepartment_id }}">
                    @error('subdepartment_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group col-10">
                    <label for="site">Site</label>
                    <select class="form-control select2" disabled name="site" id="site" style="width: 100%;">
                        @foreach ($sites as $site)
                            <option value="{{ $site->id }}" @if ($site->id == Auth::user()->site_id)
                                selected
                        @endif
                        >
                        {{ $site->name }}
                        </option>
                        @endforeach
                    </select>
                    <input type="hidden" id="site_id" name="site_id" value="{{ Auth::user()->site_id }}">
                    @error('site_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group col-10">
                    <label for="startdate"><strong>Start Date</strong></label>
                    <input type="date" id="startdate" class="form-control @error('startdate') is-invalid @enderror"
                        name="startdate" required>
                    @error('startdate')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="form-group col-10">
                    <label for="enddate"><strong>End Date</strong></label>
                    <input type="date" id="enddate" class="form-control @error('enddate') is-invalid @enderror"
                        name="enddate" required>
                    @error('enddate')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <br>
                <div class="form-group col-10">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="/transaction" class="btn btn-danger">Cancel</a>
                </div>
            </div>

            @endif
        </div>
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
