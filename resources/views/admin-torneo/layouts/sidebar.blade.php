<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">Liga Futbol</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('dashboard') }}">LF</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Administrar Torneo</li>
        <li><a class="nav-link" href="{{ route('torneo.show', $torneo->id) }}"><i class="fa-solid fa-trophy"></i><span>{{ $torneo->nombre }}</span></a></li>
        <li><a class="nav-link" href="{{ route('equiposinscrito.index',$torneo->id)}}"><i class="fa-regular fa-clipboard"></i><span>Gestionar Inscripciones</span></a></li>
        <li class="menu-header">Starter</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
          </ul>
        </li>
        <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>

        <li><a class="nav-link" href="{{ route('torneo.index') }}"><i class="fa-solid fa-left-long"></i> <span>Regresar</span></a></li>
       
        </aside>
  </div>