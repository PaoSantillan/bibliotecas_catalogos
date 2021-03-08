@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-check-circle"></i> Listado de contenidos</h6>
                    <h6 class="info-sec-tit mt-3"></h6>
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="buscarClase" class="table table-striped table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Curso</th>
                                            <th>Creado por</th>
                                            <th>Fecha</th>
                                            <th>Descargar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contenidos as $contenido)
                                        <tr>
                                            <td>{{$contenido->name}}</td>
                                            <td>{{$contenido->curso->name}}</td>
                                            <td>{{$contenido->user->name}}</td>
                                            <td>{{$contenido->created_at}}</td>
                                            <td>
                                                <a href="{{ URL::action('ContenidoController@displayFile', $contenido->attached) }}" class="btn btn-info text-white">
                                                    <i class="cil-arrow-thick-to-bottom"></i>
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