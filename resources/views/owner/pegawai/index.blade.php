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
                    <th>Address</th>
                    <th>Position</th>
                    <th>Job Description</th>
                    <th>Requirement</th>
                    <th>Salary</th>
                    <th>Action</th>
                    
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($vacancies as $pegawai)
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ $pegawai->NIP }}</td>
                            <td>{{ $pegawai->name }}</td>
                            <td>{{ $pegawai->address }}</td>
                            <td>{{ $pegawai->position }}</td>
                            <td>{{ $pegawai->job_desc }}</td>
                            <td>{{ $pegawai->requirement }}</td>
                            <td>{{ $pegawai->salary }}</td>
                            <td>
                            
                                <a href="{{ route('owner.pegawai.terima', $pegawai) }}" class="btn btn-primary">Terima</a>
                                <a href="{{ route('owner.pegawai.destroy', $pegawai) }}" class="btn btn-primary">Delete</a>
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
                         <th>NIP</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Position</th>
                    <th>Job Description</th>
                    <th>Requirement</th>
                    <th>Salary</th>
                    <th>Action</th>
                       
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
</div>
@endsection
