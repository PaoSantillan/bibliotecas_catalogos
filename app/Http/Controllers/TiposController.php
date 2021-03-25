<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\TipoEjemplar;
use Illuminate\Support\Facades\Hash;

class TiposController extends Controller
{
    public function index(){
        $result = TipoEjemplar::orderBy('id', 'desc')->get();
        return view('tipos.index', ['tipos' => $result]);
    }

    public function create(){
        return view('tipos.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'bail|required|min:3|max:250',
            'descripcion' => 'bail|required|min:3|max:250'
        ]);

        $item = new TipoEjemplar();
        $item->fill([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
        ]);
        $item->save();

        $request->session()->flash('mensaje-success', 'El tipo de ejemplar fue creado exitosamente.');
        return redirect('tiposEjemplares');
    }

    public function edit($id){
        $item = TipoEjemplar::findOrFail($id);

        return view('tipos.update',['tipo' => $item]);
    }

    public function update(Request $request, $id){
        $item = TipoEjemplar::findOrFail($id);

        $this->validate($request, [ 
            'nombre' => 'bail|required|min:3|max:250',
            'descripcion' => 'bail|required|min:3|max:250'
        ]);

        $item->nombre = $request->input('nombre');
        $item->descripcion = $request->input('descripcion');

        $item->save();
        
        $request->session()->flash('mensaje-success', 'El tipo de ejemplar fue modificado exitosamente.');
        return redirect('tiposEjemplares');
    }

    public function destroy(Request $request, $id){
        $item = TipoEjemplar::findOrFail($id);
        $item->delete();

        $request->session()->flash('mensaje-success', 'El tipo de ejemplar fue eliminado exitosamente.');
        return redirect('tiposEjemplares');
    }
}