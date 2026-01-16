<?php

/**
 * Archivo de Rutas: web.php
 * Este archivo define las URLs de la aplicación y las vincula con los métodos del controlador.
 */

use App\Http\Controllers\PeliculasController;
use Illuminate\Support\Facades\Route;

// Ruta raíz: Carga la vista de bienvenida por defecto de Laravel.
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Secciones Comentadas (Pruebas de Aprendizaje)
|--------------------------------------------------------------------------
| Las siguientes líneas muestran diferentes formas de redirección y parámetros
| que se probaron durante el desarrollo.
*/

/*
Route::get('/presentacion', function () {
    return redirect()->Route('peliculas');
    //return redirect()->Route('peliculas.id'.['id'=>23]);
    // return redirect('peliculas');
});

Route::get('users/{id}', function ($id) {
    
});*/

/*
|--------------------------------------------------------------------------
| Rutas Individuales (Antes del Agrupamiento)
|--------------------------------------------------------------------------
*/

/*
Route::get('/index',[PeliculasController::class,'index'] )->name('peliculas');

// Muestre un mensaje donde indique la pelicula, el nombre de la pelucula es un parametro dado
Route::get('/show/{pelicula}',[PeliculasController::class,'show'])->name('peli.show');

// Mostrar un mensaje donde diga "Esto es un formulario para dar de alta una pelicula"
Route::get('/create', [PeliculasController::class,'create'])->name('peli.create');
*/

/*
|--------------------------------------------------------------------------
| Agrupamiento de Rutas (Estructura Actual)
|--------------------------------------------------------------------------
| Se utiliza Route::controller para evitar repetir el nombre del controlador 
| en cada línea, haciendo el código más limpio y fácil de mantener.
*/

Route::controller(PeliculasController::class)->group(function(){
    
    // Ruta para listar todas las películas.
    Route::get('/index','index')->name('peliculas');

    /**
     * Muestre un mensaje donde indique la pelicula.
     * El parámetro {pelicula} representa el ID que se pasa al método show().
     */
    Route::get('/show/{pelicula}','show')->name('peli.show');

    /**
     * Muestra el formulario para dar de alta una película.
     */
    Route::get('/create', 'create')->name('peli.create');

    // Procesa la eliminación de un registro usando el método HTTP DELETE.
    Route::delete('/delete/{pelicula}', [PeliculasController::class,'delete'])->name('peli.delete');

    // Procesa el almacenamiento de una nueva película (envío del formulario create).
    Route::post('/create', [PeliculasController::class,'store'])->name('peli.store');

    // Procesa la actualización de un registro existente usando el método HTTP PATCH.
    Route::patch('/update/{pelicula}', [PeliculasController::class,'update'])->name('peli.update');
});

/*
|--------------------------------------------------------------------------
| Rutas con Parámetros de Cadena
|--------------------------------------------------------------------------
*/

/*
Route::get('/peliculas/{id}', function(string $id){
    return "El Id de la pelicula es {$id}";
}); //->name('peliculas.reservacion');*/