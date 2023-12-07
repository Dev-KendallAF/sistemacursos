<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return("Usuario registrado");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }




    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
    
            $user = Auth::user();
    
            switch ($user->role_id) {
                case 1:
                    // Administrador
                    return redirect()->intended('/dashboard');
                    break;
                case 2:
                    // Profesor
                    return redirect()->intended('/mis-cursos');
                    break;
                case 3:
                    // Estudiante
                    return redirect()->intended('/mi-perfil');
                    break;
            }
        }
    
        // La autenticación falló
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            // El correo electrónico no está registrado
            return redirect()->route('login')->withErrors(['email' => 'Correo electrónico no registrado']);
        }
    
        if (!Hash::check($request->password, $user->password)) {
            // La contraseña es incorrecta
            return redirect()->route('login')->withErrors(['password' => 'Contraseña incorrecta']);
        }
    
        return redirect()->route('login')->withErrors(['email' => 'Credenciales incorrectas']);
    }

    /**
     * Store a newly created resource in storage.
     */
    


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombreCompleto' => 'required|string',
            'identificacion' => [
                'required',
                'string',
                Rule::unique('personas', 'identificacion'),
            ],
            'fechaNacimiento' => 'required|date',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($request->persona_id, 'persona_id'),
            ],
            'password' => 'required|min:6',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $persona = Persona::create([
            'nombreCompleto' => $request->nombreCompleto,
            'identificacion' => $request->identificacion,
            'fechaNacimiento' => $request->fechaNacimiento
        ]);
    
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password), // Asegúrate de cifrar la contraseña
            'persona_id' => $persona->id,
            'role_id' => 3,
        ]);
    
        // Resto de tu lógica después de la creación del usuario
    
        return redirect()->route('user.email')->with('email', $request->email);
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
