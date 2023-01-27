@extends('layouts.admin_master')

@section('content')

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        All Announcement
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>News ID</th>
                        <th>Embargo Date</th>
                        <th>Organisation Name</th>
                        <th>News Type</th>
                        <th>News Subject</th>
                        <th>News Summary</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                
                <tbody>
                    @php
                        $count = 0
                    @endphp
                    @foreach($announcements as $row)
                    <tr>
                        <td>{{ ++$count }}</td>
                        <td>{{ $row->news_id }}</td>
                        <td>{{ $row->embargo_date }}</td>
                        <td>{{ $row->organisation_name }}</td>
                        <td>{{ $row->news_type }}</td>
                        <td>{{ $row->news_subject }}</td>
                        <td>{{ $row->news_summary }}</td>
                        {{-- <td></td> --}}
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
            {!! $announcements->links() !!}
        </div>
    </div>
</div>

@endsection