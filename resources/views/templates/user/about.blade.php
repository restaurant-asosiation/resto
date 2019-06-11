@extends('templates.user.user_default')

@section('content')
<div class="unit-5 overlay" style="background-image: url('{{ asset("assets/user/images/img_1.jpg") }}');">
    <div class="container text-center">
      <h2 class="mb-0">About</h2>
      <p class="mb-0 unit-6"><a href="index.html">Home</a> <span class="sep">></span> <span>About</span></p>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12 mb-5" data-aos="fade">
          <img src="{{ asset('assets/user/images/img_1.jpg') }}" class="img-md-fluid" alt="Placeholder image">
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="bg-white pl-lg-5 pl-0  pb-lg-5 pb-0" style="padding-top: 18%;">
          <h2 class="font-weight-bold text-black" data-aos="fade">About</h2><br><br>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur atque perferendis, laudantium quod architecto velit ad officiis facere eveniet in fuga fugiat delectus rerum doloribus quos consectetur unde, expedita, quibusdam corporis impedit quia sequi aliquid sit. Ducimus labore molestias odio nam necessitatibus laboriosam vero saepe enim nobis. Repudiandae quidem, sint earum dolorum consequuntur dignissimos excepturi mollitia omnis aliquid, corporis, unde!</p>
          <ul class="site-block-check">
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Dicta doloribus veniam impedit, enim!</li>
            <li>Quod, facilis cupiditate repellat voluptas.</li>
            <li>Quae impedit id maxime fugiat.</li>
            <li>Esse aut iste dolor. In.</li>
          </ul>
          
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END section -->

  <div class="site-section">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center">
          <h2 class="font-weight-bold text-black" data-aos="fade">Our Team</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum magnam illum maiores adipisci pariatur, eveniet.</p>
        </div>
      </div>
      <div class="row top-destination">
        <div class="col-lg-3 col-md-4 col-sm-6 col-12" data-aos="fade">
          <a href="#" class="place">
            <img src="{{ asset('assets/user/images/person_1.jpg') }}" alt="Image placeholder">
            <h2>Michelle Megan</h2>
            <p>CEO, Co-founder</p>
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12" data-aos="fade">
          <a href="#" class="place">
            <img src="{{ asset('assets/user/images/person_2.jpg') }}" alt="Image placeholder">
            <h2>Mike Stellar</h2>
            <p>CTO Co-founder</p>
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12" data-aos="fade">
          <a href="#" class="place">
            <img src="{{ asset('assets/user/images/person_3.jpg') }}" alt="Image placeholder">
            <h2>Gregg White</h2>
            <p>VP Producer</p>
          </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-12" data-aos="fade">
          <a href="#" class="place">
            <img src="{{ asset('assets/user/images/person_4.jpg') }}" alt="Image placeholder">
            <h2>Rogie Knitt</h2>
            <p>Project Manager</p>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- END section -->
@endsection