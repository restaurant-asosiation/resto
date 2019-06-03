@extends('templates.admin.admin_default')

@section('sidebar') {{-- @yield in admin_default --}}
    @include('templates.admin.partials.sidebar_owner', ['restaurant' => $restaurant])
@endsection

@section('title')
<h2>{{ $restaurant->name }}</h2>
@endsection

@section('content')

@endsection
