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
                    <h6 style="text-align:center;">&nbsp; Crear usuario</h6>
                    <form method="POST" action="{{ URL::action('UsuarioController@store') }}" class="mt-4 catalogos-form" >
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Nombre de usuario *</label>
                                    <input type="text" class="form-control" name="username" id="username" aria-describedby="" value="{{old('username')}}" required>
                                    <div id="usernameHelp" class="form-text"><span style="color: red;">Debe ser una sola palabra compuesta únicamente de letras, no caracteres especiales, sin espacios. Por ejemplo: 'fbustos'. </span><br></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre y apellido *</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="emal" class="form-label">Email *</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña *</label>
                                    <input type="password" class="form-control" name="password" id="password" aria-describedby="" value="{{old('password')}}" required>
                                    <div id="passwordHelp" class="form-text"><span style="color: red;">Debe ser una sola palabra, sin espacios, de 6 a 20 caracteres. Se admiten caracteres especiales. Por ejemplo: 'passwordMuni2021'. </span><br></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono </label>
                                    <input type="text" class="form-control" name="telefono" id="telefono" value="{{old('telefono')}}" aria-describedby="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="rol" class="form-label">Elegir rol</label>
                                    <select class="form-control form-select" name="rol" id="rol" aria-label="Default select example" required>
                                        @foreach($roles as $rol)
                                            <option value="{{$rol->id}}">{{$rol->description}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 mt-4 mt-5">
                                <button type="submit" class="btn btn-primary btn-celeste-dash">Crear usuario</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>
@endsection