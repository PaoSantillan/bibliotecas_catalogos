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
                    <h6 style="text-align:center;">&nbsp; Editar ejemplar</h6>
                    <form method="POST" action="{{ URL::action('EjemplarController@update', $ejemplar->id) }}" class="mt-4 catalogos-form" >
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="biblioteca_id" class="form-label">Biblioteca *</label>
                                    <select class="form-control form-select" name="biblioteca_id" id="biblioteca_id" aria-label="Default select example" required>
                                        @foreach($bibliotecas as $biblioteca)
                                            <option value="{{$biblioteca->id}}" {{ ( $ejemplar->biblioteca_id == $biblioteca->id) ? 'selected' : '' }}>{{$biblioteca->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="tipo_ejemplar_id" class="form-label">Tipo de ejemplar *</label>
                                    <select class="form-control form-select" name="tipo_ejemplar_id" id="tipo_ejemplar_id" aria-label="Default select example" required>
                                        @foreach($tipos as $tipo)
                                            <option value="{{$tipo->id}}"  {{ ( $ejemplar->tipo_ejemplar_id == $tipo->id) ? 'selected' : '' }}>{{$tipo->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Titulo *</label>
                                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Ej: Influencia Del Pueblo Arabe En La Argentina" value="{{old('titulo', $ejemplar->titulo)}}" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="autor" class="form-label">Autor </label>
                                    <input type="text" class="form-control" name="autor" id="autor" placeholder="Ej: Peral Santiago M." value="{{old('autor', $ejemplar->autor)}}" >
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="cantidad" class="form-label">Cantidad de ejemplares *</label>
                                    <input type="number" class="form-control" name="cantidad" id="cantidad" aria-describedby="" value="{{old('cantidad', $ejemplar->cantidad)}}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="observaciones" class="form-label">Observaciones </label>
                                    <input type="text" class="form-control" name="observaciones" id="observaciones" placeholder="Ej: no posee contratapa" aria-describedby="" value="{{old('observaciones', $ejemplar->observaciones)}}" >
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción </label>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{old('descripcion', $ejemplar->descripcion)}}" aria-describedby="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="dia" class="form-label">Dia </label>
                                    <input type="number" class="form-control" name="dia" id="dia" aria-describedby="" value="{{old('dia', $ejemplar->dia)}}" >
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="mes" class="form-label">Mes </label>
                                    <input type="number" class="form-control" name="mes" id="mes" aria-describedby="" value="{{old('mes', $ejemplar->mes)}}" >
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="anio" class="form-label">Año </label>
                                    <input type="number" class="form-control" name="anio" id="anio" aria-describedby="" value="{{old('anio', $ejemplar->anio)}}" >
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="numero_inventario" class="form-label">Número inventario *</label>
                                    <input type="number" class="form-control" name="numero_inventario" id="numero_inventario" aria-describedby="" value="{{old('numero_inventario', $ejemplar->numero_inventario)}}" >
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="ISBN" class="form-label">ISBN </label>
                                    <input type="text" class="form-control" name="ISBN" id="ISBN" value="{{old('ISBN', $ejemplar->ISBN)}}" aria-describedby="">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="mb-3">
                                    <label for="volumen" class="form-label">Volumen </label>
                                    <input type="text" class="form-control" name="volumen" id="volumen" value="{{old('volumen', $ejemplar->volumen)}}" aria-describedby="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="donado" class="form-label">Donado </label>
                                    <input type="text" class="form-control" name="donado" id="donado" value="{{old('donado', $ejemplar->donado)}}" aria-describedby="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="editorial" class="form-label">Editorial </label>
                                    <input type="text" class="form-control" name="editorial" id="editorial" value="{{old('editorial', $ejemplar->editorial)}}" aria-describedby="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="mostrar" class="form-label">Mostrar al público *</label>
                                    <select class="form-control form-select" name="mostrar" id="mostrar" aria-label="Default select example" required>
                                        <option value="SI" {{ ( $ejemplar->mostrar == 1) ? 'selected' : '' }}>SI</option>
                                        <option value="NO" {{ ( $ejemplar->mostrar == 0) ? 'selected' : '' }}>NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12 mt-4 mt-5">
                                <button type="submit" class="btn btn-primary btn-celeste-dash">Editar ejemplar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection