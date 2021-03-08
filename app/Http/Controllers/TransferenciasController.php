<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transferencias;

class TransferenciasController extends Controller{
    
    public function index(){
    	$trans = Transferencias::where('estado', 0)->get();
    	$trans_ = Transferencias::where('estado', 1)->get();

    	return view('transferencias', ['trans' => $trans, 'trans_' => $trans_]);
    }
    public function aprobar(Request $request, $id){
    	$trans = Transferencias::findOrFail(decrypt($id));

    	$trans->estado = 1;
    	$trans->save();

    	$request->session()->flash('mensaje-success', 'La transferencia ah sido aprobada.');
        return redirect('/comprobantes');

    }
}
