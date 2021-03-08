<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseGeneral;
use App\CommentCourse;

class IndexController extends Controller
{
    /**
     * Devuelve el listado de los cursos disponibles y sus comentarios.
     *
     * @return view
     */
    public function index()
    {
        $result = Course::orderBy('id', 'desc')->get();
        $comentarios = CommentCourse::with('usuario')->orderBy('id', 'desc')->where('status', 1)->offset(0)->limit(3)->get(); 
        return view('landing-home', ['cursos' => $result, 'comentarios' => $comentarios]);
    }

    public function info($id){
        $curso = CourseGeneral::findOrFail($id);
        $result = Course::orderBy('id', 'desc')->get();
        $comentarios = CommentCourse::with('usuario')->orderBy('id', 'desc')->where('status', 1)->offset(0)->limit(3)->get(); 
        return view('landing-info', ['curso' => $curso, 'comentarios' => $comentarios, 'cursos' => $result]);
    }
}