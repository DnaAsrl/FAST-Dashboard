@extends('layouts.admin_master')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        More Auction Calendar
        {{-- <a class="btn btn-success float-right" type="button" href="auctionList/search" target="_blank">Search</a> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Issues</th>
                        <th>Target Quarter</th>
                        <th>Target Month</th>
                        <th>Target Year</th>
                        <th>Issue Date</th>
                        <th>Amount (RM Million)</th>
                        <th>Remarks</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                
                <tbody>
                    @php
                        $count = 0
                    @endphp
                	@foreach($data as $row)
                    <tr>
                        <td>{{ ++$count }}</td>
                        <td>{{ $row->issues }}</td>
                        <td>{{ $row->target_quarter }}</td>
                        <td>{{ $row->target_month }}</td>
                        <td>{{ $row->target_year }}</td>
                        <td>{{ $row->issue_date }}</td>
                        <td>{{ $row->amount }}</td>
                        <td>{{ $row->remarks }}</td>
                        {{-- <td></td> --}}
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {!! $data->links() !!}
        </div>
    </div>
</div>

@endsection