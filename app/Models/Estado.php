<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados';
    protected $primaryKey = 'estado_id';
    public $timestamps = false;

    // Relación uno a muchos con Tareas
    public function tareas()
    {
        return $this->hasMany(Tarea::class, 'estado_id');
    }
}
