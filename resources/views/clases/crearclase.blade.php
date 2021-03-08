@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-video"></i> Subir nuevas clases</h6>
                    <h6 class="info-sec-tit mt-3">Subir URLs o links externos</h6>
                    <p class="info-seccion-aux">Desde esta sección podrás agregar distintas URLs que redirijan a tus estudiantes a enlaces externos</p>
                    <form method="POST" action="{{ route('storeClase') }}" class="mt-4 aprobar-form">
                    @csrf
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="linkclase" class="form-label">Dirección de la URL</label>
                                    <input type="text" class="form-control" name="link" id="linkclase" placeholder="https://www... " aria-describedby="linkclaseHelp" required>
                                    <div id="linkclaseHelp" class="form-text">Ej. www.mienlace.com</div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="nombreclase" class="form-label">Nombre de la URL</label>
                                    <input type="text" class="form-control" name="name" id="nombreclase" placeholder="Video sobre..." aria-describedby="nombreclaseHelp" required>
                                    <div id="nombreclaseHelp" class="form-text">Ej. Video estructura atómica</div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="disponibleen" class="form-label">Curso en el que se visualizará</label>
                                    <select class="form-control form-select" name="course_id" id="disponibleen" aria-label="Default select example" required>
                                        @foreach($cursos as $curso)
                                            <option value="{{$curso->id}}">{{$curso->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="descripurl" class="form-label">Descripción de la URL</label>
                                    <textarea id="textarea" rows="3" class="form-control" name="description" id="descripurl" placeholder="Describe las características del enlace externo..." aria-describedby="descripurlHelp"></textarea>
                                    <div id="descripurlHelp" class="form-text">Puedes usar letras (A - Z), números (0 - 9) y caracteres especiales.</div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 mt-4">
                                <button type="submit" class="btn btn-primary btn-celeste-dash">Subir clase</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>
    
@endsection