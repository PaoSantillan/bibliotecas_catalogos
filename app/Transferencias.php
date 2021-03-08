<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transferencias extends Model
{
    protected $fillable = [
        'course_id',
        'nombre',
        'dni',
        'telefono',
        'email',
        'comprobante',
        'estado'
    ];

    public function curso(){
        return $this->belongsTo('App\Course', 'course_id', 'id');
    }
}
