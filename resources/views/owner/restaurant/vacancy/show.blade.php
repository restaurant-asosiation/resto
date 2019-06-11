@extends('templates.admin.admin_default')

@section('sidebar') {{-- @yield in admin_default --}}
    @include('templates.admin.partials.sidebar_owner', ['restaurant' => $restaurant])
@endsection

@section('title')
<h2>Recruitment</h2>
@endsection

@section('content')
{{-- <div class="card mb-3 border-0">
    <a href="{{ route('owner.restaurant.vacancy.create', $restaurant) }}" class="btn btn-primary mr-0 ml-auto">New Vacancy</a>
</div> --}}

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
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Sex</th>
                    <th>Birth Day</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>CV</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($employees as $employee)
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->telephone }}</td>
                            <td>{{ $employee->sex }}</td>
                            <td>{{ $employee->birth_day }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->image }}</td>
                            <td>{{ $employee->cv }}</td>
                            <td>
                                <a href="{{ route('owner.restaurant.vacancy.edit') }}" class="btn btn-primary" title="Apply">
                                    <i class="fas fa-check"></i>
                                </a>
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
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Sex</th>
                        <th>Birth Day</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>CV</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
</div>
@endsection
