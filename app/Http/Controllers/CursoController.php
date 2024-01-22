<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CursoController extends Controller
{
    public function index()
    {
            // Obtener todos las Cursos
          $cursos = Curso::all();

            return view('Curso/index',compact('Cursos'));
    }

    public function create()
    {
        return view('Curso/create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => [
                'required',
                'string',
                Rule::unique('Cursos', 'nombre'),
            ]
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
       $curso = Curso::create([
            'nombre' => $request->nombre
        ]);
    
    
        return redirect()->route('Curso.index')->with('success', 'La categoría se ha creado correctamente, ahora puedes añadir cursos a este grupo.');
    }

    public function show(Curso $curso)
    {
        
        return view('Curso/show',compact('Curso'));
    }

    public function edit(Curso $curso)
    {
        return view('Curso/edit',compact('Curso',));
    }
    
    public function update(Request $request,Curso $curso)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            
            'nombre' => [
                'required',
                'string',
                Rule::unique('Cursos', 'nombre')->ignore($curso->id),
            ]
            ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Actualización de campos diferentes en Curso() 
       $curso->nombre = $request->nombre;
       $curso->estado = $request->estado;
       $curso->save();

        // Redirección al index con mensaje de éxito
        return redirect()->route('Curso.index')->with('success', 'Datos actualizados correctamente.');
    }
}
