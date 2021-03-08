<div class="row justify-content-center mt-80">
  <p class="big-text">Qué dicen <strong>nuestros estudiantes</strong></p>
</div>
<div class="row justify-content-center mt-70">
  <!-- <div class="testimonios"> -->
    @foreach($comentarios as $comentario)
      <div class="wrap-tes">
        <div class="row">
          <img src="{{ asset('img/comisvg.svg') }}" class="comillas" alt="">
          @if($comentario->usuario)
            @if( $comentario->usuario->photo )
              <img src="{{ asset($comentario->usuario->photo)}}" class="perfil-pro" alt="">
            @else
              <img src="{{ asset('img/5.jpg')}}" class="perfil-pro" alt="">
            @endif
          @else
            <img src="{{ asset('img/5.jpg') }}" class="perfil-pro" alt="">
          @endif
        </div>
        <div class="row justify-content-center">
          <div class="stars-valoracion">
            @switch($comentario->score)
                @case(1)
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-void.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-void.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-void.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-void.svg') }}" alt="" class="stars-v">
                    @break
                @case(2)
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-void.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-void.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-void.svg') }}" alt="" class="stars-v">
                    @break
                @case(3)
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-void.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-void.svg') }}" alt="" class="stars-v">
                    @break
                @case(4)
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-void.svg') }}" alt="" class="stars-v">
                    @break
                @case(5)
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                  <img src="{{ asset('img/star-full.svg') }}" alt="" class="stars-v">
                    @break
            @endswitch 
          </div>
        </div>
        <div class="row justify-content-center">
          <p class="testimonial">
            {{$comentario->comment}}
          </p>
        </div>
        <div class="row justify-content-center">
          <h6 class="nombre-tes"><strong>{{$comentario->author}}</strong></h6>
        </div>
        <div class="row justify-content-center">
          <h6 class="profe-tes"><strong>{{$comentario->curso->name}}</strong></h6>
        </div>
      </div>
    @endforeach
  <!-- </div> -->
</div>
<div class="row justify-content-center mt-70">
  <div class="col-lg-3">
    <button class="btn btn-primary btn-nav-apro fix-btn-apro" data-bs-toggle="modal" data-bs-target="#comentario-landing">Dejar un comentario</button>
  </div>
</div>


<!-- Modal comentarios -->
<div class="modal fade modal-coment-landing" id="comentario-landing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="row justify-content-center">
    <h2 class="modal-op">¿Algo para decirnos? <br> ¡Tu opinión nos importa!</h2>
  </div>
  <img src="{{ asset('img/reglasb.svg') }}')}}" class="modal-img-reglas" alt="">
  <img src="{{ asset('img/tubosb.svg') }}')}}" class="modal-img-tubos" alt="">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="cil-bullhorn"></i> Nuevo comentario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form method="POST" action="{{ URL::action('CursoController@storeComment') }}">
          @csrf
              <div class="mb-3">
                  <label for="autor" class="form-label">Tu nombre</label>
                  <input type="text" class="form-control" name="autor" id="autor" placeholder="" aria-describedby="autorHelp" value="{{ Auth::check() ? Auth::user()->name : '' }}" {{ Auth::check() ? 'readonly' : '' }} required>
                  <div id="autorHelp" class="form-text">Ej. Juan.</div>
              </div>
              <div class="mb-3">
                <label for="cursoMatricula" class="form-label">Elegí el curso en el que participaste</label>
                <select class="form-control form-select" name="course_id" id="cursoMatricula" aria-label="Default select example" aria-describedby="cursoMatriculaHelp" required>
                    @foreach($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->name}}</option>
                    @endforeach
                </select>
                <div id="cursoMatriculaHelp" class="form-text">Ej. Biología.</div>
              </div>
              <div class="mb-3">
                <label for="valora" class="form-label">Valoración</label>
                <select class="form-control form-select" name="valora" id="valora" aria-label="Default select example" aria-describedby="valoraHelp" required>
                    
                    <option value="5">Excelente</option>
                    <option value="4">Muy bueno</option>
                    <option value="3">Bueno</option>
                    <option value="2">Regular</option>
                    <option value="1">Malo</option>
                   
                </select>
                
              </div>
              <div class="mb-3">
                  <label for="comentarioBody" class="form-label">Tu comentario</label>
                  <textarea id="textarea" rows="3" class="form-control" name="description" id="comentarioBody" placeholder="Escribe tu comentario aqui..." aria-describedby="comentarioBodyHelp" required></textarea>
                  <div id="comentarioBodyHelp" class="form-text">Puedes usar letras (A - Z), números (0 - 9) y caracteres especiales.</div>
              </div>
              <div class="row justify-content-center">
                  <div class="col-lg-12">
                      <button type="submit" class="btn btn-nav-apro fix-btn-apro text-white">¡Publicar comentario!</button>
                  </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>