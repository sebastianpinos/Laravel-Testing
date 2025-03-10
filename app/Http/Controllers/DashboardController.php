<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Alumno;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProyectos = Proyecto::count();
        $totalAlumnos = Alumno::count();

        $ultimosProyectos = Proyecto::orderBy('created_at', 'desc')->take(5)->get();
        $ultimosAlumnos = Alumno::orderBy('created_at', 'desc')->take(5)->get();

        return view('dashboard', compact(
            'totalProyectos',
            'totalAlumnos',
            'ultimosProyectos',
            'ultimosAlumnos'
        ));
    }
}
