@extends('templates.admin.admin_default')

@section('sidebar') {{-- @yield in admin_default --}}
    @include('templates.admin.partials.sidebar_admin')
@endsection

@section('title')
<h2>User's Rating</h2>
@endsection

@section('content')
{{-- <div class="card mb-3 border-0">
    <a href="{{ route('owner.restaurant.vacancy.create', $restaurant) }}" class="btn btn-primary mr-0 ml-auto">New Vacancy</a>
</div> --}}

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        User's Rating</div>
    <div class="card-body">
        @include('layouts.alert')
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Resto</th>
                    <th>Rating</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp

                    @foreach ($ratings as $rating)
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ $rating->user->name }}</a></td>
                            <td>{{ $rating->restaurant->name }}</td>
                            <td>{{ $rating->rating }}</td>
                            <td>{{ $rating->comment }}</td>
                            <td>
                                <a href="{{ route('admin.editRating', ['vacancy'=>$vacancy, 'restaurant'=>$restaurant]) }}" class="btn btn-primary"><i class="fas fa-pen-square"></i></a>
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
                        <th>Resto</th>
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
</div>
@endsection
