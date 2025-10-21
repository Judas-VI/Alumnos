<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index-alumno', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create-alumno');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo'            => 'required|string|max:255|unique:alumnos,codigo',
            'nombre'            => 'required|string|max:255',
            'correo'            => 'required|email|max:255|unique:alumnos,correo',
            'fecha_nacimiento'  => 'required|date',
            'sexo'              => 'required|in:M,F',
            'carrera'           => 'required|string|max:255',
        ]);
        $alumno = new Alumno();
        $alumno->codigo = $request->codigo;
        $alumno->nombre = $request->nombre;
        $alumno->correo = $request->correo;
        $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        $alumno->sexo = $request->sexo;
        $alumno->carrera = $request->carrera;
        $alumno->save();
        return redirect()->route('alumno.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show-alumno', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit-alumno', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        $alumno->codigo = $request->codigo;
        $alumno->nombre = $request->nombre;
        $alumno->correo = $request->correo;
        $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        $alumno->sexo = $request->sexo;
        $alumno->carrera = $request->carrera;
        $alumno->save();
        return redirect()->route('alumno.show', $alumno->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumno.index');
    }
}
