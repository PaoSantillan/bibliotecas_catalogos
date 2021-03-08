<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/logocolorsmall.svg')}}" type="image/x-icon">
    <title>Aprobar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/free.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/brand.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/flag.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/aprobar-landing.css')}}">
</head>
<body>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
    <div class="container-fluid pl-0 pr-0" id="nav-hero">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
            <div class="container-fluid pt-2 justify-content-between">
              <a class="navbar-brand d-none d-lg-block" href="#">
                  <img id="logo" src="./img/logo2.png" alt="">
              </a>
              <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse n-c-fix d-none d-lg-block" id="navbarText">
                <ul class="navbar-nav mb-2 ml-auto">
                  <li class="nav-item">
                    <a class="nav-link text-white active link-upgrade" aria-current="page" href="/">Inicio +</a>
                  </li>
                  <li class="nav-item link-upgrade">
                    <a class="nav-link text-white" href="/landingCursos">Cursos +</a>
                  </li>
                  <!-- <li class="nav-item link-upgrade">
                    <a class="nav-link text-white" href="#">¿Quiénes somos? +</a>
                  </li>-->
                  <li class="nav-item link-upgrade">
                    <a class="nav-link text-white" href="/eventos">Eventos Aprobar +</a>
                  </li>
                  <li class="nav-item mar-nav">
                    <a class="btn btn-primary btn-nav-apro" href="/login" target="_blank">Campus</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white link-redes-nav" href="https://www.facebook.com/aprob.ar.clases/">
                        <i class="cib-facebook"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white link-redes-nav" href="https://m.youtube.com/c/InstitutoAprobar">
                        <i class="cib-youtube"></i>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white link-redes-nav" href="https://instagram.com/aprob.ar.clases?igshid=xhdsqpjymy16">
                        <i class="cib-instagram"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
        <div class="swiper-container">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide s1">
              <div class="wrap-hero">
                  <h5 class="hero-text">Te acompañamos en tu</h5>
                  <h3 class="hero-text ht-2">aprendizaje</h3>
              </div>
            </div>
            <div class="swiper-slide s2">
              <div class="wrap-hero">
                  <h5 class="hero-text">Te acompañamos en tu</h5>
                  <h3 class="hero-text ht-2">aprendizaje</h3>
              </div>
            </div>
            <div class="swiper-slide s3">
              <div class="wrap-hero">
                  <h5 class="hero-text">Te acompañamos en tu</h5>
                  <h3 class="hero-text ht-2">aprendizaje</h3>
              </div>
            </div>
           
          </div>
          <!-- If we need pagination -->
          <div class="swiper-pagination"></div>

          <!-- If we need navigation buttons -->
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

          <!-- If we need scrollbar -->
          <div class="swiper-scrollbar"></div>
        </div>
        <a href="https://api.whatsapp.com/send?phone=+5491140424641">
          <div class="btn-wsp">
            <i class="cib-whatsapp"></i>
          </div>
        </a>
        <div class="row justify-content-center ">
          <img id="logo" src="./img/logo2.png" class="d-block d-lg-none" alt="">
        </div>
        <!-- <div class="wrap-hero">
            <h5 class="hero-text">Te acompañamos en tu</h5>
            <h3 class="hero-text ht-2">aprendizaje</h3>
        </div> -->
        <img class="onditas-svg" src="{{ asset('img/onditas.svg')}}" alt="">
    </div>
    <div class="container-fluid ondas-opz">
        <!-- <img class="ondas-t" src="./img/base-tra.svg" alt="">
        <img class="ondas-div" src="./img/ondas-div.svg" alt=""> -->
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
        <div class="container home-cont">
          <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
              <div class="wrap-card mb-3">
                <div class="row justify-content-center">
                  <img src="./img/lamp.svg" alt="">
                </div>
                <div class="row justify-content-center">
                  <a class="btn btn-outline-light btnn"  target="_blank" href="/login">Ingresa a tus materias</a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="wrap-card bg-celeste mb-3">
                <div class="row justify-content-center">
                  <img src="./img/lup.svg" alt="">
                </div>
                <div class="row justify-content-center">
                  <a class="btn btn-outline-light fix-card-celeste btnn" href="/landingCursos">Ver cursos disponibles</a>
                </div>
              </div>
            </div>
          </div>
          @include('layouts.comments')
        </div>
    </div>
    <div class="container-fluid pie">
      <div class="row justify-content-between">
        <div class="col-lg-3">
          <p class="pie-text ">
          </p>
        </div>
        <div class="col-lg-3">
          <div class="row">
            <a class="nav-link text-white link-redes-nav" href="https://www.facebook.com/aprob.ar.clases/">
                <i class="cib-facebook"></i>
            </a>        
            <a class="nav-link text-white link-redes-nav" href="https://m.youtube.com/c/InstitutoAprobar">
                <i class="cib-youtube"></i>
            </a>
            <a class="nav-link text-white link-redes-nav" href="https://instagram.com/aprob.ar.clases?igshid=xhdsqpjymy16">
                <i class="cib-instagram"></i>
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
</body>


<div class="outer-menu d-block d-lg-none">
  <input class="checkbox-toggle" type="checkbox" />
  <div class="hamburger">
    <div></div>
  </div>
  <div class="menu">
    <div>
      <div>
        <ul>
          <li>
            <a href="/">Inicio +</a>
          </li>
          <li>
            <a href="/landingCursos">Cursos +</a>
          </li>
          <li>
            <a href="/eventos">Eventos Aprobar +</a>
          </li>
          <li>
            <a href="/login">Ingresar</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade modal-coment-landing" id="comentario-landing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="row justify-content-center">
    <h2 class="modal-op">¿Algo para decirnos? <br> ¡Tu opinión nos importa!</h2>
  </div>
  <img src="{{ asset('img/reglasb.svg')}}" class="modal-img-reglas" alt="">
  <img src="{{ asset('img/tubosb.svg')}}" class="modal-img-tubos" alt="">
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
                    <!-- fragment 1 -->
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
                  <textarea id="textarea" rows="3" class="form-control" name="description" id="comentarioBody" placeholder="Escribe tu comentario aqui..." aria-describedby="comentarioBodyHelp"></textarea>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
  const swiper = new Swiper('.swiper-container', {
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
  });
</script>
</html>