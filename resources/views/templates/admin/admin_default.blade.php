@include('templates/admin/partials/header')

@yield('sidebar')

<div id="content-wrapper">

  <div class="container-fluid">
    @yield('title')
    <hr>

    @yield('content')
  </div>
  <!-- /.container-fluid -->

  <!-- Sticky Footer -->
  <footer class="sticky-footer">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyleft © Your Website 2019</span>
      </div>
    </div>
  </footer>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

@include('templates/admin/partials/footer')