<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentCourse extends Model
{
    use SoftDeletes;

    protected $table = 'comment_course';
    public $primaryKey = 'id';
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'author',
        'comment',
        'user_id',
        'course_id',
        'score',
        'status'
    ];

    public function curso(){
        return $this->belongsTo('App\Course', 'course_id', 'id');
    }

    public function usuario(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}