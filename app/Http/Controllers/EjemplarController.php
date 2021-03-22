<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Ejemplar;

class EjemplarController extends Controller
{
    public function index()
    {
        $result = Ejemplar::where('mostrar', 1)->orderBy('id', 'desc')->get();
        return view('ejemplares.index', ['ejemplares' => $result]);
    }
}
