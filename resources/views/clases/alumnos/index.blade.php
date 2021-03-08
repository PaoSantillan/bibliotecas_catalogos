@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-check-circle"></i> Listado de clases</h6>
                    <h6 class="info-sec-tit mt-3">Detalle con información de las clases</h6>
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="buscarClase" class="table table-striped table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Enlace</th>
                                            <th>Pertenece a</th>
                                            <th>Fecha</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($clases as $clase)
                                        <tr>
                                            <td>{{$clase->name}}</td>
                                            <td>{{$clase->link}}</td>
                                            @if($clase->course_id != null)
                                                <td>{{$clase->curso->name}}</td>
                                            @else
                                                <td>Sin curso asignado</td>
                                            @endif
                                            <td>{{$clase->created_at}}</td>
                                            <td>
                                                <a href="{{ URL::action('ClaseController@showAlumno', [encrypt($clase->curso->id), $clase->id]) }}" class="btn btn-info text-white">
                                                    <i class="cil-zoom"></i>
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
   
    $('#buscarClase').DataTable(
        {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        }
    );


   
</script>

@endsection