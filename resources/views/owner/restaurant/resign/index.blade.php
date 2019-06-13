@extends('templates.admin.admin_default')

@section('sidebar') {{-- @yield in admin_default --}}
    @include('templates.admin.partials.sidebar_owner', ['restaurant' => $restaurant])
@endsection

@section('title')
<h2>Resign</h2>
@endsection

@section('content')
<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Table Example</div>
    <div class="card-body">
        @include('layouts.alert')
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>#</th>
					<th>Name</th>
					<th>Date</th>
					<th>Reason</th>
					<th>Resign_Status</th>
					<th>PDF</th>
					<th>Actions</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($resigns as $resign)
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ $resign->user->name }}</td>
                            <td>{{ $resign->date }}</td>
                            <td>{{ $resign->reason }}</td>
                            <td>{{ $resign->resign_status }}</td>
                            <td><a href="{{ route('owner.restaurant.resign.show', [$restaurant, $resign]) }}">Download</a></td>
                            <td>
                                <a href="{{ route('owner.restaurant.rating.create', [$restaurant, $resign->user]) }}" class="btn btn-primary" title="Accept"><i class="fas fa-check"></i></a> {{-- accept and redirect to rating form --}}
                                <a href="" class="btn btn-danger" title="Reject"><i class="fas fa-times"></i></a> {{-- acept --}}
                            </td>
                        </tr>
                        @php
                            $no++
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Reason</th>
                        <th>Resign_Status</th>
                        <th>PDF</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
</div>
@endsection
