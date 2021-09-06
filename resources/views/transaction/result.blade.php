@extends('layouts/main')

@section('title', 'SalesMate | Sales Transaction')
@section('content')
    <div class="clearfix"></div>
    <div style="overflow-x:auto;">
        <div class="row" style="overflow-x:auto;">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>You Have Been Search By</h2>
                        <ul class="nav nav-right panel_toolbox">
                            <a href="{{ url()->previous() }} " class="glyphicon glyphicon-chevron-left btn btn-info"></a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-sm-6">
                        <p><strong>Vendor :</strong> {{ $vendorName }}</p>
                        <p><strong>Brand :</strong> {{ $brandName }}</p>
                        <p><strong>Department :</strong> {{ $departmentName }}</p>
                        <p><strong>Sub Department :</strong> {{ $subdepartmentName }}</p>
                    </div>
                    <div class="col-sm-6">
                        <p><strong>Site :</strong> {{ $siteName }}</p>
                        <p><strong>Start Date :</strong> {{ $start }}</p>
                        <p><strong>End Date :</strong> {{ $end }}</p>
                    </div>



                </div>
            </div>
        </div>
        <div class="row" style="overflow-x:auto;">
            <div class="col-md-12">
                <div class="x_panel">
                    <table id="transaction" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
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
                            @if (isset($details))
                                @foreach ($details as $transaction)
                                    <tr>
                                        <td>{{ $transaction->transdate }}</td>
                                        <td>{{ $transaction->transtime }}</td>
                                        <td>{{ $transaction->transid }}</td>
                                        <td>{{ $transaction->user_id }}</td>
                                        <td>{{ $transaction->plu }}</td>
                                        <td>{{ $transaction->price }}</td>
                                        <td>{{ $transaction->qty }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="6" style="text-align: center">
                                    <h4>Total</h4>
                                </th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    $(document).ready(function() {
    $('#transaction').DataTable( {
    "footerCallback": function ( row, data, start, end, display ) {
    var api = this.api(), data;

    // Remove the formatting to get integer data for summation
    var intVal = function ( i ) {
    return typeof i === 'string' ?
    i.replace(/[\$,]/g, '')*1 :
    typeof i === 'number' ?
    i : 0;
    };

    // Total over all pages
    qtyTtl = api
    .column( 6 )
    .data()
    .reduce( function (a, b) {
    return intVal(a) + intVal(b);
    }, 0 );
    total = api
    .column( 7 )
    .data()
    .reduce( function (a, b) {
    return intVal(a) + intVal(b);
    }, 0 );

    // Total over this page
    qtyTotal = api
    .column( 6, { page: 'current'} )
    .data()
    .reduce( function (a, b) {
    return intVal(a) + intVal(b);
    }, 0 );
    qtyAmount = api
    .column( 7, { page: 'current'} )
    .data()
    .reduce( function (a, b) {
    return intVal(a) + intVal(b);
    }, 0 );


    // Total filtered rows on the selected column (code part added)
    var sumCol4Filtered = display.map(el => data[el][6]).reduce((a, b) => intVal(a) + intVal(b), 0 );
    var sumCol4Filtered = display.map(el => data[el][7]).reduce((a, b) => intVal(a) + intVal(b), 0 );

    // Update footer
    $( api.column( 6 ).footer() ).html(
    +qtyTotal +'<br>('+ qtyTtl +' total)'
    );
    $( api.column( 7 ).footer() ).html(
    'Rp. '+qtyAmount + '<br>(Rp. '+ total +' total)'
    );
    }
    } );
    } );

@endsection
