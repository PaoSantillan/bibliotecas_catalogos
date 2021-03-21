<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biblioteca extends Model
{
    use SoftDeletes;

    protected $table = 'bibliotecas';
    public $primaryKey = 'id';
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre',
        'descripcion',
        'direccion'
    ];

    public function ejemplares(){
        return $this->hasMany('App\Ejemplar', 'biblioteca_id', 'id');
    }
}