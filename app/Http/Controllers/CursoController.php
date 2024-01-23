<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Categoria;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CursoController extends Controller
{
    public function index()
    {
            // Obtener todos las Cursos
          $cursos = Curso::all();
          

            return view('curso/index',compact('cursos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $profesores = User::join('personas', 'users.persona_id', '=', 'personas.id')
            ->where('users.role_id', 2)
            ->select('users.*', 'personas.*')
            ->get();



        return view('curso/create',compact('categorias','profesores'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => [
                'required',
                'string',
                'min:6',
                'max:50'
            ],
            'categoria_id' => ['required', 'integer', Rule::notIn([0])],
            'profesor_id' => ['required', 'integer', Rule::notIn([0])],
            'descripcion' => ['required', 'string', 'min:50', 'max:500' ],
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       $curso = Curso::create([
            'nombre' => $request->nombre,
            'categoria_id' => $request->categoria_id,
            'profesor_id' => $request->profesor_id,
            'descripcion' => $request->descripcion,
        ]);
    
    
        return redirect()->route('curso.index')->with('success', 'El curso se ha creado correctamente, ahora puedes añadir cursos a este grupo.');
    }

    public function show(Curso $curso)
    {
        
        return view('curso/show',compact('curso'));
    }

    public function edit(Curso $curso)
    {
        return view('curso/edit',compact('curso',));
    }
    
    public function update(Request $request,Curso $curso)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            
            'nombre' => [
                'required',
                'string',
                Rule::unique('cursos', 'nombre')->ignore($curso->id),
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
        return redirect()->route('curso.index')->with('success', 'Datos actualizados correctamente.');
    }
}
