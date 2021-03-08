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
                    <form method="POST" action="{{ URL::action('ProfesorController@update', $prof->id) }}" enctype="multipart/form-data" class="mt-4 aprobar-form" >
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="nypdoc" class="form-label">Nombre y apellido del profesor</label>
                                    <input type="text" class="form-control" name="nombre" id="nypdoc" aria-describedby="nypdocHelp" value="{{$prof->name}}" required>
                                    <div id="nypdocHelp" class="form-text">Ej. Juan Marcos Gutierrez</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="maildoc" class="form-label">Email del profesor</label>
                                    <input type="mail" class="form-control" name="email" id="maildoc" aria-describedby="" value="{{$prof->email}}" required>
                                    <!-- <div id="nombreclaseHelp" class="form-text">Video estructura atómica</div> -->
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="userdoc" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" name="usuario" id="userdoc" aria-describedby="" value="{{$prof->username}}" required>
                                    <!-- <div id="horainicioCursoHelp" class="form-text">Ej. 07:00.</div> -->
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="passdoc" class="form-label">Contraseña</label>
                                    <input type="text" class="form-control" name="contrasenia" id="passdoc" placeholder="******" aria-describedby="">
                                    <!-- <div id="horainicioCursoHelp" class="form-text">Ej. 07:00.</div> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="descripCurso" class="form-label">Foto del profesor</label>
                                <input type="file" name="image" class="dropify" data-height="200" />
                                <a class="btn btn-primary btn-block {{$prof->photo ? '' : 'disabled'}}" href="{{$prof->photo ? asset($prof->photo) : '#!'}}" target="{{$prof->photo ? '_blank' : ''}}">{{$prof->photo ? 'Foto actual' : 'No tiene foto cargada'}}</a>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 mt-4 mt-5">
                                <button type="submit" class="btn btn-primary btn-celeste-dash">Editar usuario</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script> 
<script src="{{ asset('js/dropify.min.js') }}"></script>
<script>
    $('.dropify').dropify({
        messages: {
            'default': 'Subir archivo',
             'replace': 'Dejar archivos o hacer click para reemplazar',
             'remove':  'Quitar',
            //  'error':   'Ooops, something wrong happended.'
         }
    });
</script>
@endsection