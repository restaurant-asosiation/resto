@extends('templates.admin.admin_default')

@section('navbarUrl')
    {{ route('owner.index') }}
@endsection
@section('navbarName')
    {{ auth()->user()->name }}
@endsection

@section('sidebar')
    <div class="container">
@endsection

@section('title')
    <h2>Restaurants</h2>
@endsection

@section('content')
    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5">sdfsa</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card o-hidden h-100">
                <a href="" class="card-body bg-light text-danger" style="text-decoration: none">
                    <div class="card-body-icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <h4 class="mr-5">New Restaurant</h4>
                    {{-- <div class="mr-5">New Restaurant</div> --}}
                </a>
            </div>
        </div>
    </div>

    </div> <!-- end container -->
@endsection
