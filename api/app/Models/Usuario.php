<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = [
        'nombre_completo', 'correo_e', 'password', 'telefono', 'ciudad', 'fecha_registro'
    ];

    protected $hidden = ['password'];

    public function identidad()
    {
        return $this->hasOne(Identidad::class, 'id_usuario', 'id_usuario');
    }

    public function responsable()
    {
        return $this->hasOne(Responsable::class, 'id_usuario', 'id_usuario');
    }

    public function procesosAdopcion()
    {
        return $this->hasMany(ProcesoAdopcion::class, 'id_usuario', 'id_usuario');
    }
}
