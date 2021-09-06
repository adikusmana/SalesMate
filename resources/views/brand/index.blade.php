@extends('layouts/main')

@section('title', 'SalesMate | Brands')
@section('content')
    <div class="page-title"></div>
    <div class="clearfox"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Brand</h2>
                    <ul class="nav nav-right panel_toolbox">
                        <a href="/brand/create" class="glyphicon glyphicon-plus btn btn-info"></a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Vendor</th>
                            <th>Sub Department</th>
                            <th>Department</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($brands as $brand)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->vendors->name }}</td>
                                <td>{{ $brand->subdepartments->name }}</td>
                                <td>{{ $brand->subdepartments->departments->name }}</td>
                                <td>{{ $brand->note }}</td>
                                <td>
                                    <form action="/brand/{{ $brand->id }}" method="post" class="d-inline">
                                        <a href="/brand/{{ $brand->id }}/edit" class="btn btn-primary">Edit</a>
                                        @method('delete')
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are You Sure')">Delete</button>
                                    </form>
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
