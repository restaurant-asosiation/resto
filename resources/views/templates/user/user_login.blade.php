@extends('templates.user.user_default')

@section('content')

<!-- Background with navigation starts here -->
<div class="unit-5 overlay" style="background-image: url('{{ asset("assets/user/images/hero_bg_2.jpg") }}');">
    <div class="container text-center">
        <h2 class="mb-0">Login</h2>
        <p class="mb-0 unit-6"><a href="index.html">Home</a> <span class="sep">></span> <span>Login</span></p>
    </div>
</div>
<!-- Background with navigation end here -->

<!-- Form Login starts here -->
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 mb-5">
                <form action="#" class="p-5 bg-white" style="margin: auto; width: 50%">
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="username">Username</label>
                            <input type="text" id="username" class="form-control" placeholder="Your Username">
                        </div>
                    </div>
                    <div class="row form-group mb-5">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="password">Password</label>
                            <input type="password" id="password" class="form-control"
                                placeholder="Your Password">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Login" class="btn btn-primary" style="padding: auto">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Form Login end here -->

</div>
    
@endsection