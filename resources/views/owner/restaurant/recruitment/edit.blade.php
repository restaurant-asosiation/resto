@extends('templates.admin.admin_default')

@section('sidebar')
    @include('templates.admin.partials.sidebar_owner', ['restaurant' => $restaurant])
@endsection

@section('title')
<h2>New Vacancy</h2>
@endsection

@section('content')

<form action="{{ route('owner.restaurant.vacancy.recruitment.update', [$restaurant, $vacancy, $user]) }}" method="post">
    <div class="card mb-3 px-0 mx-auto">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Input New Vacancy</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" name="nip" id="nip" value="{{ old('nip')??$user->nip }}" class="form-control {{ $errors->has('nip') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">
                            {{$errors->first('nip')}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name')?? $user->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">
                        <div class="invalid-feedback">
                            {{$errors->first('name')}}
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
@endsection
