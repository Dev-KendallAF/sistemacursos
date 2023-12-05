<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return("Hola mundo");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreCompleto' => ['required','min:10','max:250'],
            'identificacion' => ['required','min:9','max:15','numeric'],
            'fechaNacimiento' => 'required'
        ]);
        Persona::create([
            'nombreCompleto' => $request->get('nombreCompleto'),
            'identificacion' => $request->get('identificacion'),
            'fechaNacimiento' => $request->get('fechaNacimiento')

        ]);
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
