<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';
    public $timestamps = false;

    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, 'proyectos_usuarios', 'usuario_id', 'proyecto_id')
            ->withPivot('rol_id');
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'usuario_id');
    }
}
