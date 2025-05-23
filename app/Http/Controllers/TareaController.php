<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Estado;
use App\Models\Usuario;
use App\Models\Proyecto;
use App\Models\Prioridad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Clases\Utilidad;
use Illuminate\Database\QueryException;

class TareaController extends Controller
{

    public function index($id_proyecto)
    {
        $proyecto = Proyecto::findOrFail($id_proyecto);
        $nombreDelProyecto=$proyecto->nombre_p;
        //echo $nombreDelProyecto;
        $tareas = Tarea::where('proyecto_id', $id_proyecto)
            ->with('usuario')
            ->get();

        return view('tareas.index', compact('proyecto', 'tareas'));
    }

    public function create(Request $request)
    {
        $usuarios = Usuario::all();
        $estados = Estado::all();
        $prioridades = Prioridad::all();
        $proyecto_id = $request->proyecto_id;
        $proyecto = Proyecto::findOrFail($proyecto_id);
        $proyecto_nombre = $proyecto->nombre_p;

        return view('tareas.create', compact('proyecto_id', 'proyecto_nombre', 'usuarios', 'estados', 'prioridades'));
    }

    public function store(Request $request)
    {
        /*$request->validate([
            'proyecto_id' => 'required|exists:proyectos,proyecto_id',
            'titulo' => 'required|string|max:100',
            'estado' => 'required|string|exists:estados,nombre_e',
            'prioridad' => 'required|string|exists:prioridades,nombre_p',
            'usuario_id' => 'required|exists:usuarios,usuario_id',
        ]);

        try {
            DB::beginTransaction();

            // Obtener el ID correspondiente al nombre del estado
            $estado_id = DB::table('estados')
                ->where('nombre_e', $request->input('estado'))
                ->value('estado_id');

            // Obtener el ID correspondiente al nombre de la prioridad
            $prioridad_id = DB::table('prioridades')
                ->where('nombre_p', $request->input('prioridad'))
                ->value('prioridad_id');

            // Crear la tarea
            $tarea = new Tarea();
            $tarea->proyecto_id = $request->input('proyecto_id');
            $tarea->usuario_id = $request->input('usuario_id');
            $tarea->titulo = $request->input('titulo');
            $tarea->estado_id = $estado_id;
            $tarea->prioridad_id = $prioridad_id;
            $tarea->FechaLimite = $request->input('FechaLimite'); // opcional
            $tarea->save();

            DB::commit();

            return redirect()->route('proyectos.show', $request->input('proyecto_id'))
                ->with('success', 'Tarea creada correctamente.');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Error al crear la tarea: ' . $th->getMessage());
        }*/

        //Recuperar los datos del formulario
        $proyectoId=$request->input('proyecto_id');
        $usuarioId=$request->input('usuario_id');
        $titulo=$request->input('titulo');
        $estadoId=DB::table('estados')->where('nombre_e', $request->input('estado'))->value('estado_id');
        $prioridad_id = DB::table('prioridades')->where('nombre_p', $request->input('prioridad'))->value('prioridad_id');
        if($request->has('FechaLimite'))
        {
            $fechaLimite = $request->input('FechaLimite');
        }
        else
        {
            $fechaLimite = null;
        }
        
        //Crear un objeto de la clase que representa una consulta a la tabla
        $tarea = new Tarea();
        //Asignar los valores del formulario a su respectivo campo
        $tarea->proyecto_id = $proyectoId;
        $tarea->usuario_id = $usuarioId;
        $tarea->titulo = $titulo;
        $tarea->estado_id = $estadoId;
        $tarea->prioridad_id = $prioridad_id;
        $tarea->FechaLimite = $fechaLimite;

        try
        {
            //Hacer el insert en la tabla
            $tarea->save();
            $proyecto = Proyecto::findOrFail($proyectoId);
            $tareas = Tarea::where('proyecto_id', $proyectoId)->with('usuario')->get();
            $request->session()->flash("mensaje","Registro ingresado correctamente.");
            $response=view('tareas.index',compact('proyecto','tareas'));
        }
        catch(QueryException $ex)
        {
            $mensaje=Utilidad::errorMessage($ex);
            $request->session()->flash("error",$mensaje);
            $response=redirect()->action([TareaController::class,"create"])->withInput();
            /*echo $ex->getMessage();
            echo "<br>";
            echo $ex->getCode();
            echo "<br>";
            echo $ex->getLine();
            echo "<br>";
            echo $ex->getFile();
            echo "<br>";
            echo $ex->getTraceAsString();*/
        }
        

        return $response;
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarea $tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        //
    }
}
