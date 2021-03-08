@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-speech"></i> Listado de comentarios</h6>
                    <p class="info-seccion-aux">Desde esta sección podrás visualizar los comentarios de la clase <strong>{{$clase->name}}</strong>.</p>
                    <form action="">
                        <div class="row justify-content-between mt-4">
                            <div class="col-lg-14">
                                <div class="row mt-3">
                                    <div class="table-responsive">
                                        <table id="matricularAlumno" class="table table-striped table-hover align-middle">
                                            <thead>
                                                <tr>
                                                    <th>Titulo</th>
                                                    <th>Comentario</th>
                                                    <th>Autor</th>
                                                    <th>Estado</th>
                                                    <th>Fecha</th>
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($clase->comentarios as $comentario)
                                                <tr>
                                                    <td>{{$comentario->title}}</td>
                                                    <td>{{$comentario->comment}}</td>
                                                    <td>{{$comentario->usuario->name}}</td>
                                                    <td>{{ $comentario->status == 1 ? 'ACTIVO' : 'INACTIVO'}}</td>
                                                    <td>{{$comentario->created_at}}</td>
                                                    <td>
                                                        <a href="{{ URL::action('ClaseController@cambiarEstado', $comentario->id) }}" class="btn btn-success text-white">
                                                            <i class="cil-loop-circular"></i>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
<script>
   
    $('#matricularAlumno').DataTable(
        {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        }
    );
</script>
@endsection