<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/logocolorsmall.svg')}}" type="image/x-icon">
    <title>Aprobar | Cursos</title>

    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/free.min.css">
  <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/brand.min.css">
  <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/flag.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dropify.min.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/aprobar-landing.css')}}">
</head>
<body>
    <div class="container-fluid pl-0 pr-0 cursos-ui" id="nav-hero">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container-fluid pt-2 justify-content-between">
              <a class="navbar-brand" href="#">
                  <img id="logo" src="./img/logo2.png" alt="">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse n-c-fix" id="navbarText">
                <ul class="navbar-nav mb-2 ml-auto">
                  <li class="nav-item">
                    <a class="nav-link text-white active link-upgrade" aria-current="page" href="/">Inicio +</a>
                  </li>
                  <li class="nav-item link-upgrade">
                    <a class="nav-link text-white" href="/landingCursos">Cursos +</a>
                  </li>
                  <!-- <li class="nav-item link-upgrade">
                    <a class="nav-link text-white" href="#">¿Quiénes somos? +</a>
                  </li>
                  <li class="nav-item link-upgrade">
                    <a class="nav-link text-white" href="#">Eventos Aprobar +</a>
                  </li> -->
                  <li class="nav-item mar-nav">
                    <a class="btn btn-primary btn-nav-apro" href="/login">Ingresar</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white link-redes-nav" href="">
                        <img src="./img/youtube.svg" height="17" alt="">
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white link-redes-nav" href="">
                        <img src="./img/instag.svg" height="17" alt="">
                    </a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>

        <div class="wrap-hero">
            <h5 class="hero-text">Te acompañamos en tu</h5>
            <h3 class="hero-text ht-2">aprendizaje</h3>
        </div>
        <img class="onditas-svg" src="{{ asset('img/onditas.svg')}}" alt="">
    </div>
    <div class="container-fluid ondas-opz fix-ondas-opz">

        <img src="./img/rombo.svg" class="r-1" alt="">
        <img src="./img/rombo.svg" class="r-2" alt="">
        <img src="./img/tubos.svg" class="t-1" alt="">
        <img src="./img/reglas.svg" class="re-1" alt="">
        <img src="./img/globo.svg" class="glo-1" alt="">
        <img src="./img/atomo.svg" class="ato-1" alt="">
        <img src="./img/circ.svg" class="c-1" alt="">
        <img src="./img/circ.svg" class="c-2" alt="">
        <img src="./img/circ.svg" class="c-3" alt="">
        <img src="./img/circ.svg" class="c-4" alt="">
        <img src="./img/circ.svg" class="c-5" alt="">
        <img src="./img/circ.svg" class="c-6" alt="">
        <img src="./img/circ.svg" class="c-7" alt="">
        <img src="./img/circ.svg" class="c-8" alt="">
        <img src="./img/circ.svg" class="c-9" alt="">
        <img src="./img/circ.svg" class="c-10" alt="">
        <img src="./img/circ.svg" class="c-11" alt="">
        <div class="container-fluid cont-1 cont-2">
          <!-- <div class="row justify-content-center">
            <div class="col-lg-4">
              <div class="wrap-card">
                <div class="row justify-content-center">
                  <img src="./img/lamp.svg" alt="">
                </div>
                <div class="row justify-content-center">
                  <button class="btn btn-outline-light">Ingresa a tus materias</button>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="wrap-card bg-celeste">
                <div class="row justify-content-center">
                  <img src="./img/lup.svg" alt="">
                </div>
                <div class="row justify-content-center">
                  <button class="btn btn-outline-light fix-card-celeste">Ver cursos disponibles</button>
                </div>
              </div>
            </div>
          </div> -->
          <div class="row justify-content-center">
            <h6 class="subt">Cursos disponibles</h6>
          </div>
          <div class="row justify-content-center">
            <p class="paraph">
              Te ofrecemos una gran variedad de cursos para repasar tus materias antes de cada parcial o final.
              Contamos con videos teóricos de todas las unidades, 50 hs de clases prácticas grabadas, un grupo de Whatsapp donde podés consultar tus dudas con el profesor, y repasos intensivos en vivo para rendir el final.
            </p>
          </div>
          <div class="row pl-30 mt-50 justify-content-center">
            @foreach($cursos as $curso)
             
              <div class="card-s">   <!-- Se deben controlar el atributo id="card1" y el for="card1" -->
                <input type="checkbox" id="{{$curso->id}}" class="more" aria-hidden="true">
                <div class="content">
                    <!--<div class="front" style="background-image: url('https://images.unsplash.com/photo-1529408686214-b48b8532f72c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=986e2dee5c1b488d877ad7ba1afaf2ec&auto=format&fit=crop&w=1350&q=80')">-->
                    <div class="front" style="background-image: url('{{ asset('storage/cursos/'.$curso->image) }}')">
                        <div class="inner wrap-curso">
                            <span class="etiqueta-num">{{$curso->id}}</span>
                            <img src="./img/perf1-100.jpg" alt="">
                            <h6 class="prof">Con José Rodríguez</h6>
                            <h5 class="curso-nombre">{{$curso->name}}</h5>
                            <h6 class="instit">{{$curso->institucion}}</h6>
                            <label for="{{$curso->id}}" class="button button-fix-detalles" aria-hidden="true">
                                Detalles
                            </label>
                        </div>
                    </div>
                    <div class="back">
                        <div class="inner">
                          <div class="col-lg-12">
                            <div class="row justify-content-center pt-3">
                              <h3 class="precio-card"><span>$</span>{{$curso->price}}</h3>
                            </div>
                            <div class="row">
                              <h6 class="detalle-info text-center">Precio final</h6>
                            </div>
                            <div class="row mt-3">
                              <a href="" class="btn btn-primary btn-aprobar info-green">¡Comprar!</a>
                            </div>
                            <div class="row mt-3">
                              <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#transferencia">Transferencia</a>
                            </div>
                            <div class="row mt-5 justify-content-center">
                              <label for="{{$curso->id}}" class="button return" aria-hidden="true">
                                <i class="cil-chevron-double-left"></i>
                              </label>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
            @endforeach

      <!-- <div class="wrapper">
        <div class="card-s">
            <input type="checkbox" id="card1" class="more" aria-hidden="true">
            <div class="content">
                <div class="front" style="background-image: url('https://images.unsplash.com/photo-1529408686214-b48b8532f72c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=986e2dee5c1b488d877ad7ba1afaf2ec&auto=format&fit=crop&w=1350&q=80')">
                    <div class="inner wrap-curso">
                        <span class="etiqueta-num">{{$curso->id}}</span>
                        <img src="./img/perf1-100.jpg" alt="">
                        <h6 class="prof">Con José Rodríguez</h6>
                        <h5 class="curso-nombre">{{$curso->name}}</h5>
                        <h6 class="instit">{{$curso->institucion}}</h6>
                        <label for="card1" class="button" aria-hidden="true">
                            Details
                        </label>
                    </div>
                </div>
                <div class="back">
                    <div class="inner">
                      <div class="col-lg-12">
                        <div class="row justify-content-center pt-3">
                          <h3 class="precio-card"><span>$</span>2300</h3>
                        </div>
                        <div class="row">
                          <h6 class="detalle-info text-center">Precio final</h6>
                        </div>
                        <div class="row mt-3">
                          <a href="" class="btn btn-primary btn-aprobar info-green">¡Comprar!</a>
                        </div>
                        <div class="row mt-3">
                          <a href="" class="btn btn-primary">Transferencia</a>
                        </div>
                        <div class="row mt-5 justify-content-center">
                          <label for="card1" class="button return" aria-hidden="true">
                            <i class="cil-chevron-double-left"></i>
                          </label>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div> -->

          </div>
          <div class="row justify-content-center mt-80">
            <p class="big-text">Qué dicen <strong>nuestros estudiantes</strong></p>
          </div>
          <div class="row justify-content-center mt-70">
            <!-- <div class="testimonios"> -->
              <div class="wrap-tes">
                <div class="row">
                  <img src="./img/comisvg.svg" class="comillas" alt="">
                  <img src="./img/5.jpg" class="perfil-pro" alt="">
                </div>
                <div class="row justify-content-center">
                  <div class="stars-valoracion">
                    <img src="./img/star-full.svg" alt="" class="stars-v">
                    <img src="./img/star-full.svg" alt="" class="stars-v">
                    <img src="./img/star-full.svg" alt="" class="stars-v">
                    <img src="./img/star-full.svg" alt="" class="stars-v">
                    <img src="./img/star-void.svg" alt="" class="stars-v">
                  </div>
                </div>
                <div class="row justify-content-center">
                  <p class="testimonial">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing
                    elit, sed diam nonummy nibh. Lorem ipsum dolor sit
                    amet, consectetuer.
                  </p>
                </div>
                <div class="row justify-content-center">
                  <h6 class="nombre-tes"><strong>Eliana Dimari</strong></h6>
                </div>
                <div class="row justify-content-center">
                  <h6 class="profe-tes"><strong>Económicas UBA</strong></h6>
                </div>
              </div>
              <div class="wrap-tes">
                <div class="row">
                  <img src="./img/comisvg.svg" class="comillas" alt="">
                  <img src="./img/5.jpg" class="perfil-pro" alt="">
                </div>
                <div class="row justify-content-center">
                  <div class="stars-valoracion">
                    <img src="./img/star-full.svg" alt="" class="stars-v">
                    <img src="./img/star-full.svg" alt="" class="stars-v">
                    <img src="./img/star-full.svg" alt="" class="stars-v">
                    <img src="./img/star-full.svg" alt="" class="stars-v">
                    <img src="./img/star-void.svg" alt="" class="stars-v">
                  </div>
                </div>
                <div class="row justify-content-center">
                  <p class="testimonial">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing
                    elit, sed diam nonummy nibh. Lorem ipsum dolor sit
                    amet, consectetuer.
                  </p>
                </div>
                <div class="row justify-content-center">
                  <h6 class="nombre-tes"><strong>Eliana Dimari</strong></h6>
                </div>
                <div class="row justify-content-center">
                  <h6 class="profe-tes"><strong>Económicas UBA</strong></h6>
                </div>
              </div>
              <div class="wrap-tes">
                <div class="row">
                  <img src="./img/comisvg.svg" class="comillas" alt="">
                  <img src="./img/5.jpg" class="perfil-pro" alt="">
                </div>
                <div class="row justify-content-center">
                  <div class="stars-valoracion">
                    <img src="./img/star-full.svg" alt="" class="stars-v">
                    <img src="./img/star-full.svg" alt="" class="stars-v">
                    <img src="./img/star-full.svg" alt="" class="stars-v">
                    <img src="./img/star-full.svg" alt="" class="stars-v">
                    <img src="./img/star-void.svg" alt="" class="stars-v">
                  </div>
                </div>
                <div class="row justify-content-center">
                  <p class="testimonial">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing
                    elit, sed diam nonummy nibh. Lorem ipsum dolor sit
                    amet, consectetuer.
                  </p>
                </div>
                <div class="row justify-content-center">
                  <h6 class="nombre-tes"><strong>Eliana Dimari</strong></h6>
                </div>
                <div class="row justify-content-center">
                  <h6 class="profe-tes"><strong>Económicas UBA</strong></h6>
                </div>
              </div>
            <!-- </div> -->
          </div>
          <div class="row justify-content-center mt-70">
            <div class="col-lg-3">
              <button class="btn btn-primary btn-nav-apro fix-btn-apro">Dejar un comentario</button>
            </div>
          </div>
        </div>
    </div>
    <div class="container-fluid pie">
      <div class="row justify-content-between">
        <div class="col-lg-3">
          <p class="pie-text">
            Lorem ipsum dolor sit amet, consectetuer adipiscing
            elit, sed diam nonummy nibh. Lorem ipsum dolor sit
            amet, consectetuer.
          </p>
        </div>
        <div class="col-lg-3">
          <div class="row">
            <a href="">
              <img class="icon-pie" src="./img/youtube.svg" height="17" alt="">
            </a>
            <a href="">
              <img class="icon-pie" src="./img/instag.svg" height="17" alt="">
            </a>
            <a href="">
              <img src="./img/logo2.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid post-pie">
      <div class="row justify-content-center">
        <p>Aprobar 2021 - Todos los derechos reservados</p>
      </div>
    </div>


<!-- Modal -->
<div class="modal fade modal-transferencia pb-5" id="transferencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <!-- <h2 class="text-epic">Nueva transferencia</h2> -->
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form method="POST" action="{{ URL::action('CursoController@cargarRegistro') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-header bg-celeste text-white">
          <h5 class="modal-title" id="exampleModalLabel">Transferencia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 mb-3">
                <label for="nombreAlumno" class="form-label">Nombre alumno</label>
                <input type="text" class="form-control" name="nombreAlumno" id="nombreAlumno" maxlenght="100" aria-describedby="nombreAlumnoHelp" required>
                <div id="nombreAlumnoHelp" class="form-text">Ej. Juan</div>
              </div>
              <div class="col-lg-6 mb-3">
                <label for="apellidoAlumno" class="form-label">Apellido alumno</label>
                <input type="text" class="form-control" name="apellidoAlumno" id="apellidoAlumno" maxlenght="100" aria-describedby="apellidoAlumnoHelp" required>
                <div id="apellidoAlumnoHelp" class="form-text">Ej. Perez</div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <label for="dniAlumno" class="form-label">DNI alumno</label>
                <input type="text" class="form-control" name="dniAlumno" id="dniAlumno" placeholder="" maxlength="8" minlenght="8" aria-describedby="dniAlumnoHelp" required>
                <div id="dniAlumnoHelp" class="form-text">Ej. 36456123</div>
              </div>
              <div class="col-lg-6 mb-3">
                <label for="cursoMatricula" class="form-label">Curso a matricular</label>
                <select class="form-control form-select" name="cursoMatricula" id="cursoMatricula" aria-label="Default select example" aria-describedby="cursoMatriculaHelp" required>
                    <!--<option value="" selected disabled>Seleccione una opción...</option>
                    <option value="">Curso fabuloso aqui</option>-->
                    @foreach($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->name}}</option>
                    @endforeach
                </select>
                <div id="cursoMatriculaHelp" class="form-text">Ej. Biología.</div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <label for="emailAlumno" class="form-label">Email alumno</label>
                <input type="text" class="form-control" name="emailAlumno" id="emailAlumno" placeholder="" maxlenght="100" aria-describedby="emailAlumnoHelp" required>
                <div id="emailAlumnoHelp" class="form-text">Ej. 36456123</div>
              </div>
              <div class="col-lg-6 mb-3">
                <label for="telAlumno" class="form-label">Teléfono alumno</label>
                <input type="text" class="form-control" name="telAlumno" id="telAlumno" placeholder="" maxlenght="14" aria-describedby="emailAlumnoHelp" required>
                <div id="emailAlumnoHelp" class="form-text">Ej. 36456123</div>
              </div>
            </div>
            <div class="row">
              <label for="descripCurso" class="form-label">Subir comprobante</label>
              <input type="file" class="dropify" name="comprobante" data-height="200" />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="cil-x-circle"></i> Cerrar</button>
          <button type="submit" class="btn btn-success"><i class="cil-check-circle"></i> Subir</button>
        </div>
      </form>
    </div>
  </div>
</div>

  
</body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    
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
</html>