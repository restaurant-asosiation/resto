@section('navbarUrl')
    {{ route('admin.dashboard.index')}}
@endsection
@section('navbarName')
    {{ auth()->user()->name }}
@endsection

<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item"
        <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.register.showForm') }}">
            <i class="fas fa-user-plus"></i>
            <span>Register</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-user-times"></i>
            <span>User's Rating</span>
        </a>
    </li>
</ul>