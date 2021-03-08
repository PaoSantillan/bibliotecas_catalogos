@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-smile"></i> Crear nuevo estudiante</h6>
                    <p class="info-seccion-aux">Desde este formulario podrás registrar un nuevo alumno:</p>
                    <form method="POST" action="{{ URL::action('AlumnosController@store') }}" enctype="multipart/form-data" class="mt-4 aprobar-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="nombreAlumno" class="form-label">Nombre y apellido del alumno</label>
                                    <input type="text" class="form-control" name="nombreAlumno" id="nombreAlumno" aria-describedby="nombrecursolHelp" required>
                                    <div id="nombrecursolHelp" class="form-text">Ej. Juan.</div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="dniAlumno" class="form-label">DNI del alumno</label>
                                    <input type="text" class="form-control" name="dniAlumno" id="dniAlumno" maxlength="8" aria-describedby="apellidoAlumnoHelp" required>
                                    <div id="apellidoAlumnoHelp" class="form-text">Ej. Castillo.</div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="fecha" class="form-label">Fecha de alta</label>
                                    <input type="date" class="form-control" name="fecha" id="fecha" aria-describedby="horainicioCursoHelp" required>
                                    <div id="horainicioCursoHelp" class="form-text">Ej. 22/05/2021.</div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="emailAlumno" class="form-label">Email de alumno</label>
                                    <input type="mail" class="form-control" name="emailAlumno" id="emailAlumno" aria-describedby="fechafinCursoHelp" required>
                                    <div id="fechafinCursoHelp" class="form-text">Ej. email@ejemplo.com</div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="cursoMatricula" class="form-label">Curso a matricular</label>
                                    <select class="form-control form-select" name="cursoMatricula[]" multiple id="cursoMatricula" aria-label="Default select example" aria-describedby="cursoMatriculaHelp" required>
                                        @foreach ($cursos as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="cursoMatriculaHelp" class="form-text">Ej. Biología.</div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="userAlumno" class="form-label">Usuario de acceso</label>
                                    <input type="text" class="form-control" name="userAlumno" id="userAlumno" aria-describedby="nombrecursolHelp" required>
                                    <div id="nombrecursolHelp" class="form-text">Ej. Juan05.</div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="passAlumno" class="form-label">Contraseña</label>
                                    <input type="text" class="form-control" value="{{$pass}}" name="passAlumno" id="passAlumno" aria-describedby="nombrecursolHelp" required>
                                    <!-- <div id="nombrecursolHelp" class="form-text">Ej. Juan05.</div> -->
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="phone" class="form-control" name="telefono" id="telefono" placeholder="0303456" aria-describedby="nombrecursolHelp" required>
                                    <!-- <div id="nombrecursolHelp" class="form-text">Ej. Juan05.</div> -->
                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $("#cursoMatricula").select2();
    </script>
    
@endsection