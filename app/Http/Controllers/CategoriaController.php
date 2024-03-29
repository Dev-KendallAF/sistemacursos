<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;


class CategoriaController extends Controller
{
    public function index()
    {
            // Obtener todos las categorias
            $categorias = Categoria::all();

            return view('categoria/index',compact('categorias'));
    }

    public function create()
    {
        return view('categoria/create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => [
                'required',
                'string',
                Rule::unique('categorias', 'nombre'),
            ]
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $categoria = Categoria::create([
            'nombre' => $request->nombre
        ]);
    
    
        return redirect()->route('categoria.index')->with('success', 'La categoría se ha creado correctamente, ahora puedes añadir cursos a este grupo.');
    }

    public function show(Categoria $categoria)
    {
        
        return view('categoria/show',compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('categoria/edit',compact('categoria',));
    }
    
    public function update(Request $request,Categoria $categoria)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            
            'nombre' => [
                'required',
                'string',
                Rule::unique('Categorias', 'nombre')->ignore($categoria->id),
            ]
            ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Actualización de campos diferentes en Categoria() 
        $categoria->nombre = $request->nombre;
        $categoria->estado = $request->estado;
        $categoria->save();

        // Redirección al index con mensaje de éxito
        return redirect()->route('categoria.index')->with('success', 'Datos actualizados correctamente.');
    }
}
