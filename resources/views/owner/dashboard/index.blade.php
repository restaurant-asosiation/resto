@extends('templates.admin.admin_default')

@section('navbarUrl')
    {{ route('owner.', auth()->user()) }}
@endsection
@section('navbarName')
    Owner
@endsection

@section('sidebar')
    {{-- @include('templates.admin.partials.sidebar_owner') --}}
    <div class="container">
@endsection
@section('title')
    <h2>Job Vacancy</h2>
@endsection
        
@section('content')
        
    </div>
@endsection
