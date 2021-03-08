<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/logocolorsmall.svg')}}" type="image/x-icon">
    <title>Aprobar | +Info</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/free.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/brand.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/flag.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/aprobar-landing.css')}}">
</head>
<body>
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
          <img id="logo" src="{{ asset('./img/logo2.png')}}" class="d-block d-lg-none" alt="">
        </div>
        <div class="wrap-hero">
            <h5 class="hero-text">Te acompañamos en tu</h5>
            <h3 class="hero-text ht-2">aprendizaje</h3>
        </div>
        <img class="onditas-svg" src="{{ asset('img/onditas.svg')}}" alt="">
    </div>
    <div class="container-fluid ondas-opz">
        <!-- <img class="ondas-t" src="./img/base-tra.svg" alt="">
        <img class="ondas-div" src="./img/ondas-div.svg" alt=""> -->
        <img src="{{ asset('./img/rombo.svg')}}" class="r-1" alt="">
        <img src="{{ asset('./img/rombo.svg')}}" class="r-2" alt="">
        <img src="{{ asset('./img/tubos.svg')}}" class="t-1" alt="">
        <img src="{{ asset('./img/reglas.svg')}}" class="re-1" alt="">
        <img src="{{ asset('./img/globo.svg')}}" class="glo-1" alt="">
        <img src="{{ asset('./img/atomo.svg')}}" class="ato-1" alt="">
        <img src="{{ asset('./img/circ.svg')}}" class="c-1" alt="">
        <img src="{{ asset('./img/circ.svg')}}" class="c-2" alt="">
        <img src="{{ asset('./img/circ.svg')}}" class="c-3" alt="">
        <img src="{{ asset('./img/circ.svg')}}" class="c-4" alt="">
        <img src="{{ asset('./img/circ.svg')}}" class="c-5" alt="">
        <img src="{{ asset('./img/circ.svg')}}" class="c-6" alt="">
        <img src="{{ asset('./img/circ.svg')}}" class="c-7" alt="">
        <img src="{{ asset('./img/circ.svg')}}" class="c-8" alt="">
        <img src="{{ asset('./img/circ.svg')}}" class="c-9" alt="">
        <img src="{{ asset('./img/circ.svg')}}" class="c-10" alt="">
        <img src="{{ asset('./img/circ.svg')}}" class="c-11" alt="">
        <div class="container" id="cursos-list">
          
          <div class="row">
            <h6 class="subt-2">{{$curso->name}}</h6>
          </div>
          <div class="row">
            <p class="paraph-2">
              {{$curso->description}}
            </p>
          </div>
          <div class="row mt-50 justify-content-center">
            
            <div class="col-md-6 col-lg-4 mt-3">
              <div class="wrap-info-curso">
                <div class="etiqueta-info">
                  <h4>{{$curso->curso1->name}}</h4>
                </div>
                <div class="row pt-90">
                  <h3 class="price"><span>$</span>{{$curso->price_1}}</h3>
                </div>
                <div class="row">
                  <div class="items-check">
                    <div class="row justify-content-center">
                      <div class="col-10 col-lg-10 pb-5 pt-4">
                        @foreach(explode('#', $curso->curso1->description) as $k)
                          @if($k)
                           <p><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                          <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                          </svg> {{$k}}</p>
                        @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center box-btns">
                <div class="col-lg-12">
                  <button class="btn btn-primary btn-aprobar blue" data-bs-toggle="modal" data-bs-target="#compra1">¿Cómo lo compro?</button>
                </div>
                <div class="col-lg-12 mt-1">
                  <a href="" class="btn btn-primary btn-aprobar-2 blue" data-bs-toggle="modal" data-bs-target="#transferencia">Informar pago</a>
                </div>
              </div>
            </div>
            </div>

            <div class="col-md-6 col-lg-4 mt-3">
              <div class="wrap-info-curso bg-green">
                <div class="etiqueta-info info-green">
                  <h4>{{$curso->curso2->name}}</h4>
                </div>
                <div class="row pt-90">
                  <h3 class="price"><span>$</span>{{$curso->price_2}}</h3>
                </div>
                <div class="row">
                  <div class="items-check">
                    <div class="row justify-content-center">
                      <div class="col-10 col-lg-10 pb-5 pt-4">
                        @foreach(explode('#', $curso->curso2->description) as $k)
                          @if($k)
                            <p><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                            </svg> {{$k}}</p>
                          @endif
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center  box-btns">
                  <div class="col-lg-12">
                    <button class="btn btn-primary btn-aprobar info-green" data-bs-toggle="modal" data-bs-target="#compra2">¿Cómo lo compro?</button>
                  </div>
                  <div class="col-lg-12 mt-1">
                    <a href="" class="btn btn-primary btn-aprobar-2 info-green" data-bs-toggle="modal" data-bs-target="#transferencia">Informar pago</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 mt-3">
              <div class="wrap-info-doc">
                @if($curso->user_id != null)
                  <img src="{{ $curso->profesor->photo ? asset($curso->profesor->photo) : '../../../img/aprobar-perfil-dafault.jpg' }}" style="width: 60px; height: 60px;" alt="">
                  <h4 class="nombre-prof">{{$curso->profesor->name}}</h4>
                @else
                  <img src="{{ asset('../../../img/aprobar-perfil-dafault.jpg') }}" style="width: 60px; height: 60px;" alt="">
                  <h4 class="nombre-prof">Sin profesor asignado.</h4>
                @endif
                <div class="divisor"></div>
                  <div class="otros">
                    <ul>
                      @foreach(explode('#', $curso->user_description) as $k)
                        @if($k)
                          <li>{{$k}}</li>
                        @endif
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            @include('layouts.comments')
          </div>
        </div>
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
                  <img src="{{ asset('img/logo2.png') }}" alt="">
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




<!-- Modal Compra 1 -->
<div class="modal fade modal-transferencia pb-5" id="compra1" tabindex="-1" aria-labelledby="compra1" aria-hidden="true">
  <!-- <h2 class="text-epic">Nueva transferencia</h2> -->
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-celeste text-white">
        <h5 class="modal-title" id="compra1">Datos de compra</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          @foreach(explode('#', $curso->curso1->cbu) as $k)
            @if($k)
             {{$k}}<br>
            @endif
          @endforeach
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="cil-x-circle"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Compra 1 -->
<div class="modal fade modal-transferencia pb-5" id="compra2" tabindex="-1" aria-labelledby="compra2" aria-hidden="true">
  <!-- <h2 class="text-epic">Nueva transferencia</h2> -->
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-celeste text-white">
        <h5 class="modal-title" id="compra2">Datos de compra</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          @foreach(explode('#', $curso->curso2->cbu) as $k)
            @if($k)
             {{$k}}<br>
            @endif
          @endforeach
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="cil-x-circle"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Transferencias -->
<div class="modal fade modal-transferencia pb-5" id="transferencia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <!-- <h2 class="text-epic">Nueva transferencia</h2> -->
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form method="POST" action="{{ URL::action('CursoController@cargarRegistro') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-header bg-celeste text-white">
          <h5 class="modal-title" id="exampleModalLabel">Informar pago</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 mb-3">
                <label for="nombreAlumno" class="form-label">Nombre alumno</label>
                <input type="text" class="form-control" name="nombreAlumno" id="nombreAlumno" placeholder="Ingrese un nombre..." aria-describedby="nombreAlumnoHelp" required>
                <div id="nombreAlumnoHelp" class="form-text">Ej. Juan</div>
              </div>
              <div class="col-lg-6 mb-3">
                <label for="apellidoAlumno" class="form-label">Apellido alumno</label>
                <input type="text" class="form-control" name="apellidoAlumno" id="apellidoAlumno" placeholder="Ingrese un apellido..." aria-describedby="apellidoAlumnoHelp" required>
                <div id="apellidoAlumnoHelp" class="form-text">Ej. Perez</div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 mb-3">
                <label for="dniAlumno" class="form-label">DNI alumno</label>
                <input type="text" class="form-control" name="dniAlumno" id="dniAlumno" placeholder="" max-lenght="8" min-lenght="8" aria-describedby="dniAlumnoHelp" maxlength="8" required>
                <div id="dniAlumnoHelp" class="form-text">Ej. 36456123</div>
              </div>
              <div class="col-lg-6 mb-3">
                <label for="cursoMatricula2" class="form-label">Curso a matricular</label>
                <select class="form-control form-select" name="cursoMatricula2[]" multiple id="cursoMatricula2" aria-label="Default select example" aria-describedby="cursoMatriculaHelp" style="width: 100%;" required>
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
                <input type="email" class="form-control" name="emailAlumno" id="emailAlumno" placeholder="" max-lenght="8" min-lenght="8" aria-describedby="emailAlumnoHelp" required>
                <div id="emailAlumnoHelp" class="form-text">Ej. 36456123</div>
              </div>
              <div class="col-lg-6 mb-3">
                <label for="telAlumno" class="form-label">Teléfono WhatsApp</label>
                <input type="text" class="form-control" name="telAlumno" id="telAlumno" placeholder="" max-lenght="8" min-lenght="8" aria-describedby="emailAlumnoHelp" maxlength="14" minlength="8" required>
                <div id="emailAlumnoHelp" class="form-text">Ej. 36456123</div>
              </div>
            </div>
            <div class="row">
              <label for="descripCurso" class="form-label">Subir comprobante</label>
              <input type="file" class="dropify" name="comprobante" data-height="200" required/>
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

  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#cursoMatricula2').select2();
    });
  $("#cursoMatricula").select2();
</script>
</body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</html>