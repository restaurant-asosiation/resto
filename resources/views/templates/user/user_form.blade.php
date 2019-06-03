@extends('templates.user.user_default')

@section('content')

<!-- Banner starts here -->
<div class="unit-5" style="background-image: url('{{asset("assets/user/images/hero_bg_2.jpg")}}');">
    <div class="container text-center">
        <h2 class="mb-0">Complete Your Profile</h2>
        <p class="mb-0 unit-6"><a href="{{ route('user.index') }}" method="POST">Home</a> <span class="sep">></span> <span>Profile</span></p>
    </div>
    <!-- Banner end here -->

    <!-- Form Complete Your Profile starts here -->
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <form action="{{ route('user.store') }}" class="p-5 bg-white" enctype="multipart/form-data" style="width: 70%; margin: auto;" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="username">Nama Lengkap</label>
                                <input type="text" id="username" class="form-control {{ $errors->has('fullname') ? 'is-invalid' : '' }}" value="{{ old('fullname') }}"
                                    placeholder="Your Username" name="name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="password">Nomor Handphone</label>
                                <input type="text" id="password" class="form-control {{ $errors->has('phonenumber') ? 'is-invalid' : '' }}" value="{{ old('phonenumber') }}"
                                    placeholder="Your Password" name="telephone">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="username">Alamat</label>
                                <input type="text" id="username" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" value="{{ old('address') }}"
                                    placeholder="Your Username" name="address">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="gender">Jenis Kelamin</label><br>
                                <input type="radio" name="sex" value="male"> Laki-laki <br>
                                <input type="radio" name="sex" value="female"> Perempuan <br>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="username">Tanggal Lahir </label><span>
                                </span>
                                <input type="date" name="birth_day">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="username">Foto Profil </label><span>
                                </span>
                                <input type="file" name="image">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="username">Upload CV </label><span>
                                </span>
                                <input type="file" name="cv">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form Complete Your Profile end here -->

</div>
    
@endsection