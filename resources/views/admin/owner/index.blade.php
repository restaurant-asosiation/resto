<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Position</th>
                            <th scope="col">Job Description</th>
                            <th scope="col">Requirement</th>
                            <th scope="col">Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp

                        @foreach ($lockers as $locker)
                        <tr>
                            <th scope="row">{{ $no }}</th>
                            <td>{{ $locker->position }}</td>
                            <td>{{ $locker->job_desc }}</td>
                            <td>{{ $locker->requirement }}</td>
                            <td>{{ $locker->salary }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <form action="">
                    <div class="form-group">
                        <label for="">Position</label>
                        <input type="text" name="position" id="position">
                    </div>
                    <div class="form-group">
                        <label for="">job desk</label>
                        <textarea name="" id="" cols="30" rows="10"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
</body>

</html>
