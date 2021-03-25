<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Biblioteca;
use Illuminate\Support\Facades\Hash;

class BibliotecaController extends Controller
{
    public function index(){
        $result = Biblioteca::orderBy('id', 'desc')->get();
        return view('bibliotecas.index', ['bibliotecas' => $result]);
    }

    public function create(){
        return view('bibliotecas.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'nombre' => 'bail|required|min:3|max:250',
            'descripcion' => 'bail|required|min:3|max:250',
            'direccion' => 'bail|required|min:3|max:250'
        ]);

        $item = new Biblioteca();
        $item->fill([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'direccion' => $request->input('direccion'),
        ]);
        $item->save();

        $request->session()->flash('mensaje-success', 'La biblioteca fue creada exitosamente.');
        return redirect('bibliotecas');
    }

    public function edit($id){
        $item = Biblioteca::findOrFail($id);

        return view('bibliotecas.update',['biblioteca' => $item]);
    }

    public function update(Request $request, $id){
        $item = Biblioteca::findOrFail($id);

        $this->validate($request, [ 
            'nombre' => 'bail|required|min:3|max:250',
            'descripcion' => 'bail|required|min:3|max:250',
            'direccion' => 'bail|required|min:3|max:250'
        ]);

        $item->nombre = $request->input('nombre');
        $item->descripcion = $request->input('descripcion');
        $item->direccion = $request->input('direccion');

        $item->save();
        
        $request->session()->flash('mensaje-success', 'La biblioteca fue modificada exitosamente.');
        return redirect('bibliotecas');
    }

    public function destroy(Request $request, $id){
        $item = Biblioteca::findOrFail($id);
        $item->delete();

        $request->session()->flash('mensaje-success', 'La biblioteca  fue eliminado exitosamente.');
        return redirect('bibliotecas');
    }
}