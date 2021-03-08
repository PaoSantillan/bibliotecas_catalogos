<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link c-active" href="/home">
        <i class="c-sidebar-nav-icon cil-home"></i> Inicio
    </a>
</li>
<li class="c-sidebar-nav-title">
    @if(Auth::user()->hasRole('alumno'))
        <h6>Cursos</h6>
    @else
        <h6>Administración de cursos</h6>
    @endif
</li>
@if(Auth::user()->hasRole('alumno'))
<li class="c-sidebar-nav-item ">
    <a class="c-sidebar-nav-link " href="/indexcursosalumno">
        <i class="c-sidebar-nav-icon cil-briefcase"></i> Cursos
    </a>
</li>
@else
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown 
    {{ request()->is('editarcursogeneral/*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon cil-gift"></i> Promocionales
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link c-active" href="/indexcursosgenerales"><span class="c-sidebar-nav-icon"></span> Promocionales creados</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/crearcursogeneral"><span class="c-sidebar-nav-icon"></span> Crear promocional</a></li>
    </ul>
</li>
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown 
    {{ request()->is('editarcurso/*') ? 'c-show' : '' }}
    {{ request()->is('matriculacion/*') ? 'c-show' : '' }}
    {{ request()->is('indexcomentarioscursos/*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon cil-briefcase"></i> Cursos
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link c-active" href="/indexcursos"><span class="c-sidebar-nav-icon"></span> Cursos creados</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/crearcurso"><span class="c-sidebar-nav-icon"></span> Crear curso</a></li>
    </ul>
</li>
@endif
@if(Auth::user()->hasRole('alumno'))
<li class="c-sidebar-nav-item ">
    <a class="c-sidebar-nav-link " href="/indexclasesalumno">
        <i class="c-sidebar-nav-icon cil-video"></i> Clases
    </a>
</li>
@else
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
@endif
@if(!Auth::user()->hasRole('alumno'))
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
@endif
@if(Auth::user()->hasRole('alumno'))
<li class="c-sidebar-nav-item ">
    <a class="c-sidebar-nav-link " href="/indexcontenidosalumno">
        <i class="c-sidebar-nav-icon cil-puzzle"></i> Contenidos
    </a>
</li>
@else
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown
    {{ request()->is('editarcontenido/*') ? 'c-show' : '' }}">
    <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
        <i class="c-sidebar-nav-icon cil-puzzle"></i> Contenidos
    </a>
    <ul class="c-sidebar-nav-dropdown-items">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/indexcontenidos"><span class="c-sidebar-nav-icon"></span> Contenidos subidos</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="/crearcontenido"><span class="c-sidebar-nav-icon"></span> Subir contenido</a></li>
    </ul>
</li>
@endif
@if(!Auth::user()->hasRole('alumno'))
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="/comprobantes">
        <i class="c-sidebar-nav-icon cil-face"></i> Comprobantes
    </a>
</li>
@endif
<!--<li class="c-sidebar-nav-title"> 
    <h6>Gestión de cuenta</h6>
</li>
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="">
        <i class="c-sidebar-nav-icon cil-face"></i> Mi perfil
    </a>
</li>-->
<!--<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="">
        <i class="c-sidebar-nav-icon cil-credit-card"></i> Pagar cuenta
    </a>
</li>
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="">
        <i class="c-sidebar-nav-icon cil-envelope-closed"></i> Mensajes
    </a>
</li>-->
<li class="c-sidebar-nav-item">
    <a class="c-sidebar-nav-link" href="">
        <i class="c-sidebar-nav-icon cil-find-in-page"></i> Ayuda
    </a>
</li>