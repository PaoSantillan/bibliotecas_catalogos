<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoEjemplar extends Model
{
    use SoftDeletes;

    protected $table = 'tipo_ejemplar';
    public $primaryKey = 'id';
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

    public function ejemplares(){
        return $this->hasMany('App\Ejemplar', 'tipo_ejemplar_id', 'id');
    }
}