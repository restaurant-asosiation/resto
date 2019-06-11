@extends('templates.admin.admin_default')

@section('navbarUrl')
    {{ route('owner.dashboard.index') }}
@endsection
@section('navbarName')
    {{ auth()->user()->name }}
@endsection

@section('sidebar')
    <div class="container">
@endsection

@section('title')
    <div class="row">
        <div class="col">
            <h2>Restaurants</h2>
        </div>
        <div class="col d-flex justify-content-end">
            <a href="{{ route('owner.dashboard.index') }}" class="btn btn-info align-self-center">Back</a>
        </div>
    </div>
@endsection

@section('content')
    <!-- Icon Cards-->
    <div class="row">
        @foreach ($restaurants as $restaurant)
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            {{-- <i class="fas fa-fw fa-comments"></i> --}}
                        </div>
                        <div class="mr-5">{{ $restaurant->name }}</div>
                    </div>
                    <div class="card-footer text-white z-1">
                        <form action="{{ route('owner.dashboard.destroy', $restaurant->id) }}" method="post">
                        <a href="{{ route('owner.dashboard.edit', ['dashboard'=>$restaurant->id]) }}" class="btn btn-warning" title="edit"><i class="fas fa-pen-square"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" title="delete"><i class="fas fa-minus-square"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card o-hidden h-100">
                <a href="{{ route('owner.dashboard.create') }}" class="card-body bg-light text-danger" style="text-decoration: none">
                    <div class="card-body-icon">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <h4 class="mr-5">New Restaurant</h4>
                </a>
            </div>
        </div>
    </div>

    </div> <!-- end container -->
@endsection
