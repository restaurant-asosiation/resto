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
    </div>@endsection

@section('content')
    <form action="{{ route('owner.dashboard.update', $restaurant->id) }}" method="post" enctype="multipart/form-data">
        <div class="card mb-3 px-0 mx-auto">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Edit Vacancy</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name')??$restaurant->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telephone">Telephone</label>
                            <input type="text" name="telephone" id="telephone" value="{{ old('telephone')??$restaurant->telephone }}" class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}">
                            <div class="invalid-feedback">
                                {{$errors->first('telephone')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description')??$restaurant->description }}</textarea>
                            <div class="invalid-feedback">
                                {{$errors->first('description')}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <label for="province">Province</label>
                            <input type="text" name="province" id="province" value="{{ old('province')??$restaurant->province }}" class="form-control {{ $errors->has('province') ? 'is-invalid' : '' }}">
                            <div class="invalid-feedback">
                                {{$errors->first('province')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" id="city" value="{{ old('city')??$restaurant->city }}" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}">
                            <div class="invalid-feedback">
                                {{$errors->first('city')}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">address</label>
                            <textarea name="address" id="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}">{{ old('address')??$restaurant->address }}</textarea>
                            <div class="invalid-feedback">
                                {{$errors->first('address')}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}">
                            <div class="invalid-feedback">
                                {{$errors->first('logo')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer small text-muted">
                <button type="submit" class="btn btn-info mx-1">Save</button>
                <button type="reset" class="btn btn-light mx-1">Reset</button>
            </div>
        </div>
    </form>

    </div> <!-- end container -->
@endsection
