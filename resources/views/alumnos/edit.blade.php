@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-smile"></i> Editar estudiante</h6>
                    <!-- <h6 class="info-sec-tit mt-3">Mi nuevo curso</h6> -->
                    <p class="info-seccion-aux">Desde este formulario podrás registrar un nuevo alumno:</p>
                    <form method="POST" action="{{ URL::action('AlumnosController@update', encrypt($alumno->id)) }}" enctype="multipart/form-data" class="mt-4 aprobar-form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="nombreAlumno" class="form-label">Nombre y apellido del alumno</label>
                                    <input type="text" class="form-control" name="nombreAlumno" id="nombreAlumno" value="{{$alumno->name}}" aria-describedby="nombrecursolHelp">
                                    <div id="nombrecursolHelp" class="form-text">Ej. Juan.</div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="dniAlumno" class="form-label">DNI del alumno</label>
                                    <input type="text" class="form-control" name="dniAlumno" id="dniAlumno" value="{{$alumno->dni}}" maxlength="8" aria-describedby="nombrecursolHelp">
                                    <div id="nombrecursolHelp" class="form-text">Ej. Juan.</div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="emailAlumno" class="form-label">Email de alumno</label>
                                    <input type="mail" class="form-control" value="{{$alumno->email}}" name="emailAlumno" id="emailAlumno" aria-describedby="fechafinCursoHelp">
                                    <div id="fechafinCursoHelp" class="form-text">Ej. email@ejemplo.com</div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="userAlumno" class="form-label">Usuario de acceso</label>
                                    <input type="text" class="form-control" value="{{$alumno->username}}" name="userAlumno" id="userAlumno" aria-describedby="nombrecursolHelp">
                                    <div id="nombrecursolHelp" class="form-text">Ej. Juan05.</div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="passCurso" class="form-label">Contraseña</label>
                                    <input type="text" class="form-control" placeholder="******" name="passCurso" id="passCurso" aria-describedby="nombrecursolHelp">
                                    <!-- <div id="nombrecursolHelp" class="form-text">Ej. Juan05.</div> -->
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="phone" class="form-control" value="{{$alumno->phone}}" name="telefono" id="telefono" aria-describedby="nombrecursolHelp">
                                    <!-- <div id="nombrecursolHelp" class="form-text">Ej. Juan05.</div> -->
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="descripCurso" class="form-label">Foto del alumno</label>
                                <input type="file" name="image" class="dropify" data-height="200" />
                                <a class="btn btn-primary btn-block {{$alumno->photo ? '' : 'disabled'}}" href="{{$alumno->photo ? asset($alumno->photo) : '#!'}}" target="{{$alumno->photo ? '_blank' : ''}}">{{$alumno->photo ? 'Foto actual' : 'No tiene foto'}}</a>
                            </div>
                        </div>
                     
                        <div class="row justify-content-center">
                            <div class="col-lg-12 mt-4">
                                <button type="submit" class="btn btn-primary btn-celeste-dash">Guardar estudiante</button>
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