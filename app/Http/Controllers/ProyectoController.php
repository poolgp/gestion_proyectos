<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Proyecto;
use App\Models\ProyectoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;

class ProyectoController extends Controller
{
    public function index()
    {
        $usuarioId = auth()->id();

        $proyectos = Proyecto::whereHas('usuarios', function ($query) use ($usuarioId) {
            $query->where('usuarios.usuario_id', $usuarioId);
        })->paginate(10);

        return view('proyectos.index', compact('proyectos'));
    }


    public function create()
    {
        $usuarios = Usuario::all();
        return view('proyectos.crear', compact('usuarios'));
    }


    public function store(Request $request)
    {
        try {
            // Iniciar la transacción
            DB::beginTransaction();

            // Crear el proyecto
            $proyecto = new Proyecto();
            $proyecto->nombre_p = $request->input('nombre_p');
            $proyecto->descripcion = $request->input('descripcion');
            $proyecto->fecha_inicio = $request->input('fecha_inicio');
            $proyecto->fecha_fin = $request->input('fecha_fin');
            $proyecto->save();

            // Guardar el administrador en la tabla proyectos_usuarios
            $proyectoUsuario = new ProyectoUsuario();
            $proyectoUsuario->proyecto_id = $proyecto->proyecto_id;
            $proyectoUsuario->usuario_id = auth()->user()->usuario_id;
            $proyectoUsuario->rol_id = 1;
            $proyectoUsuario->save();

            // Guardar los colaboradores seleccionados
            if ($request->colaboradores) {
                foreach ($request->colaboradores as $colaborador_id) {
                    $proyectoUsuario = new ProyectoUsuario();
                    $proyectoUsuario->proyecto_id = $proyecto->proyecto_id;
                    $proyectoUsuario->usuario_id = $colaborador_id;
                    $proyectoUsuario->rol_id = 2;
                    $proyectoUsuario->save();
                }
            }

            // Confirmar la transacción
            DB::commit();

            // Redirigir con mensaje de éxito
            return redirect()->route('proyectos.index')->with('success', 'Proyecto creado con éxito.');
        } catch (\Throwable $th) {
            // Si hay un error, deshacer todo lo que se hizo en la transacción
            DB::rollBack();

            // Redirigir con mensaje de error
            return redirect()->back()->with('error', 'Ocurrió un error al crear el proyecto.');
        }
    }

    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto)
    {
        //
    }
}
