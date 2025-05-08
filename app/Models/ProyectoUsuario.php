<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectoUsuario extends Model
{
    use HasFactory;

    protected $table = 'proyectos_usuarios';
    protected $primaryKey = 'proyecto_usuario_id';
    public $timestamps = false;

    // Relación inversa con Proyecto
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }

    // Relación inversa con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    // Relación inversa con Rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}
