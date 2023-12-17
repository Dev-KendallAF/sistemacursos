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
        $email = User::find($persona->id)->email;

        return view('Teacher/show',compact('persona','email'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        $email = User::find($persona->id)->email;

        return view('Teacher/edit',compact('persona','email'));
    }

    /**
     * Update the specified resource in storage.
     */

        /*public function update(Request $request, Persona $persona)
        {
            var_dump($persona);
            $email = User::find($persona->id)->email;

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
                    Rule::unique('users', 'email')->ignore($email),
                ],
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Actualización de campos diferentes en Persona() y User()
            $persona->nombreCompleto = $request->nombreCompleto;
            $persona->identificacion = $request->identificacion;
            $persona->fechaNacimiento = $request->fechaNacimiento;
            $persona->save();

            // Actualización de campos en User()
            $user = $persona->user;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            // Redirección al index con mensaje de éxito
            return redirect()->route('index')->with('success', 'Datos actualizados correctamente.');
        }*/
        public function update(Request $request,Persona $persona)
        {
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
                ],
                'password' => 'required|min:6',
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
            $user = User::where('email', $email)->first();

            // Actualización de campos en User()
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->persona_id = $persona->id;
            $user->role_id = 2;
            $user->save();

            // Redirección al index con mensaje de éxito
            return redirect()->route('teacher.index')->with('success', 'Datos actualizados correctamente.');
        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
