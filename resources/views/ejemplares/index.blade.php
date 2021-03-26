@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="info-sec-tit mt-3">Catálogo de Ejemplares</h6>
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Ver</th>
                                            <th>Nro.</th>
                                            <th>Tipo</th>
                                            <th>Biblioteca</th>
                                            <th>Dirección</th>
                                            <th>Titulo</th>
                                            <th>Autor</th>
                                            <th>Cantidad</th>
                                            <th>Agregado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ejemplares as $ejemplar)
                                        <tr>
                                            <td>
                                                <a href="{{ URL::action('EjemplarController@show', $ejemplar->id) }}" class="btn btn-info text-white btn-editar">
                                                    <i class="cil-search"></i>
                                                </a>
                                            </td>
                                            <td>{{$ejemplar->id}}</td>
                                            <td>{{$ejemplar->tipo->nombre}}</td>
                                            <td>{{$ejemplar->biblioteca->nombre}}</td>
                                            <td>{{$ejemplar->biblioteca->direccion}}</td>
                                            <td>{{$ejemplar->titulo}}</td>
                                            <td>{{$ejemplar->autor}}</td>
                                            <td>{{$ejemplar->cantidad}}</td>
                                            <td>{{$ejemplar->created_at}}</td>
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
    $('#table').DataTable(
        {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },

            "order": [[ 0, "desc" ]],
        }
    );
</script>
@endsection