<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class TeacherController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
            // Obtener todos los usuarios con rol de profesor
            $profesores = User::join('personas', 'users.persona_id', '=', 'personas.id')
            ->where('users.role_id', 2)
            ->select('users.*', 'personas.*')
            ->paginate(10);

            return view('Teacher/index',compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

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


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
    
            $user = Auth::user();
            $persona = Persona::find($user->persona_id);
    
            // Almacenar datos de Persona en la sesión
            Session::put('persona', $persona);
    
            switch ($user->role_id) {
                case 1:
                    // Administrador
                    return redirect()->route('dashboard');
                    break;
                case 2:
                    // Profesor
                    return redirect()->route('clases');
                    break;
                case 3:
                    // Estudiante
                    return redirect()->route('index');
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

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('index'); // Reemplaza 'home' con la ruta a la que deseas redirigir después de cerrar sesión
    }
    
    /**
     * Store a newly created resource in storage.
     */
    




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
