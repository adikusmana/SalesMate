@extends('layouts/main')

@section('title', 'SalesMate | Departments')

@section('content')
    <div class="page-title">
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List Departments</h2>
                    <ul class="nav nav-right panel_toolbox">
                        <a href="/department/create" class="glyphicon glyphicon-plus btn btn-info"></a>
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
                            @foreach ($departments as $department)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $department->code }}</td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->note }}</td>
                                <td>
                                    <a href="/department/{{ $department->id }}/edit" class="btn btn-primary">Edit</a>
                                    <form action="/department/{{ $department->id }}" method="post" class="d-inline">
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
