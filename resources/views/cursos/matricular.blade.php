@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-smile-plus"></i> Matricular alumnos al curso <strong>{{$curso->name}}</strong>.</h6>
                    <h6 class="info-sec-tit mt-3">Busca a tus estudiantes.</h6>
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="tespera" class="table table-striped table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Nombre y apellido</th>
                                            <th>Username</th>
                                            <th>DNI</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($alumnos as $alumno)
                                            <tr>
                                                <td>{{$alumno->name}}</td>
                                                <td>{{$alumno->username}}</td>
                                                <td>{{$alumno->dni}}</td>
                                                <td>
                                                    <a href="{{ URL::action('CursoController@agregarAlumno', [encrypt($alumno->id), encrypt($curso->id)]) }}" class="btn btn-success text-white">
                                                        <i class="cil-task"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-user-unfollow"></i> Quitar alumnos del curso.</h6>
                    <h6 class="info-sec-tit mt-3">Busca a tus estudiantes.</h6>
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="taprobado" class="table table-striped table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Nombre y apellido</th>
                                            <th>Username</th>
                                            <th>DNI</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($matriculados as $matriculado)
                                            <tr>
                                                <td>{{$matriculado->name}}</td>
                                                <td>{{$matriculado->username}}</td>
                                                <td>{{$matriculado->dni}}</td>
                                                <td>
                                                    <a href="{{ URL::action('CursoController@quitarAlumno', [encrypt($matriculado->id), encrypt($curso->id)]) }}" class="btn btn-danger text-white">
                                                        <i class="cil-user-unfollow"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>
   
    $('#tespera').DataTable(
        {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        }
    );
    $('#taprobado').DataTable(
        {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        }
    );


   
</script>
@endsection