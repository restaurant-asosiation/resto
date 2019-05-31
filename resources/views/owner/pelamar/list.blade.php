@extends('templates.admin.admin_default')

@section('sidebar')
    @include('templates/admin/partials/sidebar_owner')
@endsection

@section('title')
<h2>Calon Pegawai</h2>
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

                    @foreach ($vacancies as $vacancy)
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ $pelamar->Name }}</td>
                            <td>{{ $pelamar->Address }}</td>
                            <td>{{ $pelamar->Position }}</td>
                            <td>{{ $pelamar->job_desc }}</td>
                            <td>{{ $pelamar->Requirement }}</td>
                            <td>{{ $pelamar->salary }}</td>
                            
                           
                            <td>
                                <a href="{{ route('owner.pelamar.view', $pelamar) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('owner.pelamar.destroy', $pelamar) }}" class="btn btn-primary">Delete</a>
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
