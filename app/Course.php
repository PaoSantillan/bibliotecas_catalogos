<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $table = 'courses';
    public $primaryKey = 'id';
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'image',
        'institucion',
        'price',
        'init_date',
        'hora_init_date',
        'end_date',
        'hora_end_date',
        'cbu'
    ];

    public function profesor(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function clases(){
        return $this->hasMany('App\Lesson', 'course_id', 'id');
    }

    public function contenidos(){
        return $this->hasMany('App\Content', 'course_id', 'id');
    }

    public function alumnos(){
        return $this->belongsToMany('App\User', 'course_student', 'course_id', 'user_id');
    }

    public function comentarios(){
        return $this->hasMany('App\CommentCourse', 'course_id', 'id');
    }

    public function comoCurso1(){
        return $this->hasMany('App\CourseGeneral', 'course_id_1', 'id');
    }

    public function comoCurso2(){
        return $this->hasMany('App\CourseGeneral', 'course_id_2', 'id');
    }
}
