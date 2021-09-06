@extends('layouts/main')

@section('title', 'SalesMate | Ranking')
@section('content')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Best User Contribution</h2>
                    <div class="clearfix"></div>
                </div>
                <form action='/rankinguser/search' method="post" role="search">
                    {{ csrf_field() }}
                    <div class="well" style="overflow: auto">
                        @if (Auth::user()->role_id == '1')
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
                        <label for="department_id"><strong>Department</strong></label>
                        <select class="form-control select2" name="department_id" id="department_id" style="width: 100%;"
                            required>
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
                </div>
            </div>
        @else
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
                </div>
            </div>
            @endif
        </div>
        </form>
        <div class="x_panel">
            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Brand</th>
                        @if (Auth::user()->role_id == '1')
                            <th>Total Sales</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if (isset($details))
                        @foreach ($details as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->user_id }}</td>
                                @foreach ($users as $user)
                                    @if ($transaction->user_id == $user->id)
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->brands->name }}</td>
                                    @endif
                                @endforeach
                                @if (Auth::user()->role_id == '1')
                                    <td>Rp. {{ number_format($transaction->total_sales, 0, ',', '.') }}</td>
                                @endif
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>
        </div </div>
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
@endsection
