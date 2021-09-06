@extends('layouts/main')

@section('title', 'SalesMate | Upload Transaction')
@section('content')
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Upload Transaction</h2>
                    <div class="clearfix"></div>
                </div>
                <form action='/uploadTransaction' method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="well" style="overflow: auto">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="form-group col-6">
                            <label for="file">File (.csv or .xlsx/.xls | Max 2MB)</label><br>
                            <input type="file" id="file" name="file">
                        </div>
                        <div class="form-group col-6">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                    <h4 class="text-danger">Attention !!</h4>
                    <p class="text-danger">Please Remember this Format</p>
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Vendor ID</th>
                                <th>Site ID</th>
                                <th>User ID</th>
                                <th>Department ID</th>
                                <th>Sub Department ID</th>
                                <th>Brand ID</th>
                                <th>Trans Date</th>
                                <th>Trans Time</th>
                                <th>Trans ID</th>
                                <th>User ID</th>
                                <th>PLU</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-danger">number</td>
                                <td class="text-danger">number</td>
                                <td class="text-danger">number</td>
                                <td class="text-danger">number</td>
                                <td class="text-danger">number</td>
                                <td class="text-danger">number</td>
                                <td class="text-danger">date, format (yyyy-mm-dd)</td>
                                <td class="text-danger">time, format (hh:mm)</td>
                                <td class="text-danger">number, max(255)</td>
                                <td class="text-danger">number, max(20)</td>
                                <td class="text-danger">number</td>
                                <td class="text-danger">number</td>
                                <td class="text-danger">number</td>
                                <td class="text-danger">number</td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
