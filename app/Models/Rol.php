<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'rol_id';
    public $timestamps = false;

    // Relación uno a muchos con Proyectos_Usuarios
    public function proyectosUsuarios()
    {
        return $this->hasMany(ProyectoUsuario::class, 'rol_id');
    }
}
