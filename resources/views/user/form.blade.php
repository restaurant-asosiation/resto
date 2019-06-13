@extends('user.default')

@section('content')

<!-- Banner starts here -->
<div class="unit-5" style="background-image: url('{{asset("assets/user/images/hero_bg_2.jpg")}}');">
    <div class="container text-center">
        {{-- <h6>dd</h6> --}}
        <h2 class="mb-0">Complete Your Profile</h2>
        <p class="mb-0 unit-6"><a href="{{ route('user.index') }}" method="POST">Home</a> <span class="sep">></span> <span>Profile</span></p>
    </div>
    <!-- Banner end here -->

    <!-- Form Complete Your Profile starts here -->
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <form action="{{ route('user.update', auth()->id()) }}" class="p-5 bg-white" enctype="multipart/form-data" style="width: 70%; margin: auto;" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="email">Email</label>
                                <input type="text" id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ auth()->user()->email }}"
                                     name="email" disabled>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="username">Nama Lengkap</label>
                                <input type="text" id="username" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ auth()->user()->name }}"
                                    placeholder="Your Username" name="name">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="password">Nomor Handphone</label>
                                <input type="text" id="password" class="form-control {{ $errors->has('telephone') ? 'is-invalid' : '' }}" value="{{ auth()->user()->telephone }}"
                                    placeholder="Your Password" name="telephone">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="username">Alamat</label>
                                <input type="text" id="username" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" value="{{ auth()->user()->address }}"
                                    placeholder="Your Username" name="address">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="gender">Jenis Kelamin</label><br>
                                <input type="radio" name="sex" value="1" @if(old('sex')) checked @endif> Laki-laki <br>
                                <input type="radio" name="sex" value="2" @if(!old('sex')) checked @endif> Perempuan <br>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="username">Tanggal Lahir </label><span>
                                </span>
                                <input type="date" name="birth_day" value="{{ auth()->user()->birth_day }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="fotoprofil">Foto Profil </label>
                                <span></span>
                                <input type="file" name="image"  class="form-control" value="{{ auth()->user()->image }}">
                                {{-- <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="image">
                                    <label class="custom-file-label" for="validatedCustomFile" name="image">{{ auth()->user()->image }}</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <label class="font-weight-bold" for="cv">Upload CV </label>
                                <span></span>
                                <input type="file" name="cv"  class="form-control" value="{{ auth()->user()->cv }}">
                                {{-- <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="validatedCustomFile" name="cv">
                                    <label class="custom-file-label" for="validatedCustomFile" name="cv">{{ auth()->user()->cv }}</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                </div> --}}
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