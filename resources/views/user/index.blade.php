@extends('layouts/main')

@section('title', 'SalesMate | User')
@section('content')
    <div class="page-title">
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>List User</h2>
                    <ul class="nav nav-right panel_toolbox">
                        <a href="/user/create" class="glyphicon glyphicon-plus btn btn-info"></a>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Site</th>
                            <th>Vendor</th>
                            <th>Brand</th>
                            <th>Department</th>
                            <th>Sub Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($users as $user)
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->id }}</td>
                                @if (file_exists(public_path() . '/img/users/' . $user->email . '.jpg'))
                                    <td><img src="/img/users/{{ $user->email }}.jpg" width="60" height="60"></td>
                                @else
                                    <td><img src="/img/users/default.jpg" width="60" height="60"></td>
                                @endif
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->sites->name }}</td>
                                <td>{{ $user->vendors->name }}</td>
                                <td>{{ $user->brands->name }}</td>
                                <td>{{ $user->departments->name }}</td>
                                <td>{{ $user->subdepartments->name }}</td>
                                <td>
                                    <a href="/user/{{ $user->id }}/edit" class="btn btn-primary">Edit</a>
                                    <form action="/user/{{ $user->id }}" method="post" class="d-inline">
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
