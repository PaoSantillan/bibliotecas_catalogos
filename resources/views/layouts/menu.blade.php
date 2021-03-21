<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link c-active" href="/home">
        <i class="c-sidebar-nav-icon cil-home"></i> Inicio
    </a>
</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown
    {{ request()->is('mostrarclases/*') ? 'c-show' : '' }}
    {{ request()->is('editarclase/*') ? 'c-show' : '' }}
    {{ request()->is('indexcomentariosclases/*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon cil-video"></i> Clases
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/indexclases"><span class="c-sidebar-nav-icon"></span> Clases subidas</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/crearclase"><span class="c-sidebar-nav-icon"></span> Subir clase</a></li>
    </ul>
</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown
    {{ request()->is('profesores/*/edit') ? 'c-show' : '' }}
    {{ request()->is('alumnos/*/edit') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon cil-group"></i> Usuarios
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/profesores"><span class="c-sidebar-nav-icon"></span> Profesores</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/alumnos"><span class="c-sidebar-nav-icon"></span> Estudiantes</a></li>
    </ul>
</li>