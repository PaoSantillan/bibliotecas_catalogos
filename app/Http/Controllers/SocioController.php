<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Socio;

class SocioController extends Controller
{
    public function index(){
        $result = Socio::orderBy('id', 'desc')->get();
        return view('socios.index', ['socios' => $result]);
    }

    public function showCarnet($id){
        $result = Socio::findOrFail($id);
        $pdf = \PDF:: loadView('socios.carnet', ['socio' => $result]);
        $pdf->setPaper('A4');
        return $pdf->stream();
    }
}
