<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>My Employee</span></a>
    </li>
    <li class="nav-item 
      @if (Request::is('owner/locker','owner/locker/*'))
        active
      @endif">
      <a class="nav-link" href="{{ route('owner.vacancy.index') }}">
        <i class="fas fa-briefcase"></i>
        <span>Job Vacancy</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Recruitment</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Resign</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Rating</span></a>
    </li>
  </ul>