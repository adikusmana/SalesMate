@extends('layouts/main')

@section('title', 'SalesMate | User Profile')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>User Profile</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="col-md-4">
                    <div class="card card-primary card-ouline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if (file_exists(public_path() . '/img/users/' . Auth::user()->email . '.jpg'))
                                    <td><img src="/img/users/{{ Auth::user()->email }}.jpg" alt="Photo Profile"
                                            class="img-circle elevation-3" height="200" width="200"></td>
                                @else
                                    <td><img src="/img/users/default.jpg" alt="Photo Profile" class="img-circle elevation-3"
                                            height="200" width="200"></td>
                                @endif
                            </div>
                            <h3 class="profile-username text-center">
                                {{ Auth::user()->name }}
                            </h3>
                            <p class="text-muted text-center">
                                {{ Auth::user()->email }}
                            </p>
                            <div class="d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#changephoto">Change Photo</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#changepassword">Change Password</button>
                            </div>
                            @if ($errors->any())
                                <p class="text-danger">{{ $errors->first() }}</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> User Information</h3>
                        </div>
                        <div class="card-body">
                            <strong><i class=""></i>Role </strong>
                            @if (Auth::user()->role_id == 1)
                                <p class="text-muted">Admin</p>
                            @else
                                <p class="text-muted">User</p>
                            @endif
                            <hr>
                            <strong><i class=""></i>Site</strong>
                            <p class="text-muted">{{ Auth::user()->sites->name }}</p>
                            <hr>
                            <strong><i class=""></i>Department</strong>
                            <p class="text-muted">{{ Auth::user()->departments->name }}</p>
                            <hr>
                            <strong><i class=""></i>Sub Department</strong>
                            <p class="text-muted">{{ Auth::user()->subdepartments->name }}</p>
                            <hr>
                            <strong><i class=""></i>Brand</strong>
                            <p class="text-muted">{{ Auth::user()->brands->name }}</p>
                            <hr>
                            <strong><i class=""></i>Vendor</strong>
                            <p class="text-muted">{{ Auth::user()->vendors->name }}</p>
                            <hr>
                            <strong><i class="fas fa-file-alt mr-1"></i>Join Date</strong>
                            <p class="text-muted"> {{ Auth::user()->created_at }} </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="changephoto" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Photo</h4>
                </div>
                <form action="/profile/{{ Auth::user()->id }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @method('patch')
                        {{ csrf_field() }}
                        <div class="form-group col-6">
                            <label for="photo">Photo (max 1MB)</label><br>
                            <input type="file" id="photo" name="photo">
                        </div>
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="changepassword" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Password</h4>
                </div>
                <form action="/profile/{{ Auth::user()->id }}" method="post">
                    @method('patch')
                    {{ csrf_field() }}
                    <div class="clearfix"></div>
                    <div class="form-group col-6">
                        <label for="old_password">Old Password</label>
                        <input type="password" class="form-control" id="old_password" name="old_password">
                    </div>
                    <div class="form-group col-6">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control  @error('new_password') is-invalid @enderror"
                            id="new_password" name="new_password">
                    </div>
                    <div class="form-group col-6">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" class="form-control  @error('password_confirmation') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
