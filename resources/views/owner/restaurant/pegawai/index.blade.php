@extends('templates.admin.admin_default')

@section('sidebar')
    @include('templates/admin/partials/sidebar_owner')
@endsection

@section('title')
<h2>Pegawai</h2>
@endsection

@section('content')
<div class="card mb-3 border-0">
    {{--  <a href="{{ route('owner.vacancy.create') }}" class="btn btn-primary mr-0 ml-auto">New Vacancy</a>  --}}
</div>
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
                    <th>NIP</th>
                    <th>Name</th>
                    <th>Telephone</th>
                    <th>Sex</th>
                    <th>Birth Day</th>
                    <th>Address</th>
                    <!-- <th>Image</th> -->
                    <!-- <th>Position</th> -->
                    
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($employees as $employee)
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ $employee->NIP }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->telephone }}</td>
                            <td>{{ $employee->sex }}</td>
                            <td>{{ $employee->birth_day }}</td>
                            <td>{{ $employee->address }}</td>
                            <!-- <td><img src="{{ $employee->image }}" alt=""> </td> -->
                        </tr>
                        @php
                            $no++
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <th>#</th>
                    <th>NIP</th>
                    <th>Name</th>
                    <th>Telephone</th>
                    <th>Sex</th>
                    <th>Birth Day</th>
                    <th>Address</th>
                </tfoot>
            </table>
        </div>
    </div>
    {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
</div>
@endsection
