@extends('layouts/main')

@section('title', 'SalesMate | Ranking')
@section('content')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Best Site Contribution</h2>
                    <div class="clearfix"></div>
                </div>
                <form action='/rankingsite/search' method="post" role="search">
                    {{ csrf_field() }}
                    <div class="well" style="overflow: auto">
                        <div class="form-group col-6">
                            <label for="startdate"><strong>Start Date</strong></label>
                            <input type="date" id="startdate" class="form-control @error('startdate') is-invalid @enderror"
                                name="startdate" required>
                            @error('startdate')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="enddate"><strong>End Date</strong></label>
                            <input type="date" id="enddate" class="form-control @error('enddate') is-invalid @enderror"
                                name="enddate" required>
                            @error('enddate')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group col-6">
                            <br>
                            <button type="submit" class="btn btn-primary data-toggle=" modal"
                                data-target="#siteModal">Search</button>
                        </div>
                    </div>
                </form>
                <div class="x_panel">
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Site ID</th>
                                <th>Site Name</th>
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
                                        <td>{{ $transaction->site_id }}</td>
                                        @foreach ($sites as $site)
                                            @if ($transaction->site_id == $site->id)
                                                <td>{{ $site->name }}</td>
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
@endsection
