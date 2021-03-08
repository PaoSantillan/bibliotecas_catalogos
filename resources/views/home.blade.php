@extends ('layouts.app')

@section ('content')
    @if(Auth::user()->hasRole('alumno'))
        <div class="container-fluid pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="wrap-base fix-w mt-5">
                        <h6 class="saludo">¡Hola, {{ Auth::user()->name }}! </h6>
                        <h6 class="aux-saludo">Desde el panel izquierdo podrás ver tus cursos, clases y contenidos.</h6>
                    </div>
                    <input name="id_" id="id_" value="{{$id}}" style="display: none;">
                </div>
            </div>
            <div class="row imagen-home mt-3">
            </div>
        </div>
    @elseif(Auth::user()->hasRole('profesor'))
        <div class="container-fluid pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="wrap-base fix-w mt-5">
                        <h6 class="saludo">¡Hola, {{ Auth::user()->name }}! </h6>
                        <h6 class="aux-saludo">Desde el panel izquierdo podrás crear y administrar tus cursos.</h6>
                    </div>
                    <input name="id_" id="id_" value="{{$id}}" style="display: none;">
                </div>
            </div>
            <div class="row imagen-home mt-3">
            </div>
        </div>
    @else
        <div class="container-fluid pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="wrap-base fix-w mt-5">
                        <h6 class="saludo">¡Hola, {{ Auth::user()->name }}! </h6>
                        <h6 class="aux-saludo">Desde el panel izquierdo podrás crear y administrar tus cursos.</h6>
                    </div>
                    <input name="id_" id="id_" value="{{$id}}" style="display: none;">
                </div>
            </div>
            <div class="row imagen-home mt-3">
            </div>
        </div>
    @endif

    @if(Session::has('cookie'))
            <input type="text" id="cookie_" value="{{ Session::get('cookie') }}" style="display: none;">

            <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
            <script type="text/javascript" src="{{ asset('js/cookie.js')}}"></script>
            <script type="text/javascript">
                setTimeout(function(){
                    if($('#cookie_').val() != null){
                    Cookies.set('aprobar-cursos-2021-'+{!! Auth::user()->id !!},$('#cookie_').val());
                }
            },1000);
            </script>
        @endif
@endsection