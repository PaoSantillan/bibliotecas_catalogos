@extends ('layouts.app')

@section ('content')
@include('compartido.mensajes')
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                             <li>{{ $error}}</li>
                            @endforeach
                        </ul> 
                    </div>
                @endif
                <div class="wrap-base fix-w mt-5">
                    <h6 style="text-align:center;">&nbsp; Editar biblioteca</h6>
                    <form method="POST" action="{{ URL::action('BibliotecaController@update', $biblioteca->id) }}" class="mt-4 catalogos-form" >
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre *</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="" value="{{old('nombre', $biblioteca->nombre)}}" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción *</label>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{old('descripcion', $biblioteca->descripcion)}}" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección *</label>
                                    <input type="text" class="form-control" name="direccion" id="direccion" value="{{old('direccion', $biblioteca->direccion)}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 mt-4 mt-5">
                                <button type="submit" class="btn btn-primary btn-celeste-dash">Editar biblioteca</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection