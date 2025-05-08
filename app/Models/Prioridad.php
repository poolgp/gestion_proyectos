<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prioridad extends Model
{
    use HasFactory;

    protected $table = 'prioridades';
    protected $primaryKey = 'prioridad_id';
    public $timestamps = false;

    // Relación uno a muchos con Tareas
    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'prioridad_id');
    }
}
