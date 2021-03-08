<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes;

    protected $table = 'lessons';
    public $primaryKey = 'id';
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'course_id',
        'link',
        'name',
        'open',
        'description',
        'type'
    ];

    public function curso(){
        return $this->belongsTo('App\Course', 'course_id', 'id');
    }

    public function comentarios(){
        return $this->hasMany('App\CommentLesson', 'lesson_id', 'id');
    }
}