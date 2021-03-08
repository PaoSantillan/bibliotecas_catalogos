@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
@include('compartido.errores')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="wrap-base fix-w mt-5">
                    <h6 class="titulo-seccion"><i class="cil-envelope-letter"></i> Comprobantes de pagos para cursos</h6>
                    <h6 class="info-sec-tit mt-3">Detalle con información de transferencias en espera</h6>
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="tespera" class="table table-striped table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>DNI</th>
                                            <th>Email</th>
                                            <th>Teléfono</th>
                                            <th>Curso</th>
                                            <th>Descargar</th>
                                            <th>Aceptar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($trans as $t)
                                            <tr>
                                                <td>{{$t->nombre}}</td>
                                                <td>{{$t->dni}}</td>
                                                <td>{{$t->email}}</td>
                                                <td>{{$t->telefono}}</td>
                                                <td>
                                                    @foreach(explode('#', $t->course_id) as $c)
                                                        @if($c)
                                                            {{ $c }}<br>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a class="btn btn-info text-white" href="{{ asset($t->comprobante)}}" target="_blank">
                                                        <i class="fas fa-download"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-success text-white" onclick="eliminarSweet({{$t->id}})">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                    <a id="btn_{{$t->id}}" href="{{ URL::action('TransferenciasController@aprobar', encrypt($t->id)) }}"></a>
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
                    <h6 class="titulo-seccion"><i class="cil-thumb-up"></i> Comprobantes de pagos aprobados</h6>
                    <h6 class="info-sec-tit mt-3">Detalle con información de transferencias aprobadas</h6>
                    <div class="row justify-content-center mt-4">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table id="taprobado" class="table table-striped table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>DNI</th>
                                            <th>Email</th>
                                            <th>Teléfono</th>
                                            <th>Curso</th>
                                            <th>Descargar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($trans_ as $t)
                                            <tr>
                                                <td>{{$t->nombre}}</td>
                                                <td>{{$t->dni}}</td>
                                                <td>{{$t->email}}</td>
                                                <td>{{$t->telefono}}</td>
                                                <td>
                                                    @foreach(explode('#', $t->course_id) as $c)
                                                        @if($c)
                                                            {{ $c }}<br>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a class="btn btn-info text-white" href="{{ asset($t->comprobante)}}" target="_blank">
                                                        <i class="fas fa-download"></i>
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
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
    function eliminarSweet(id_){
        const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
        title: '¿Aprobar?',
        text: "Este cambio no se podrá revertir",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, aprobar',
        cancelButtonText: 'No, cancelar',
        reverseButtons: true
        }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
            'Aprobado',
            'Se aprobó el comprobante con éxito.',
            'success'
            )
            window.location.href = document.getElementById('btn_'+id_).getAttribute('href');
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