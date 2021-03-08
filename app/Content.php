<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;

    protected $table = 'contents';
    public $primaryKey = 'id';
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'course_id',
        'attached',
        'name',
        'created_user_id'
    ];

    public function curso(){
        return $this->belongsTo('App\Course', 'course_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'created_user_id', 'id');
    }
}