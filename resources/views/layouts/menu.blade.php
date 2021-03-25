<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link c-active" href="/ejemplares">
        <i class="c-sidebar-nav-icon cil-book"></i> Catálogo de ejemplares
    </a>
</li>
@auth
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown
    {{ request()->is('bibliotecas/*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon cil-room"></i>Bibliotecas
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/"><span class="c-sidebar-nav-icon"></span> Bibliotecas creadas</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/"><span class="c-sidebar-nav-icon"></span> Crear biblioteca</a></li>
    </ul>
</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown
    {{ request()->is('tiposEjemplares/*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon cil-description"></i> Tipos de ejemplares
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/"><span class="c-sidebar-nav-icon"></span> Tipos de ejemplares creados</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/"><span class="c-sidebar-nav-icon"></span> Crear tipo de ejemplar</a></li>
    </ul>
</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown
    {{ request()->is('ejemplares/*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon cil-book"></i> Ejemplares
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/"><span class="c-sidebar-nav-icon"></span> Ejemplares creados</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/"><span class="c-sidebar-nav-icon"></span> Crear ejemplar</a></li>
    </ul>
</li>
@if(Auth::user()->hasRole('admin'))
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown
    {{ request()->is('usuarios/*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon cil-group"></i> Usuarios
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/usuarios"><span class="c-sidebar-nav-icon"></span> Usuarios creados</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/usuarios/crear"><span class="c-sidebar-nav-icon"></span> Crear usuario</a></li>
    </ul>
</li>
@endif
@endauth