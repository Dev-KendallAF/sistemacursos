<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;


class RoleController extends Controller
{
    public function index()
    {
            // Obtener todos las roles
            $roles = Role::all();

            return view('role/index',compact('roles'));
    }

    public function create()
    {
        return view('role/create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => [
                'required',
                'string',
                Rule::unique('roles', 'nombre'),
            ]
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $role = Role::create([
            'nombre' => $request->nombre
        ]);
    
    
        return redirect()->route('role.index')->with('success', 'La Rol se ha creado correctamente, ahora puedes añadir cursos a este grupo.');
    }

    public function show(role $role)
    {
        
        return view('role/show',compact('role'));
    }

    public function edit(role $role)
    {
        return view('role/edit',compact('role',));
    }
    
    public function update(Request $request,role $role)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            
            'nombre' => [
                'required',
                'string',
                Rule::unique('roles', 'nombre')->ignore($role->id),
            ]
            ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Actualización de campos diferentes en role() 
        $role->nombre = $request->nombre;
        $role->estado = $request->estado;
        $role->save();

        // Redirección al index con mensaje de éxito
        return redirect()->route('role.index')->with('success', 'Datos actualizados correctamente.');
    }
}
