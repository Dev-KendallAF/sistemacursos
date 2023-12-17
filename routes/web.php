<?php

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


        //Route::get("$ruta/create", 'create');
        //Route::get("$ruta/edit/{id}", 'edit')->where('id','[0-9]+');
        //Route::get("$ruta/show/{id}", 'show');
        //Route::get("$ruta/delete/{id}", 'delete');

    });

    Route::controller(TeacherController::class)->group(
        function()
        {
            $ruta = "admin/dashboard/teacher";
            $name = "teacher";

            Route::get("$ruta/", 'index')->name("$name.index");
            Route::post("$ruta", 'store')->name("$name.store");
            Route::get("$ruta/{persona}/show", 'show')->name("$name.show");
            Route::get("$ruta/{persona}/edit", 'edit')->name("$name.edit");
            
            Route::put("$ruta/{persona}", 'update')->name("$name.update");


            //Route::get("$ruta/create", 'create');
            //Route::get("$ruta/edit/{id}", 'edit')->where('id','[0-9]+');
            //Route::get("$ruta/show/{id}", 'show');
            //Route::get("$ruta/delete/{id}", 'delete');
    
        });

        Route::controller(StudentController::class)->group(
            function()
            {
                $ruta = "admin/dashboard/student";
                $name = "student";
    
                Route::get("$ruta/", 'index')->name("$name.index");
                Route::post("$ruta", 'store')->name("$name.store");
                //Route::get("$ruta/create", 'create');
                //Route::get("$ruta/edit/{id}", 'edit')->where('id','[0-9]+');
                //Route::get("$ruta/show/{id}", 'show');
                //Route::get("$ruta/delete/{id}", 'delete');
        
            });
    


       

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/user/confirm/EmailValidation', function () {
    return view('Validation/emailvalidation');
})->name('user.email');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/admin/dashboard', function () {
    return view('Admin/index');
})->name('dashboard');

Route::get('/teacher/subjects', function () {
    return view('Teacher/index');
})->name('clases');

Route::get('/user/perfil', function () {
    return view('perfil');
})->name('perfil');