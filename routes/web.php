<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

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

    Route::controller(TeacherController::class)->group(
        function()
        {
            $ruta = "admin/dashboard/teacher";
            $name = "teacher";

            Route::get("$ruta/", 'index')->name("$name.index");
            Route::get("$ruta/create", 'create')->name("$name.create");

            Route::post("$ruta", 'store')->name("$name.store");
            Route::get("$ruta/{persona}/show", 'show')->name("$name.show");
            Route::get("$ruta/{persona}/edit", 'edit')->name("$name.edit");
            
            Route::put("$ruta/{persona}", 'update')->name("$name.update");
        });

        Route::controller(CategoriaController::class)->group(
            function()
            {
                $ruta = "admin/dashboard/categoria";
                $name = "categoria";
    
                Route::get("$ruta/", 'index')->name("$name.index");
                Route::get("$ruta/create", 'create')->name("$name.create");
    
                Route::post("$ruta", 'store')->name("$name.store");
                Route::get("$ruta/{categoria}/show", 'show')->name("$name.show");
                Route::get("$ruta/{categoria}/edit", 'edit')->name("$name.edit");
                
                Route::put("$ruta/{categoria}", 'update')->name("$name.update");
        
            });
        Route::controller(StudentController::class)->group(
            function()
            {
                $ruta = "admin/dashboard/student";
                $name = "student";
    
                Route::get("$ruta/", 'index')->name("$name.index");
                Route::get("$ruta/create", 'create')->name("$name.create");
    
                Route::post("$ruta", 'store')->name("$name.store");
                Route::get("$ruta/{persona}/show", 'show')->name("$name.show");
                Route::get("$ruta/{persona}/edit", 'edit')->name("$name.edit");
                
                Route::put("$ruta/{persona}", 'update')->name("$name.update");
        
            });
    


       

Route::get('/', function () {
    return view('index');
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

