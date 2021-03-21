<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link c-active" href="/home">
        <i class="c-sidebar-nav-icon cil-book"></i> Catálogos (ejemplares)
    </a>
</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown
    {{ request()->is('mostrarclases/*') ? 'c-show' : '' }}
    {{ request()->is('editarclase/*') ? 'c-show' : '' }}
    {{ request()->is('indexcomentariosclases/*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon cil-room"></i>Bibliotecas
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/indexclases"><span class="c-sidebar-nav-icon"></span> Bibliotecas creadas</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/crearclase"><span class="c-sidebar-nav-icon"></span> Crear biblioteca</a></li>
    </ul>
</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown
    {{ request()->is('mostrarclases/*') ? 'c-show' : '' }}
    {{ request()->is('editarclase/*') ? 'c-show' : '' }}
    {{ request()->is('indexcomentariosclases/*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon cil-description"></i> Tipos de ejemplares
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/indexclases"><span class="c-sidebar-nav-icon"></span> Tipos de ejemplares creados</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/crearclase"><span class="c-sidebar-nav-icon"></span> Crear tipo de ejemplar</a></li>
    </ul>
</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown
    {{ request()->is('mostrarclases/*') ? 'c-show' : '' }}
    {{ request()->is('editarclase/*') ? 'c-show' : '' }}
    {{ request()->is('indexcomentariosclases/*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon cil-book"></i> Ejemplares
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/indexclases"><span class="c-sidebar-nav-icon"></span> Ejemplares creados</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/crearclase"><span class="c-sidebar-nav-icon"></span> Crear ejemplar</a></li>
    </ul>
</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown
    {{ request()->is('profesores/*/edit') ? 'c-show' : '' }}
    {{ request()->is('alumnos/*/edit') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon cil-address-book"></i> Socios
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/profesores"><span class="c-sidebar-nav-icon"></span> Socios creados</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/alumnos"><span class="c-sidebar-nav-icon"></span> Crear socio</a></li>
    </ul>
</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown
    {{ request()->is('profesores/*/edit') ? 'c-show' : '' }}
    {{ request()->is('alumnos/*/edit') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon cil-group"></i> Usuarios
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/profesores"><span class="c-sidebar-nav-icon"></span> Usuarios creados</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/alumnos"><span class="c-sidebar-nav-icon"></span> Crear usuario</a></li>
    </ul>
</li>