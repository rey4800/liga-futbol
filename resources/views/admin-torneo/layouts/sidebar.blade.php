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
        <li><a class="nav-link" href="{{ route('partido.index',$torneo->id)}}"><i class="fa-solid fa-futbol"></i></i><span>Gestionar Partidos</span></a></li>
        <li class="menu-header">Starter</li>

        <li><a class="nav-link" href="{{ route('torneo.index') }}"><i class="fa-solid fa-left-long"></i> <span>Regresar</span></a></li>
       
        </aside>
  </div>