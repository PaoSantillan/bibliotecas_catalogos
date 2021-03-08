<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aprobar | Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/aprobar.css') }}" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid" id="login">
        <img src="{{ asset('img/logofullsvg.svg')}}" alt="">

        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="wrap-login">
                    <h5>¡Bienvenidos!</h5>
                    <h6>Por favor, ingresa tus datos para acceder a la plataforma.</h6>
                    <form method="POST" action="{{ route('login') }}" id="form_login">
                    @csrf
                        <div class="mb-1">
                            <input type="text" class="form-control in-date" name="username" id="nombreusuario" placeholder="Nombre de usuario" aria-describedby="nombreHelp">
                        </div>
                        <div class="mb-1">
                            <input type="password" class="form-control in-date" name="password" id="password" placeholder="Contraseña" aria-describedby="passHelp">
                            <input type="text" id="cookie" name="cookie" value="" style="display: none;">
                            <input type="text" id="navegador" name="navegador" value="" style="display: none;">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="recordarme">
                            <label class="form-check-label check-date" for="recordarme">Recordar nombre de usuario</label>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <a type="" style="width:100%" class="btn btn-primary btn-aprobar-login btn-block text-white" onclick="subir();">Ingresar</a>
                            </div>
                        </div>
                        <!--<div class="">
                            <p>O inicia sesión con tu cuenta de Facebok o Gmail</p>
                        </div>-->
                    </form>
                </div>
            </div>
            @if ($errors->has('cookie'))
                <span class="alert alert-warning alert-block col-md-12 alert-dismissible fade show" role="alert">
                    <strong>{{ $errors->first('cookie') }}</strong>
                </span>
            @endif
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/cookie.js')}}"></script>
<script>
    $("#nombreusuario").keypress(function(e) {
        if(e.which == 13) {
            subir();
        }
    });
    $("#password").keypress(function(e) {
        if(e.which == 13) {
            subir();
        }
    });

    function subir(){
        if($('#nombreusuario').val() == ""){
            return 0
        }
        $.ajax({
            type: "get",
            url: "/usuario/name/"+$('#nombreusuario').val(),
            success: function( respuesta ){
                $('#cookie').val(Cookies.get('aprobar-cursos-2021-'+respuesta));
                $('#navegador').val(navigator.userAgent);
                $('#form_login').submit()
            },
            error: function() {
              alert("No se pueden obtener los cursos - JSON error");
            }
        });
    }

</script>

</html>