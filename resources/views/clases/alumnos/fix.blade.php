@extends ('layouts.app')

@section ('content')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-video"></i> Clases</h6>
                    <h6 class="info-sec-tit mt-3"></h6>
                    <p class="info-seccion-aux"></p>
                    <form method="POST" action="" class="mt-4 aprobar-form">
                
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <label for="clasesteo" class="form-label">Clases teóricas</label>
                                    <select class="form-control form-select" name="lesson_id" id="clasesteo" aria-label="Default select example" required>
                                        <option value="" selected disabled>Seleccione una opción</option>
                                      
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="mb-3">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-primary btn-celeste-dash-2 mt-30p">Ver clase</button>
                            </div>
                        </div>
                        <div class="row justify-content-center mt-5 video-frame">
                        <iframe width="560" height="315" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/JKLmsXZ74Ps" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                            <!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/JKLmsXZ74Ps" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-3">
                    <h6 class="titulo-seccion"><i class="cil-speech"></i> Comentarios</h6>
                    <div class="row mt-3">
                        <div class="col-lg-1">
                                <img class="perfil-com" src="{{ asset('img/jorge.png')}}" alt="">
                        </div>
                        <div class="col-lg-9 boc-com">
                            <a href="" class="enlace-com" data-bs-toggle="modal" data-bs-target="#comentario">
                                <p class="titulo-com">Un nuevo comentario fabuloso</p>
                                <p class="text-com">
                                    Lorem ipsum dolor sit amet aasdasd a sdas asd as d asd asd as das asd asd as dwr4q3w rfsadfa sd qwer asdfas d consectetur adipisicing elit. Odio, officiis? Debitis eveniet excepturi saepe, eos minima ratione qui voluptatum sapiente obcaecati delectus eum velit explicabo. Enim autem nam repellendus modi!
                                </p>
                                <span class="autor-com">Jorge el Curioso <span class="datos-com"> · Hace 2 semanas</span></span>
                            </a>
                        </div>
                        <div class="col-lg-2 num-box">
                            <h4 class="num-com">#33</h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        
                            <button class="btn btn-outline-primary btn-comentarios" data-bs-toggle="modal" data-bs-target="#nuevocomentario">¡Dejar un comentario!</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Modal -->
<div class="modal fade" id="comentario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="cil-speech"></i> Comentario #33</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <h6 class="titulo-com-modal">Un nuevo comentario fabuloso</h6>
            </div>
            <div class="row">
                <p class="text-com-modal">
                    Lorem ipsum dolor sit amet aasdasd a sdas asd as d asd asd as das asd asd as dwr4q3w rfsadfa sd qwer asdfas d consectetur adipisicing elit. Odio, officiis? Debitis eveniet excepturi saepe, eos minima ratione qui voluptatum sapiente obcaecati delectus eum velit explicabo. Enim autem nam repellendus modi!
                </p>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="nuevocomentario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="cil-bullhorn"></i> Crear comentario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <form action="">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Titulo del comentario</label>
                    <input type="text" class="form-control" name="link" id="titulo" placeholder="" aria-describedby="tituloHelp" required>
                    <div id="tituloHelp" class="form-text">Ej. Consula acerca de la energía.</div>
                </div>
                <div class="mb-3">
                    <label for="comentarioBody" class="form-label">Tu comentario</label>
                    <textarea id="textarea" rows="3" class="form-control" name="description" id="comentarioBody" placeholder="Escribe tu comentario aqui..." aria-describedby="comentarioBodyHelp"></textarea>
                    <div id="comentarioBodyHelp" class="form-text">Puedes usar letras (A - Z), números (0 - 9) y caracteres especiales.</div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-success btn-block">¡Publicar comentario!</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection