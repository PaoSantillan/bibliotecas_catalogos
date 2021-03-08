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
  @include('compartido.mensajes')
    <div class="container-fluid pl-0 pr-0 cursos-ui" id="nav-hero">
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
        <a href="https://api.whatsapp.com/send?phone=+5491140424641">
          <div class="btn-wsp">
            <i class="cib-whatsapp"></i>
          </div>
        </a>
        <div class="row justify-content-center ">
          <img id="logo" src="./img/logo2.png" class="d-block d-lg-none" alt="">
        </div>
        <div class="wrap-hero">
            <h5 class="hero-text">Te acompañamos en tu</h5>
            <h3 class="hero-text ht-2">aprendizaje</h3>
        </div>
        <img class="onditas-svg" src="{{ asset('img/onditas.svg')}}" alt="">
    </div>
    <div class="container-fluid" id="cursos-list">
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
        <!-- codigo para cursos aqui -->
       
        @foreach($cursos_generales as $curso)
             
             <div class="card-s">   <!-- Se deben controlar el atributo id="card1" y el for="card1" -->
               <input type="checkbox" id="{{$curso->id}}" class="more" aria-hidden="true">
               <div class="content">
                   <!--<div class="front" style="background-image: url('https://images.unsplash.com/photo-1529408686214-b48b8532f72c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=986e2dee5c1b488d877ad7ba1afaf2ec&auto=format&fit=crop&w=1350&q=80')">-->
                   <div class="front" style="background-image: url('{{ asset('storage/cursos/'.$curso->image) }}')">
                       <div class="inner wrap-curso">
                           <span class="etiqueta-num">{{$curso->code}}</span>
                           @if($curso->user_id != null)
                            <img src="{{ $curso->profesor->photo ? asset($curso->profesor->photo) : './img/aprobar-perfil-dafault.jpg' }}" style="width: 60px; height: 60px;" alt="">
                            <h6 class="prof">Con {{ $curso->profesor->name }}</h6>
                           @else
                            <img src="{{ asset('./img/aprobar-perfil-dafault.jpg') }}" style="width: 60px; height: 60px;" alt="">
                            <h6 class="prof">Sin profesor asignado.</h6>
                           @endif
                           <h5 class="curso-nombre">{{$curso->name}}</h5>
                           <h6 class="instit">{{$curso->institucion}}</h6>
                           <label for="{{$curso->id}}" class="button button-fix-detalles" aria-hidden="true">
                               Detalles
                           </label>
                       </div>
                   </div>
                   <div class="back">
                       <div class="inner">
                         <div class="col-12 col-lg-12">
                           <div class="row justify-content-center pt-3">
                             <h3 class="precio-card"><span></span></h3>
                           </div>
                           <div class="row">
                             <h6 class="detalle-info text-center"></h6>
                           </div>
                           <div class="row mt-3">
                             <a href="{{ 'info/curso/'.$curso->id }}" class="btn btn-primary btn-aprobar info-green">Quiero más info</a>
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

        <!-- fin código para cursos -->
      </div>
      @include('layouts.comments')

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
    </div> <!-- fIN CURSOS LIST-->
    <div class="container-fluid pie">
      <div class="row justify-content-between">
        <div class="col-lg-3 d-none d-lg-block">
          <p class="pie-text">
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

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<script>


</script>
</html>