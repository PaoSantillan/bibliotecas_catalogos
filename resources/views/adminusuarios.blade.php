@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                             <li>{{ $error}}</li>
                            @endforeach
                        </ul> 
                    </div>
                @endif
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-group"></i>&nbsp; Administración de usuarios profesores</h6>
                    <h6 class="info-sec-tit mt-3">Creación y administración de usuarios Profesores</h6>
                    <p class="info-seccion-aux">Desde esta sección podrás crear, administrar y eliminar los usuarios con el rol de Profesor.</p>
                    <form method="POST" action="{{ URL::action('ProfesorController@store') }}" enctype="multipart/form-data" class="mt-4 aprobar-form" >
                        @csrf
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="nypdoc" class="form-label">Nombre y apellido del profesor</label>
                                    <input type="text" class="form-control" name="nombre" id="nypdoc" placeholder="Nombre y apellido..." aria-describedby="nypdocHelp" required>
                                    <div id="nypdocHelp" class="form-text">Ej. Juan Marcos Gutierrez</div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="maildoc" class="form-label">Email del profesor</label>
                                    <input type="mail" class="form-control" name="email" id="maildoc" placeholder="email@dominio.com" aria-describedby="" required>
                                    <!-- <div id="nombreclaseHelp" class="form-text">Video estructura atómica</div> -->
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="userdoc" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" name="usuario" id="userdoc" placeholder="Usuario" aria-describedby="" required>
                                    <!-- <div id="horainicioCursoHelp" class="form-text">Ej. 07:00.</div> -->
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="passdoc" class="form-label">Contraseña</label>
                                    <input type="text" class="form-control" name="contrasenia" id="passdoc" placeholder="Nueva clave" value="{{$pass}}" aria-describedby="" required>
                                    <!-- <div id="horainicioCursoHelp" class="form-text">Ej. 07:00.</div> -->
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 mt-4 mt-5">
                                <button type="submit" class="btn btn-primary btn-celeste-dash">Crear usuario</button>
                            </div>
                        </div>
                    </form>
                    <div class="row mt-5">
                        <h6 class="titulo-seccion"><i class="cil-check-circle"></i>&nbsp; Usuarios activos</h6>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-hover tabla-aprobar">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre y apellido </th>
                                            <th scope="col">Curso</th>
                                            <th scope="col">Rol</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user as $u)
                                        <tr>
                                            <td>{{ $u->id }}</td>
                                            <td>{{ $u->name }}</td>
                                            <td>
                                                @foreach($u->course as $c)
                                                    {{ $c->name }} / 
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach($u->roles as $r)
                                                    {{ $r->description }}
                                                @endforeach
                                            </td>
                                            <td>
                                                <form method="post" action="{{ URL::action('ProfesorController@destroy', encrypt($u->id)) }}">
                                                @method('delete')
                                                @csrf 
                                                    @if($u->cookie1 != null || $u->cookie2 != null)
                                                        <a class="mx-2 btn btn-primary" href="{{ URL::action('UsuarioController@resetCookie', encrypt($u->id)) }}" onclick="return confirm('¿Está seguro de resetear la cookie del usuario?\n\nÚltimo reseto fue: {{$u->last_cookie_reset == null ? date("d/m/Y H:m", strtotime($u->last_cookie_reset)) : ''}}');" >
                                                            <i class="cil-lock-unlocked "></i>
                                                        </a>
                                                    @endif
                                                    <a href="{{ URL::action('ProfesorController@edit', encrypt($u->id)) }}" class="mx-2 btn btn-info">
                                                        <i class="cil-pencil"></i>
                                                    </a>
                                                    
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar el agente?');" >
                                                        <i class="cil-trash"></i>
                                                    </button>
                                                </form>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    
@endsection