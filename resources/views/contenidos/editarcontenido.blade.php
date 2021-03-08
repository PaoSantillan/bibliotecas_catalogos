@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-puzzle"></i> Subir nuevos contenidos</h6>
                    <h6 class="info-sec-tit mt-3">Subir nuevos materiales para los estudiantes</h6>
                    <p class="info-seccion-aux">Desde esta sección podrás subir archivos en distintos formatos (.doc, .pdf, .ppt, .xls, etc.) para que tus estudiantes puedan descargarlos.</p>
                    <form method="POST" action="{{ URL::action('ContenidoController@update', $contenido->id) }}" enctype="multipart/form-data"  class="mt-4 aprobar-form">
                    @csrf
                    @method('PUT')
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <!--<div class="row">
                                    <div class="col-lg-3">
                                        <img src="{{ asset('img/file.svg')}}" class="svg-file" alt="">
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <h6 class="archivo-title">Archivo seleccionado</h6>
                                        </div>
                                        <div class="row">
                                            <h6 class="detalle-archivo">Nombre: Actividad práctica Nº1.pdf</h6>
                                        </div>
                                        <div class="row">
                                            <h6 class="detalle-archivo">Fecha: 28/12/2020</h6>
                                        </div>
                                        <div class="row">
                                            <h6 class="detalle-archivo">Creado por: María Julia Galindez</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-6">
                                        <button class="btn btn-outline-dark btn-subir ml-20p">Cargar archivo &nbsp; <i class="cil-data-transfer-up"></i></button>
                                    </div>
                                </div>-->
                                <div class="col-lg-5">
                                    <label for="descripCurso" class="form-label">Contenido del curso</label>
                                    <a href="{{ URL::action('ContenidoController@displayFile', $contenido->attached) }}">Descargar</a>
                                </div>
                                <label for="descripCurso" class="form-label">Reemplazar contenido</label>
                                <input type="file" name="attached" class="dropify" data-height="200" required/>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="visualizaren" class="form-label">Curso en el que se visualizará</label>
                                    <select class="form-control form-select" name="course_id" id="visualizaren" aria-label="Default select example" aria-describedby="visualizarenHelp" required>
                                        @foreach($cursos as $curso)
                                            <option value="{{$curso->id}}" {{ ( $curso->id == $contenido->course_id) ? 'selected' : '' }}>{{$curso->name}}</option>
                                        @endforeach
                                    </select>
                                    <div id="visualizarenHelp" class="form-text">Curso seleccionado:</div>
                                </div
                            </div>
                        </div>
                        
                        <div class="row justify-content-center">
                            <div class="col-lg-12 mt-4">
                                <button type="submit" class="btn btn-primary btn-celeste-dash">Subir archivo</button>
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