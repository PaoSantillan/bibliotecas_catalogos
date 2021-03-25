<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Ejemplar;
use App\Biblioteca;
use App\TipoEjemplar;

class EjemplarController extends Controller
{
    public function index()
    {
        $result = Ejemplar::where('mostrar', 1)->orderBy('id', 'desc')->get();
        return view('ejemplares.index', ['ejemplares' => $result]);
    }

    public function indexAdmin()
    {
        $result = Ejemplar::all();
        return view('ejemplares.indexAdmin', ['ejemplares' => $result]);
    }

    public function create(){
        $bibliotecas = Biblioteca::all();
        $tipos = TipoEjemplar::all();
        return view('ejemplares.create', ['bibliotecas' => $bibliotecas, 'tipos' => $tipos]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'biblioteca_id' => 'bail|required',
            'tipo_ejemplar_id' => 'bail|required',
            'titulo' => 'bail|required|min:3|max:250',
            'autor' => 'bail|max:250',
            'cantidad' => 'bail|integer|nullable',
            'observaciones' => 'bail|max:250',
            'descripcion' => 'bail|max:250',
            'dia' => 'bail|integer|nullable',
            'mes' => 'bail|integer|nullable',
            'anio' => 'bail|integer|nullable',
            'numero_inventario' => 'bail|integer|nullable',
            'ISBN' => 'bail|max:250',
            'volumen' => 'bail|max:250',
            'donado' => 'bail|max:250',
            'editorial' => 'bail|max:250',
            'mostrar' => 'bail|required'
        ]);

        $item = new Ejemplar();
        $item->fill([
            'biblioteca_id' => $request->biblioteca_id,
            'tipo_ejemplar_id' =>  $request->tipo_ejemplar_id,
            'titulo' =>  $request->titulo,
            'autor' =>  $request->autor,
            'cantidad' =>  $request->cantidad,
            'observaciones' =>  $request->observaciones,
            'descripcion' =>  $request->descripcion,
            'dia' =>  $request->dia,
            'mes' =>  $request->mes,
            'anio' =>  $request->anio,
            'numero_inventario' =>  $request->numero_inventario,
            'ISBN' =>  $request->ISBN,
            'volumen' =>  $request->volumen,
            'donado' =>  $request->donado,
            'editorial' =>  $request->editorial,
            'mostrar' => ($request->mostrar == 'SI') ? 1 : 0
        ]);
        $item->save();

        $request->session()->flash('mensaje-success', 'El ejemplar fue creado exitosamente.');
        return redirect('ejemplares');
    }

    public function show($id){
        $item = Ejemplar::findOrFail($id);
        $bibliotecas = Biblioteca::all();
        $tipos = TipoEjemplar::all();
        return view('ejemplares.show', ['ejemplar' => $item,'bibliotecas' => $bibliotecas, 'tipos' => $tipos]);
    }

    public function edit($id){
        $item = Ejemplar::findOrFail($id);
        $bibliotecas = Biblioteca::all();
        $tipos = TipoEjemplar::all();
        return view('ejemplares.update', ['ejemplar' => $item,'bibliotecas' => $bibliotecas, 'tipos' => $tipos]);
    }

    public function update(Request $request, $id){
        $item = Ejemplar::findOrFail($id);

        $this->validate($request, [ 
            'biblioteca_id' => 'bail|required',
            'tipo_ejemplar_id' => 'bail|required',
            'titulo' => 'bail|required|min:3|max:250',
            'autor' => 'bail|max:250',
            'cantidad' => 'bail|integer|nullable',
            'observaciones' => 'bail|max:250',
            'descripcion' => 'bail|max:250',
            'dia' => 'bail|integer|nullable',
            'mes' => 'bail|integer|nullable',
            'anio' => 'bail|integer|nullable',
            'numero_inventario' => 'bail|integer|nullable',
            'ISBN' => 'bail|max:250',
            'volumen' => 'bail|max:250',
            'donado' => 'bail|max:250',
            'editorial' => 'bail|max:250',
            'mostrar' => 'bail|required'
        ]);

        $item->biblioteca_id = $request->biblioteca_id;
        $item->tipo_ejemplar_id =  $request->tipo_ejemplar_id;
        $item->titulo =  $request->titulo;
        $item->autor =  $request->autor;
        $item->cantidad =  $request->cantidad;
        $item->observaciones =  $request->observaciones;
        $item->descripcion =  $request->descripcion;
        $item->dia =  $request->dia;
        $item->mes =  $request->mes;
        $item->anio =  $request->anio;
        $item->numero_inventario =  $request->numero_inventario;
        $item->ISBN =  $request->ISBN;
        $item->volumen =  $request->volumen;
        $item->donado =  $request->donado;
        $item->editorial =  $request->editorial;
        $item->mostrar = ($request->mostrar == 'SI') ? 1 : 0;

        $item->save();
        
        $request->session()->flash('mensaje-success', 'El ejemplar fue modificado exitosamente.');
        return redirect('ejemplares');
    }

    public function destroy(Request $request, $id){
        $item = Ejemplar::findOrFail($id);
        $item->delete();

        $request->session()->flash('mensaje-success', 'El ejemplar fue eliminado exitosamente.');
        return redirect('ejemplares');
    }
}
