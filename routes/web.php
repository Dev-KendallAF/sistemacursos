<?php

use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\Route;



Route::controller(PersonaController::class)->group(
    function()
    {
        $ruta = "persona";
        Route::get("$ruta/", 'index')->name("$ruta.index");
        Route::post("$ruta", 'store')->name("$ruta.store");
        //Route::get("$ruta/create", 'create');
        //Route::get("$ruta/edit/{id}", 'edit')->where('id','[0-9]+');
        //Route::get("$ruta/show/{id}", 'show');
        //Route::get("$ruta/delete/{id}", 'delete');

    });

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/admin', function () {
    return view('Admin/index');
})->name('admin');
