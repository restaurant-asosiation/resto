<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="container">
    <form action="{{ route('user.resign.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="restaurant_name">Restaurant Name</label>
            <input type="text" name="restaurant_name" id="restaurant_name" class="form-control" value="{{ $restaurant->name }}" disabled>
        </div>
        <div class="form-group">
            <label for="resign_file">Resign File</label>
            <input type="file" name="resign_file" id="resign_file" class="form-control">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="reason">Reason</label>
            <textarea name="reason" id="reason" rows="5" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <input type="submit" value="Resign" class="btn btn-primary">
            <input type="reset" value="Reset" class="btn btn-light">
        </div>
    </form>
</div>

<script src="{{ asset('js/app.js') }}"></script>