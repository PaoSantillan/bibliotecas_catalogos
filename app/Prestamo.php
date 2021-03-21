<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestamo extends Model
{
    use SoftDeletes;

    protected $table = 'prestamos';
    public $primaryKey = 'id';
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'socio_id',
        'ejemplar_id',
        'user_id',
        'fecha_prestamo',
        'fecha_devolucion',
        'observaciones',
        'estado'
    ];

    public function socio(){
        return $this->belongsTo('App\Socio', 'socio_id', 'id');
    }

    public function ejemplar(){
        return $this->belongsTo('App\Ejemplar', 'ejemplar_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}