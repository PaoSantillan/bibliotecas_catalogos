@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="info-sec-tit mt-3">Listado de socios</h6>
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="buscarCurso" class="table table-striped table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>DNI</th>
                                            <th>Fecha de nacimiento</th>
                                            <th>Dirección</th>
                                            <th>Telefono</th>
                                            <th>Email</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($socios as $socio)
                                        <tr>
                                            <td>{{$socio->nombre}}</td>
                                            <td>{{$socio->dni}}</td>
                                            <td>{{$socio->fecha_nacimiento}}</td>
                                            <td>{{$socio->direccion}}</td>
                                            <td>{{$socio->telefono}}</td>
                                            <td>{{$socio->email}}</td>
                                            <td>
                                                <a href="{{ URL::action('SocioController@showCarnet', $socio->id) }}" class="btn btn-info text-white">
                                                    <i class="cil-contact"></i>
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
    $('#buscarCurso').DataTable(
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
<script src="https://unpkg.com/popper.js@1"></script>
<script src="https://unpkg.com/tippy.js@5"></script>
<script>
   const elemento1 = tippy(document.querySelector('.btn-matricular'));
   elemento1.setProps({content: 'Matricular'});
   
   const elemento2 = tippy(document.querySelector('.btn-quitarmatricula'));
   elemento2.setProps({content: 'Quitar matricula'});
   
   const elemento3 = tippy(document.querySelector('.btn-editar'));
   elemento3.setProps({content: 'Editar'});
   
   const elemento4 = tippy(document.querySelector('.btn-eliminar'));
   elemento4.setProps({content: 'Eliminar'});
   
   const elemento5 = tippy(document.querySelector('.btn-coment'));
   elemento5.setProps({content: 'Comentarios'});
</script>
@endsection