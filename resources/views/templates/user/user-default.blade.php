@include('templates/user/partials/_head')

<body>
    <div class="site-wrap">
      <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div> <!-- .site-mobile-menu -->

    @include('templates/user/partials/_header')

    @yield('content')

    @include('templates/user/partials/_footer')

</div>

@include('templates/user/partials/_scripts')

</body>
