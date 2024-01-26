<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Models\Curso;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\Route;



Route::controller(PersonaController::class)->group(
    function()
    {
        $ruta = "persona";
        Route::get("$ruta/", 'index')->name("$ruta.index");
        Route::post("$ruta", 'store')->name("persona.store");
        Route::post("$ruta/login", 'login')->name("user.login");
        Route::get("$ruta/logout", 'logout')->name("user.logout");
        Route::get("user/perfil", 'perfil')->name("user.perfil");
        Route::get("user/perfil/edit", 'edit')->name("user.edit");
        Route::put("user/perfil/edit", 'update')->name("user.update");
        
        Route::get("admin/dashboard", 'dashboard')->name("dashboard");
        Route::get("/login", 'inicioSesion')->name("login");
    });


    Route::middleware(['auth', 'CheckRole:1'])->group(function () {
        Route::controller(TeacherController::class)->group(function () {
            $ruta = "admin/dashboard/teacher";
            $name = "teacher";
    
            Route::get("$ruta/", 'index')->name("$name.index");
            Route::get("$ruta/create", 'create')->name("$name.create");
    
            Route::post("$ruta", 'store')->name("$name.store");
            Route::get("$ruta/{persona}/show", 'show')->name("$name.show");
            Route::get("$ruta/{persona}/edit", 'edit')->name("$name.edit");
    
            Route::put("$ruta/{persona}", 'update')->name("$name.update");
        });
    
        Route::controller(CategoriaController::class)->group(function () {
            $ruta = "admin/dashboard/categoria";
            $name = "categoria";
    
            Route::get("$ruta/", 'index')->name("$name.index");
            Route::get("$ruta/create", 'create')->name("$name.create");
    
            Route::post("$ruta", 'store')->name("$name.store");
            Route::get("$ruta/{categoria}/show", 'show')->name("$name.show");
            Route::get("$ruta/{categoria}/edit", 'edit')->name("$name.edit");
    
            Route::put("$ruta/{categoria}", 'update')->name("$name.update");
        });
    
        Route::controller(StudentController::class)->group(function () {
            $ruta = "admin/dashboard/student";
            $name = "student";
    
            Route::get("$ruta/", 'index')->name("$name.index");
            Route::get("$ruta/create", 'create')->name("$name.create");
    
            Route::post("$ruta", 'store')->name("$name.store");
            Route::get("$ruta/{persona}/show", 'show')->name("$name.show");
            Route::get("$ruta/{persona}/edit", 'edit')->name("$name.edit");
    
            Route::put("$ruta/{persona}", 'update')->name("$name.update");
        });
    
        Route::controller(CursoController::class)->group(function () {
            $ruta = "admin/dashboard/curso";
            $name = "curso";
    
            Route::get("$ruta/", 'index')->name("$name.index");
            Route::get("$ruta/create", 'create')->name("$name.create");
    
            Route::post("$ruta", 'store')->name("$name.store");
            Route::get("$ruta/{curso}/show", 'show')->name("$name.show");
            Route::get("$ruta/{curso}/edit", 'edit')->name("$name.edit");
    
            Route::put("$ruta/{curso}", 'update')->name("$name.update");
        });
    });
    


       

Route::get('/', function () {
    $cursos = Curso::all();
    $categorias = Categoria::all();
    $profesores = User::join('personas', 'users.persona_id', '=', 'personas.id')
        ->where('users.role_id', 2)
        ->select('users.*', 'personas.*')
        ->get();

    return view('index',compact('cursos','profesores'));
})->name('index');

Route::get('/user/confirm/EmailValidation', function () {
    return view('Validation/emailvalidation');
})->name('user.email');

Route::get('/user/Error', function () {
    return view('Validation/errorAut');
})->name('user.error');

Route::get('/register', function () {
    return view('register');
})->name('register');






Route::get('/teacher/subjects', function () {
    return view('Teacher/index');
})->name('clases');

