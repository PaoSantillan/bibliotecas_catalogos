@extends ('layouts.app')

@section ('content')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-badge"></i> Mis cursos</h6>
                    <h6 class="info-sec-tit mt-3">Todos tus cursos en un solo lugar.</h6>
                    <p class="info-seccion-aux">¡Disfruta aprendiendo con nosotros!</p>
                    <div class="row mt-4">
                    @foreach($cursos as $curso)
                        <div class="col-lg-6">
                            <a class="item-curso-info" href="{{ URL::action('ClaseController@showAlumno', encrypt($curso->id)) }}">
                                <div class="item-curso">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <h2 class="icono-big">
                                                <i class="cil-badge"></i>
                                            </h2>
                                        </div>
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h6>{{$curso->name}}</h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="aux-text">{{$curso->institucion}}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </a>
                        </div>
                    @endforeach

                        <!--<div class="col-lg-6">
                            <a class="item-curso-info" href="">
                                <div class="item-curso">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <h2 class="icono-big">
                                                <i class="cil-badge"></i>
                                            </h2>
                                        </div>
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h6>Curso Fabuloso aqui</h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="aux-text">Siglo XXI</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a class="item-curso-info" href="">
                                <div class="item-curso">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <h2 class="icono-big">
                                                <i class="cil-badge"></i>
                                            </h2>
                                        </div>
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h6>Curso Fabuloso aqui</h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="aux-text">Siglo XXI</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a class="item-curso-info" href="">
                                <div class="item-curso">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <h2 class="icono-big">
                                                <i class="cil-badge"></i>
                                            </h2>
                                        </div>
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h6>Curso Fabuloso aqui</h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="aux-text">Siglo XXI</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a class="item-curso-info" href="">
                                <div class="item-curso">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <h2 class="icono-big">
                                                <i class="cil-badge"></i>
                                            </h2>
                                        </div>
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h6>Curso Fabuloso aqui</h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="aux-text">Siglo XXI</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <a class="item-curso-info" href="">
                                <div class="item-curso">
                                    <div class="row">
                                        <div class="col-lg-1">
                                            <h2 class="icono-big">
                                                <i class="cil-badge"></i>
                                            </h2>
                                        </div>
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <h6>Curso Fabuloso aqui</h6>
                                            </div>
                                            <div class="row">
                                                <h6 class="aux-text">Siglo XXI</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </a>
                        </div>-->
                    
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

<div class="modal fade" id="nuevocomentario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
@endsection