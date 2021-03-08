@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-briefcase"></i> Editar promocional</h6>
                    <h6 class="info-sec-tit mt-3">Mi promocional</h6>
                    <form method="POST" action="{{ URL::action('CursoGeneralController@update', $curso->id) }}" enctype="multipart/form-data" class="mt-4 aprobar-form">
                    @csrf
                    @method('PUT')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="nombreCurso" class="form-label">Nombre del promocional</label>
                                    <input type="text" class="form-control" name="name" id="nombreCurso" value="{{$curso->name}}" placeholder="Elige un nombre que represente el promocional..." aria-describedby="nombrecursolHelp" required>
                                    <div id="nombrecursolHelp" class="form-text">Puedes usar letras (A - Z) y números (0 - 9).</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="nombreCurso" class="form-label">Institución</label>
                                    <input type="text" class="form-control" name="institucion" id="nombreCurso" value="{{$curso->institucion}}" placeholder="Ingresa el nombre de la institución..." aria-describedby="nombrecursolHelp" >
                                    <div id="nombrecursolHelp" class="form-text">Puedes usar letras (A - Z) y números (0 - 9).</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="nombreCurso" class="form-label">Código</label>
                                    <input type="text" class="form-control" name="code" id="nombreCurso" value="{{$curso->code}}" placeholder="Ingresa el código correspondiente..." aria-describedby="nombrecursolHelp" >
                                    <div id="nombrecursolHelp" class="form-text">Puedes usar letras (A - Z) y números (0 - 9).</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mt-3 mb-3">
                                    <label for="descripCurso" class="form-label">Descripción breve</label>
                                    <textarea id="textarea" rows="3" class="form-control" name="description" id="descripCurso" value="{{$curso->description}}" placeholder="Describe las características del curso..." aria-describedby="descripCursoHelp">{{$curso->description}}</textarea>
                                    <div id="descripCursoHelp" class="form-text">Puedes usar letras (A - Z), números (0 - 9) y caracteres especiales.</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-5">
                                    <label for="descripCurso" class="form-label">Carátula del curso</label>
                                    @if($curso->image == null)
                                        <img src="{{ asset('img/img-example.svg')}}" alt="">
                                    @else
                                        <img src="{{ asset('storage/cursos/'.$curso->image)}}" alt="">
                                    @endif
                                </div>
                                <label for="descripCurso" class="form-label">Reemplazar carátula del curso</label>
                                <input type="file" name="image" class="dropify" data-height="200" />
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <div class="mb-3 mt-3">
                                    <label for="disponibleen" class="form-label">Profesor</label>
                                    <select class="form-control form-select" name="user_id" id="disponibleen" aria-label="Default select example" >
                                        <option value="" selected disabled>Seleccioná un profesor</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}" {{ ( $user->id == $curso->user_id) ? 'selected' : '' }}>{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mt-3 mb-3">
                                    <label for="descripCurso" class="form-label">Descripcion publicitaria</label>
                                    <textarea id="textarea" rows="3" class="form-control" name="user_description" id="descripCurso" placeholder="Esta información se muestra en el inicio..." aria-describedby="descripCursoHelp">{{$curso->user_description}}</textarea>
                                    <div id="descripCursoHelp" class="form-text"><span style="color: red;">Debes usar el caracter # como separador. Por ejemplo: '#Consultas. #Exámenes.'. </span><br>Puedes usar letras (A - Z), números (0 - 9) y caracteres especiales.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="disponibleen" class="form-label">Curso básico</label>
                                    <select class="form-control form-select" name="course_id_1" id="disponibleen" aria-label="Default select example" required>
                                        @foreach($cursos as $curs)
                                            <option value="{{$curs->id}}" {{ ( $curs->id == $curso->course_id_1) ? 'selected' : '' }}>{{$curs->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio básico</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" name="price_1" id="precio" value="{{$curso->price_1}}" aria-describedby="precioHelp" name="ingresosTutor" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="disponibleen" class="form-label">Curso premium</label>
                                    <select class="form-control form-select" name="course_id_2" id="disponibleen" aria-label="Default select example" required>
                                        @foreach($cursos as $curs)
                                            <option value="{{$curs->id}}" {{ ( $curs->id == $curso->course_id_2) ? 'selected' : '' }}>{{$curs->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio premium</label>
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" name="price_2" id="precio" value="{{$curso->price_2}}" aria-describedby="precioHelp" name="ingresosTutor" required>
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 mt-4">
                                <button type="submit" class="btn btn-primary btn-celeste-dash">Guardar promocional</button>
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