@extends('layouts.admin_master')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Facility Information
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Facility Code</th>
                        <th>Facility Description</th>
                        <th>Isuuer</th>
                        <th>Facility Agent</th>
                        <th>Principle</th>
                        <th>Maturity Date</th>
                        <th>Instrument ID</th>
                    </tr>
                </thead>
                
                <tbody>
                    @php
                        $count = 0
                    @endphp
                    @foreach($facilities as $row)
                    <tr>
                        <td>{{ ++$count }}</td>
                        <td>{{ $row->facility_code }}</td>
                        <td>{{ $row->facility_description }}</td>
                        <td>{{ $row->issuer }}</td>
                        <td>{{ $row->facility_agent }}</td>
                        <td>{{ $row->principle }}</td>
                        <td>{{ $row->maturity_date }}</td>
                        <td>{{ $row->instrument_id }}</td>
                        {{-- <td></td> --}}
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {!! $facilities->links() !!}
        </div>
    </div>
</div>

@endsection