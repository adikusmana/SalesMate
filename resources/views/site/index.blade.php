@extends('layouts/main')

@section('title', 'SalesMate | Site')
@section('content')
    <div class="page-title">
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Site</h2>
                    <ul class="nav nav-right panel_toolbox">
                        <a href="/site/create" class="glyphicon glyphicon-plus btn btn-info"></a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($sites as $site)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $site->code }}</td>
                                <td>{{ $site->name }}</td>
                                <td>{{ $site->note }}</td>
                                <td>
                                    <a href="/site/{{ $site->id }}/edit" class="btn btn-primary">Edit</a>
                                    <form action="/site/{{ $site->id }}" method="post" class="d-inline">
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
