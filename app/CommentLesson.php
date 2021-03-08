<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentLesson extends Model
{
    use SoftDeletes;

    protected $table = 'comment_lesson';
    public $primaryKey = 'id';
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title',
        'comment',
        'user_id',
        'lesson_id',
        'status'
    ];

    public function clase(){
        return $this->belongsTo('App\Lesson', 'lesson_id', 'id');
    }

    public function usuario(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}