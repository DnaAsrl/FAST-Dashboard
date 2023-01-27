@extends('layouts.admin_master')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Stock Information
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Stock Code</th>
                        <th>Stock Description</th>
                        <th>ISIN Code</th>
                        <th>Issuer</th>
                        <th>Facility Code</th>
                        <th>Instrument ID</th>
                        <th>Issue Date</th>
                        <th>Maturity Date</th>
                        <th>Currency</th>
                        <th>Currency Exchange Rate</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                
                <tbody>
                    @php
                        $count = 0
                    @endphp
                    @foreach($stocks as $row)
                    <tr>
                        <td>{{ ++$count }}</td>
                        <td>{{ $row->stock_code }}</td>
                        <td>{{ $row->stock_description }}</td>
                        <td>{{ $row->isin_code }}</td>
                        <td>{{ $row->issuer }}</td>
                        <td>{{ $row->facility_code }}</td>
                        <td>{{ $row->instrument_id }}</td>
                        <td>{{ $row->issue_date }}</td>
                        <td>{{ $row->maturity_date }}</td>
                        <td>{{ $row->currency }}</td>
                        <td>{{ $row->currency_exchange_rate }}</td>
                        {{-- <td></td> --}}
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {!! $stocks->links() !!}
        </div>
    </div>
</div>

@endsection