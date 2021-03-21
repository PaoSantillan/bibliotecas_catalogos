<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use SoftDeletes;

    protected $table = 'socios';
    public $primaryKey = 'id';
    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre',
        'dni',
        'fecha_nacimiento',
        'direccion',
        'telefono',
        'foto',
        'email'
    ];

    public function prestamos(){
        return $this->hasMany('App\Prestamo', 'socio_id', 'id');
    }
}
