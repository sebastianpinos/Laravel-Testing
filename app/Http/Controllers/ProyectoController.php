<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;


class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function index()
     {
         $proyectos = Proyecto::with('alumno')->get(); // 🔹 Carga la relación 'alumno'
         return view('proyectos.index', compact('proyectos'));
     }
     

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumnos = \App\Models\Alumno::all();
        return view('proyectos.create', compact('alumnos'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'horas_previstas' => 'required|integer|min:1',
            'fecha_de_comienzo' => 'required|date',
            'student_id' => 'required|exists:alumnos,id',
        ]);
    
        Proyecto::create([
            'titulo' => $request->titulo,
            'horas_previstas' => $request->horas_previstas,
            'fecha_de_comienzo' => $request->fecha_de_comienzo,
            'student_id' => $request->student_id,  // 🔹 Asignación del alumno
        ]);
    
        return redirect()->route('proyectos.index')
            ->with('mensaje', 'El proyecto ha sido creado correctamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Proyecto $proyecto)
    {
        return view('proyectos.show', compact('proyecto'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyecto $proyecto)
    {
        $alumnos = \App\Models\Alumno::all();
        return view('proyectos.edit', compact('proyecto', 'alumnos'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'horas_previstas' => 'required|integer|min:1',
            'fecha_de_comienzo' => 'required|date',
            'student_id' => 'required|exists:alumnos,id',
        ]);
    
        $proyecto->update([
            'titulo' => $request->titulo,
            'horas_previstas' => $request->horas_previstas,
            'fecha_de_comienzo' => $request->fecha_de_comienzo,
            'student_id' => $request->student_id,  // 🔹 Actualización del alumno
        ]);
    
        return redirect()->route('proyectos.index')
            ->with('mensaje', 'El proyecto ha sido actualizado con éxito.');
    }
    


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyecto $proyecto) // 🔹 Corrige el tipo de parámetro
    {
        $proyecto->delete();

        return redirect()->route('proyectos.index')->with('mensaje', 'El proyecto ha sido eliminado correctamente.');
    }
}
