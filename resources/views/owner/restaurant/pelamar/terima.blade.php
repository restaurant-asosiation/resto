@extends('templates.admin.admin_default')

@section('title')
<h2>Penerimaan</h2>
@endsection

@section('content')
<div class="card mb-3 border-0">
    <a href="{{ route('owner.vacancy.create') }}" class="btn btn-primary mr-0 ml-auto">New Vacancy</a>
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
                    <th>Table</th>
                    <th>Biodata</th>
                    
                </thead>
                <tbody>
                    @php
                        $no = 1;
                 @endphp

                    
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                   

                    @foreach ($vacancies as $vacancy)
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ $vacancy->position }}</td>
                            <td>{{ $vacancy->job_desc }}</td>
                            <td>{{ $vacancy->requirement }}</td>
                            <td>{{ $vacancy->salary }}</td>
                            <td>
                                <form action="{{ route('owner.vacancy.destroy', $vacancy) }}" method="post">
                                <a href="{{ route('owner.vacancy.edit', $vacancy) }}" class="btn btn-primary"><i class="fas fa-pen-square"></i></a>
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-minus-square"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $no++
                        @endphp
                        <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                   
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Table</th>
                        <th>Biodata</th>
                       
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
</div>
@endsection
