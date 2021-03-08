@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-briefcase"></i> Edición de cursos</h6>
                    <form method="POST" action="{{ URL::action('CursoController@update', $curso->id) }}" enctype="multipart/form-data" class="mt-4 aprobar-form">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="nombreCurso" class="form-label">Nombre del curso</label>
                                    <input type="text" class="form-control" name="name" id="nombreCurso" value="{{$curso->name}}" placeholder="Elige un nombre que represente el contenido del curso..." aria-describedby="nombrecursolHelp">
                                    <div id="nombrecursolHelp" class="form-text">Puedes usar letras (A - Z) y números (0 - 9).</div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="fechainicioCurso" class="form-label">Disponible desde</label>
                                    <input type="date" class="form-control" name="init_date" id="fechainicioCurso" value="{{$curso->init_date}}" aria-describedby="fechainicioCursoHelp">
                                    <div id="fechainicioCursoHelp" class="form-text">Ej. 12/05/20</div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="horainicioCurso" class="form-label">Hora inicio</label>
                                    <input type="time" class="form-control" name="hora_init_date" id="horainicioCurso" value="{{$curso->hora_init_date}}" placeholder="" aria-describedby="horainicioCursoHelp">
                                    <div id="horainicioCursoHelp" class="form-text">Ej. 07:00.</div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="fechafinCurso" class="form-label">Disponible hasta</label>
                                    <input type="date" class="form-control" name="end_date" id="fechafinCurso" value="{{$curso->end_date}}" aria-describedby="fechafinCursoHelp">
                                    <div id="fechafinCursoHelp" class="form-text">Ej.15/05/20</div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="horafinCurso" class="form-label">Hora fin</label>
                                    <input type="time" class="form-control" name="hora_end_date" id="horafinCurso" value="{{$curso->hora_end_date}}" placeholder="" aria-describedby="horafinCursoHelp">
                                    <div id="horafinCursoHelp" class="form-text">Ej. 10:00.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <!--<div class="mb-3">
                                    <label for="docenteCurso" class="form-label">Docente a cargo</label>
                                    <select class="form-control form-select" name="user_id" id="docenteCurso" aria-label="Default select example" aria-describedby="docenteCursoHelp">
                                        @if($curso->user_id == null)
                                            <option value="" selected disabled>Seleccione una opción...</option>
                                        @endif
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" {{ ( $user->id == $curso->user_id) ? 'selected' : '' }}>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    <div id="docenteCursoHelp" class="form-text">Ej. Juan Perez.</div>
                                </div>
                                <div class="row">
                                    <label for="precio" class="form-label">Precio</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control" id="precio" value="{{$curso->price}}" aria-describedby="precioHelp" name="ingresosTutor" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>-->
                                <div class="mt-3 mb-3">
                                    <label for="descripCurso" class="form-label">Descripción breve</label>
                                    <textarea id="textarea" rows="3" class="form-control" name="description" id="descripCurso" placeholder="Describe las características del curso..." aria-describedby="descripCursoHelp">{{$curso->description}}</textarea>
                                    <div id="descripCursoHelp" class="form-text"><span style="color: red;">Debes usar el caracter # como separador. Por ejemplo: '#20 horas de clases #Exámenes'. </span><br>Puedes usar letras (A - Z), números (0 - 9) y caracteres especiales.</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!--<div class="row">
                                    <label for="precio" class="form-label">Precio</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="precio" aria-describedby="precioHelp" name="ingresosTutor">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>-->
                                <div class="mt-3 mb-3">
                                    <label for="transCurso" class="form-label">Descripción transferencia</label>
                                    <textarea id="textarea" rows="3" class="form-control" name="transCurso" placeholder="Describe las características del curso..." aria-describedby="descripCursoHelp">{{$curso->cbu}}</textarea>
                                    <div id="descripCursoHelp" class="form-text"><span style="color: red;">Debes usar el caracter # como separador. Por ejemplo: '#C.B.U.: 0001454578#Alias: gato.perro.canario'. </span><br>Puedes usar letras (A - Z), números (0 - 9) y caracteres especiales.</div>
                                </div>
                            </div>
                            <!--<div class="col-lg-6">-->
                                <!-- <div class="row"> -->
                                <!--<div class="col-lg-5">
                                    <label for="descripCurso" class="form-label">Carátula del curso</label>
                                    @if($curso->image == null)
                                        <img src="{{ asset('img/img-example.svg')}}" alt="">
                                    @else
                                        <img src="{{ asset('storage/cursos/'.$curso->image)}}" alt="">
                                    @endif
                                </div>
                                <label for="descripCurso" class="form-label">Reemplazar carátula del curso</label>
                                <input type="file" name="image" class="dropify" data-height="200" />-->
                                    <!-- <div class="col-lg-5">
                                        <img src="{{ asset('img/img-example.svg')}}" alt="">
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="row">
                                            <div id="imagenCursoHelp" class="form-text">Elige una imagen de presentación de tu curso.</div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-12">

                                                <button class="btn btn-outline-dark btn-subir">Subir una imagen &nbsp; <i class="cil-data-transfer-up"></i></button>
                                            </div>
                                            <!-- <input class="form-control" type="file" id="imagenCurso" aria-describedby="imagenCursoHelp"> 
                                        </div>
                                    </div> -->
                                <!-- </div> -->
                            <!--</div>-->
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 mt-4">
                                <button type="submit" class="btn btn-primary btn-celeste-dash">Guardar curso</button>
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