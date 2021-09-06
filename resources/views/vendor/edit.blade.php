@extends('layouts/main')

@section('title', 'SalesMate | Edit Vendor')

@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Vendor</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <form action="/vendor/{{ $vendor->id }}" method="post">
                    @method('patch')
                    {{ csrf_field() }}
                    <div class="form-group col-6">
                        <label for="name">Vendor Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            value="{{ $vendor->name }}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="note">Note</label>
                        <textarea name="note" id="note" cols="30" rows="5"
                            class="form-control @error('note') is-invalid @enderror">{{ $vendor->note }}</textarea>
                        @error('note')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/vendor" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
