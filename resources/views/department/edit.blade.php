@extends('layouts/main')

@section('title', 'SalesMate | Edit Departments')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Departments</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <form action="/department/{{ $department->id }}" method="post">
                    @method('patch')
                    {{ csrf_field() }}
                    <div class="form-group col-6">
                        <label for="code">Department Code</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code"
                            value="{{ $department->code }}">
                        @error('code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="name">Department Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{ $department->name }}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="note">Note</label>
                        <textarea name="note" id="note" cols="30" rows="5"
                            class="form-control @error('note') is-invalid @enderror">{{ $department->note }}</textarea>
                        @error('note')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/department" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
