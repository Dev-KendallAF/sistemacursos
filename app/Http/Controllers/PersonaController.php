<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Curso;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class PersonaController extends Controller
{

    public function index()
    {
       return("Usuario registrado");
    }

    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $user = Auth::user();
        if($user->role_id == 1)
        {
            $inscripciones = [
                'labels' => ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes'],
                'data' => [65, 59, 80, 81, 56],
            ];
            
            $usuarios = User::all();
            $categorias = Categoria::all();
            $cursos = Curso::all();
    
    
            $usersData = [
                'labels' => ['Administradores', 'Profesores', 'Estudiantes'],
                'data' => [
                    $usuarios->where('role_id', 1)->count(),
                    $usuarios->where('role_id', 2)->count(),
                    $usuarios->where('role_id', 3)->count(),
                ],
            ];
    
            $cursosData = [
                'labels' => $categorias->pluck('nombre')->toArray(),
                'data' => $categorias->map(function ($categoria) {
                    return Curso::where('categoria_id', $categoria->id)->count();
                })->toArray(),
            ];
    
            return view('Admin/index', compact('inscripciones','usersData','cursosData'));
        }else  return redirect()->route('index');
 

    }

    public function perfil()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $user = Auth::user();
        $persona = Persona::find($user->persona_id);
        $email = User::find($persona->id)->email;
        
        if (!isset($persona)) {
            // La variable $persona no está definida o es null
            abort(404);
        }
    
        return view('profile', compact('persona','email'));
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
        return redirect()->route('user.email')->with('email', $request->email);
    }

    public function inicioSesion()
    {
        $user = Auth::user();
        if ($user == null) {
            return view('login');
        }
        else 
        {
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

    public function edit()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $user = Auth::user();
        $persona = Persona::find($user->persona_id);
        $email = User::find($persona->id)->email;
        
        if (!isset($persona)) {
            // La variable $persona no está definida o es null
            abort(404);
        }
        

        return view('profileEdit', compact('persona','email'));
    }

    public function update(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }
    
        $user = Auth::user();
        $persona = Persona::find($user->persona_id);
        $email = User::find($persona->id)->email;
        
        if (!isset($persona)) {
            // La variable $persona no está definida o es null
            abort(404);
        }
        
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'nombreCompleto' => 'required|string',
            'identificacion' => [
                'required',
                'string',
                Rule::unique('personas', 'identificacion')->ignore($persona->id),
            ],
            'fechaNacimiento' => 'required|date',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($persona->id),
            ]
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Actualización de campos diferentes en Persona() 
        $persona->nombreCompleto = $request->nombreCompleto;
        $persona->identificacion = $request->identificacion;
        $persona->fechaNacimiento = $request->fechaNacimiento;
        $persona->save();

        $email = User::find($persona->id)->email;
        $rol = User::find($persona->id)->rol;

        $user = User::where('email', $email)->first();

        // Actualización de campos en User()
        $user->email = $request->email;
        $user->persona_id = $persona->id;
        $user->save();
        
        // Redirección al index con mensaje de éxito
        return redirect()->route('user.perfil')->with('success', 'Datos actualizados correctamente.');
    }
}
