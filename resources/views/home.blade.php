@extends('layouts.main')

@section('title', 'SalesMate | Home')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Home</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        @if (Auth::User()->role_id == '1')
        <div class="col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Total User per Department</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="tile_count">
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                          <span class="count_top"><i class="fa fa-user"></i> Sogo</span>
                          <div class="count">{{ $userD1 }}</div>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                          <span class="count_top"><i class="fa fa-user"></i> Home</span>
                          <div class="count">{{ $userD2 }}</div>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                          <span class="count_top"><i class="fa fa-user"></i> Ladies</span>
                          <div class="count">{{ $userD3 }}</div>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                          <span class="count_top"><i class="fa fa-user"></i> Menswear</span>
                          <div class="count">{{ $userD4 }}</div>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                          <span class="count_top"><i class="fa fa-user"></i> Cosmetic</span>
                          <div class="count">{{ $userD5 }}</div>
                        </div>
                        <div class="col-md-2 col-sm-4  ">
                          <a href="/user" class="btn btn-primary">Details</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Total Brand per Department</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="tile_count">
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                          <span class="count_top"><i class="fa fa-user"></i> Sogo</span>
                          <div class="count">{{ $brandD1 }}</div>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                          <span class="count_top"><i class="fa fa-user"></i> Home</span>
                          <div class="count">{{ $brandD2 }}</div>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                          <span class="count_top"><i class="fa fa-user"></i> Ladies</span>
                          <div class="count">{{ $brandD3 }}</div>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                          <span class="count_top"><i class="fa fa-user"></i> Menswear</span>
                          <div class="count">{{ $brandD4 }}</div>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                          <span class="count_top"><i class="fa fa-user"></i> Cosmetic</span>
                          <div class="count">{{ $brandD5 }}</div>
                        </div>
                        <div class="col-md-2 col-sm-4  ">
                          <a href="/brand" class="btn btn-primary">Details</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        @endif
        <div class="col-md-4 col-sm-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Sub Department Contribution Overall</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! $subdepartmentChart->container() !!}
                    {!! $subdepartmentChart->script() !!}
                    <a href="/rankingsubdepartment"><button class="btn btn-primary">Details</button></a>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-6  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Department Contribution Overall</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! $departmentChart->container() !!}
                    {!! $departmentChart->script() !!}
                    <a href="/rankingdepartment"><button class="btn btn-primary">Details</button></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>User Contribution Overall</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! $userChart->container() !!}
                    {!! $userChart->script() !!}
                    <a href="/rankinguser"><button class="btn btn-primary">Details</button></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Brand Contribution Overall</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    {!! $brandChart->container() !!}
                    {!! $brandChart->script() !!}
                    <a href="/rankingbrand"><button class="btn btn-primary">Details</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
