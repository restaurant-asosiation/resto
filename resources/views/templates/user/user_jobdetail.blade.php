@extends('templates.user.user_default')

@section('content')

<div class="unit-5 overlay" style="background-image: url('{{ asset("assets/user/images/hero_bg_2.jpg") }}');">
    <div class="container text-center">
      <h2 class="mb-0">Job Details</h2>
      <p class="mb-0 unit-6"><a href="index.html">Home</a> <span class="sep">></span> <span>Job Detail</span></p>
    </div>
</div>

<div class="site-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8 mb-5">        
          <div class="p-5 bg-white">
            <div class="mb-4 mb-md-5 mr-5">
             <div class="job-post-item-header d-flex align-items-center">
               <h2 class="mr-3 text-black h4">{{ $vacancy->position }}</h2>
               <div class="badge-wrap">
                <span class="bg-danger text-white badge py-2 px-4">{{ $vacancy->restaurant->name }}</span>
               </div>
             </div>
             <div class="job-post-item-body d-block d-md-flex">
               <div class="mr-3"><span class="fl-bigmug-line-portfolio23"><span> </span>{{ $vacancy->salary }}</span></div>
               <div><span class="fl-bigmug-line-big104"></span> <span>{{ $vacancy->restaurant->city }}</span></div>
             </div>
            </div>
            
            <h3>Job Description</h3><br>
            <p>{{ $vacancy->job_desc }}</p><br>
            
            <h3>Requirement</h3><br>
            <p>{{ $vacancy->requirement }}</p>
            
            <p class="mt-5"><a href="{{ route('user.edit', auth()->id() )}}" class="btn btn-primary  py-2 px-4">Apply Job</a></p>
            {{-- <p class="mt-5"><a href="#" class="btn btn-primary  py-2 px-4">Apply Job</a></p> --}}
          </div>
        </div>

        <div class="col-lg-4">
          <div class="p-4 mb-3 bg-white">
            <h3 class="h5 text-black mb-3">More Info</h3>
            <p>{{ $vacancy->restaurant->name }}</p>
            <p>{{ $vacancy->restaurant->address }}</p>
            <p>{{ $vacancy->restaurant->city }}<span> , </span>{{ $vacancy->restaurant->province }}</p>
            <p>{{ $vacancy->restaurant->telephone }}</p>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

