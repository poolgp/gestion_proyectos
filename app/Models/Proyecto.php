<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// class Proyecto extends Model
// {
//     use HasFactory;

//     protected $table = 'proyectos';
//     protected $primaryKey = 'proyecto_id';
//     public $timestamps = false;

//     // Relación muchos a muchos con Usuarios (Corrigiendo duplicado)
//     public function usuarios()
//     {
//         return $this->belongsToMany(Usuario::class, 'proyectos_usuarios', 'proyecto_id', 'usuario_id')
//             ->withPivot('rol_id'); // Permite acceder al rol en la relación
//     }

//     // Relación uno a muchos con Tareas
//     public function tareas()
//     {
//         return $this->hasMany(Tarea::class, 'proyecto_id');
//     }
// }
class Proyecto extends Model
{
    use HasFactory;

    protected $table = 'proyectos';
    protected $primaryKey = 'proyecto_id';
    public $timestamps = false;

    protected $fillable = ['nombre_p', 'descripcion', 'fecha_inicio', 'fecha_fin'];

    public function usuarios()
    {
        return $this->belongsToMany(Usuario::class, 'proyectos_usuarios', 'proyecto_id', 'usuario_id')
            ->withPivot('rol_id');
    }

    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'proyecto_id');
    }
}
