<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;
use Illuminate\Support\Facades\Schema;
use App\Services\MusicService;
use App\Http\Requests;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campos = Schema::getColumnListing("alumnos");
        $exclude = ["created_at", "updated_at"];
        $campos = array_diff($campos, $exclude);
        $filas = Alumno::select($campos)->get();

        return view('alumnos.index', ['alumnos' => $filas, 'campos' => $campos]);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request, MusicService $musicService)
    {
        $datos = $request->only("nombre", "email", "edad", "cancion_favorita");
    
        // Buscar información de la canción favorita usando la API
        if ($request->filled('cancion_favorita')) {
            $cancionInfo = $musicService->buscarCancion($request->cancion_favorita);
    
            if ($cancionInfo) {
                $datos['cancion_favorita'] = $cancionInfo['titulo'] . ' - ' . $cancionInfo['artista'];
            }
        }
    
        $alumno = new Alumno($datos);
        $alumno->save();
    
        $alumno->idiomas()->delete();
        if (request()->has("idiomas")) {
            $idiomas = collect(request()->input('idiomas'));
            $idiomas->each(
                fn($idioma) => $alumno->idiomas()->create([
                    "idioma" => $idioma,
                    "nivel" => request()->input("nivel")[$idioma],
                    "titulo" => request()->input("titulo")[$idioma],
                ])
            );
        }
    
        session()->flash('mensaje', 'Alumno creado correctamente con su canción favorita.');
        return redirect()->route('alumnos.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno, MusicService $musicService)
    {
        $cancionInfo = null;
    
        if ($alumno->cancion_favorita) {
            $cancionInfo = $musicService->buscarCancion($alumno->cancion_favorita);
        }
    
        return view('alumnos.show', compact('alumno', 'cancionInfo'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno, MusicService $musicService)
    {
        $datos = $request->only("nombre", "email", "edad", "cancion_favorita");
    
        // Buscar información de la canción favorita usando la API
        if ($request->filled('cancion_favorita')) {
            $cancionInfo = $musicService->buscarCancion($request->cancion_favorita);
    
            if ($cancionInfo) {
                $datos['cancion_favorita'] = $cancionInfo['titulo'] . ' - ' . $cancionInfo['artista'];
            }
        }
    
        $alumno->update($datos);
    
        session()->flash('mensaje', 'Alumno actualizado correctamente con su nueva canción favorita.');
        return redirect()->route('alumnos.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        session()->flash('mensaje', 'Alumno eliminado');
        return redirect()->route('alumnos.index');
        //
    }
}
