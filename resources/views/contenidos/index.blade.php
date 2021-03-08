@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-check-circle"></i> Listado de contenidos</h6>
                    <h6 class="info-sec-tit mt-3">Detalle con información de los contenidos creados</h6>
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="buscarContenidos" class="table table-striped table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Curso</th>
                                            <th>Creado por</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contenidos as $contenido)
                                        <tr>
                                            <td>{{$contenido->name}}</td>
                                            <td>{{$contenido->curso->name}}</td>
                                            <td>{{$contenido->user->name}}</td>
                                            <td>
                                                <a href="{{ URL::action('ContenidoController@edit', $contenido->id) }}" class="btn btn-info text-white">
                                                    <i class="cil-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger text-white" onclick="eliminarSweet({{$contenido->id}})">
                                                    <i class="cil-trash"></i>
                                                </a>
                                                <form id="{{$contenido->id}}" action="{{ URL::action('ContenidoController@destroy', $contenido->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>

                                        <!--<tr>
                                            <td>Contenido fabuloso</td>
                                            <td>Biología</td>
                                            <td>Usuario sorprendente</td>
                                            <td>
                                                <a class="btn btn-info text-white">
                                                    <i class="cil-zoom"></i>
                                                </a>
                                                <a class="btn btn-danger text-white" onclick="eliminarSweet()">
                                                    <i class="cil-trash"></i>
                                                </a>
                                            </td>
                                        </tr>-->
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
   
    $('#buscarContenidos').DataTable(
        {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        }
    );


   
</script>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function eliminarSweet($id){
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: '¿Eliminar?',
        text: "Este cambio no se podrá revertir",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, eliminar',
        cancelButtonText: 'No, cancelar',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            event.preventDefault(); document.getElementById($id).submit();
            swalWithBootstrapButtons.fire(
            'Eliminado',
            'El registro se eliminó con éxito.',
            'success'
            )
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
            'Cancelado',
            'No se realizaron cambios.',
            'error'
            )
        }
        })
    }
</script>
@endsection