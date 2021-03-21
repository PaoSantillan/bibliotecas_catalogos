<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ejemplar extends Model
{
    use SoftDeletes;

    protected $table = 'ejemplares';
    public $primaryKey = 'id';
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'tipo_ejemplar_id',
        'biblioteca_id',
        'cantidad',
        'autor',
        'titulo',
        'observaciones',
        'descripcion',
        'dia',
        'mes',
        'anio',
        'numero_inventario',
        'ISBN',
        'volumen',
        'donado',
        'editorial'
    ];

    public function tipo(){
        return $this->belongsTo('App\TipoEjemplar', 'tipo_ejemplar_id', 'id');
    }

    public function biblioteca(){
        return $this->belongsTo('App\Biblioteca', 'biblioteca_id', 'id');
    }

    public function prestamos(){
        return $this->hasMany('App\Prestamo', 'ejemplar_id', 'id');
    }
}