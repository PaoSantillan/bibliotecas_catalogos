@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="info-sec-tit mt-3">Listado de usuarios</h6>
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Nro.</th>
                                            <th>Nombre</th>
                                            <th>Usuario</th>
                                            <th>Telefono</th>
                                            <th>Email</th>
                                            <th>Rol</th>
                                            <th>Creado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usuarios as $usuario)
                                        <tr>
                                            <td>{{$usuario->id}}</td>
                                            <td>{{$usuario->nombre}}</td>
                                            <td>{{$usuario->username}}</td>
                                            <td>{{$usuario->telefono}}</td>
                                            <td>{{$usuario->email}}</td>
                                            <td>
                                                @foreach($usuario->roles as $rol)
                                                    {{ $rol->description }}
                                                @endforeach
                                            </td>
                                            <td>{{$usuario->created_at}}</td>
                                            <td>
                                                <a href="{{ URL::action('UsuarioController@edit', $usuario->id) }}" class="btn btn-info text-white btn-editar">
                                                    <i class="cil-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger text-white btn-eliminar" onclick="eliminarSweet({{$usuario->id}})">
                                                    <i class="cil-trash"></i>
                                                </a>
                                                <form id="{{$usuario->id}}" action="{{ URL::action('UsuarioController@destroy', $usuario->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
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
    $('#table').DataTable(
        {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },

            "order": [[ 0, "desc" ]],
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
        title: '??Eliminar?',
        text: "Este cambio no se podr?? revertir",
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
            'El registro se elimin?? con ??xito.',
            'success'
            )
        } else if (
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