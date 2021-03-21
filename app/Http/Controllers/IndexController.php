<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseGeneral;
use App\CommentCourse;

class IndexController extends Controller
{
    public function index()
    {
        return view('home');
    }
}