<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseGeneral extends Model
{
    use SoftDeletes;

    protected $table = 'course_general';
    public $primaryKey = 'id';
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'user_id',
        'user_description',
        'image',
        'institucion',
        'code',
        'course_id_1',
        'price_1',
        'course_id_2',
        'price_2'
    ];

    public function curso1(){
        return $this->belongsTo('App\Course', 'course_id_1', 'id');
    }

    public function curso2(){
        return $this->belongsTo('App\Course', 'course_id_2', 'id');
    }

    public function profesor(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}