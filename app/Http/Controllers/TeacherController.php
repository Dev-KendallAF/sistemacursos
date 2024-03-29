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
            ->get();

            return view('Teacher/index',compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Teacher/create');
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
             'role_id' => 2,
         ]);
     
         // Resto de tu lógica después de la creación del usuario
     
         return redirect()->route('teacher.index')->with('success', 'El profesor se ha creado correctamente, ingresa a cursos para asignarle un rubro.');
     }



    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        
        $email = User::find($persona->id)->email;
        $estado = User::find($persona->id)->estado;
        if(User::find($persona->id)->role_id == 2)
        {
            return view('Teacher/show',compact('persona','email','estado'));
        }else  return redirect()->route('teacher.index');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        $email = User::find($persona->id)->email;
        $estado = User::find($persona->id)->estado;
        
        if(User::find($persona->id)->role_id == 2)
        {
            return view('Teacher/edit',compact('persona','email','estado'));
        }else  return redirect()->route('teacher.index');
    }

    /**
     * Update the specified resource in storage.
     */
    
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
            $user->estado = $request->estado;
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
