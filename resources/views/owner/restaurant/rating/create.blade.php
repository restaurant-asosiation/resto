@extends('templates.admin.admin_default')

@section('sidebar')
    @include('templates.admin.partials.sidebar_owner')
@endsection

@section('title')
<h2>Add Rating</h2>
@endsection

@section('content')

<form action="{{ route('owner.restaurant.rating.store', [$restaurant, $user]) }}" method="post">
    <div class="col-md-6 ml-auto mr-auto">
        <div class="card mb-3 px-0 mx-auto">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Input Rating
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label><br>
                            {{-- Rate input --}}
                            <div class="d-flex">
                                <div class="rate">
                                    <input type="radio" id="star5" name="rate" value="5" class="form-control"><label for="star5" title="5">5 stars</label>
                                    <input type="radio" id="star4" name="rate" value="4" class="form-control"><label for="star4" title="4">4 stars</label>
                                    <input type="radio" id="star3" name="rate" value="3" class="form-control"><label for="star3" title="3">3 stars</label>
                                    <input type="radio" id="star2" name="rate" value="2" class="form-control"><label for="star2" title="2">2 stars</label>
                                    <input type="radio" id="star1" name="rate" value="1" class="form-control"><label for="star1" title="1">1 star</label>
                                </div>
                            </div>
                            {{-- end rate input --}}
                        </div>
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <input type="text" name="comment" id="comment" value="{{ old('comment') }}" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}">
                            <div class="invalid-feedback">
                                {{$errors->first('comment')}}
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
    </div>
</form>
@endsection
