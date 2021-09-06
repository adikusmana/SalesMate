@extends('layouts/main')

@section('title', 'SalesMate | Ranking')
@section('content')
    <div class="page-title">
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Best Department Contribution</h2>
                    <div class="clearfix"></div>
                </div>
                <form action='/rankingdepartment/search' method="post" role="search">
                    {{ csrf_field() }}
                    <div class="well" style="overflow: auto">
                        @if (Auth::user()->role_id == '1')
                            <div class="col-sm-6">
                                <div class="form-group col-10">
                                    <label for="startdate"><strong>Start Date</strong></label>
                                    <input type="date" id="startdate"
                                        class="form-control @error('startdate') is-invalid @enderror" name="startdate"
                                        required>
                                    @error('startdate')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="form-group col-10">
                                    <label for="enddate"><strong>End Date</strong></label>
                                    <input type="date" id="enddate"
                                        class="form-control @error('enddate') is-invalid @enderror" name="enddate" required>
                                    @error('enddate')<div class="invalid-feedback">{{ $message }}</div>@enderror
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
                    <br>
                    <div class="form-group col-10">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
            </div>
        @else
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
                        <th>Department ID</th>
                        <th>Department Name</th>
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
                                <td>{{ $transaction->department_id }}</td>
                                @foreach ($departments as $department)
                                    @if ($transaction->department_id == $department->id)
                                        <td>{{ $department->name }}</td>
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
        </div>
    </div>
    </div>
    </div>
@endsection
