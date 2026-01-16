<?php
/*Este archivo es el Controlador. Su función es recibir las peticiones del usuario, 
interactuar con la base de datos (usando el Modelo o Query Builder) y decidir qué 
vista mostrar. */


namespace App\Http\Controllers;

/*Permite recibir y manipular los datos que el usuario envía a través de formularios. */
use Illuminate\Http\Request;

/*Importa el modelo para interactuar con la base de datos de forma orientada a objetos (Eloquent). */
use App\Models\Pelicula;

/*Permite usar el Query Builder, una forma directa de hacer consultas SQL. */
use Illuminate\Support\Facades\DB;


class PeliculasController extends Controller
{
    /*Este método se encarga de mostrar la página principal con todas las películas.
    Obtiene todos los registros de la tabla peliculas usando DB::table('peliculas')->get() y los envía a la vista index.*/
   public function index(){
    //dd(Pelicula::all());-->> Se usó para depurar (detener el programa y ver los datos) usando Eloquent.

    //$peliculas = ['Avengers', 'Your name','La hora de la desaparicion'];-->> Era un arreglo estático de prueba antes de conectar la base de datos.
    
    $mostrar= true;
    //$message ='Mensaje desde el controlador';
    $peliculas = DB::table('peliculas')->get();

    /*Pruebas de filtros para obtener solo películas de más de 120 minutos.
    $peliculasLimit = DB::table('peliculas')->where('duracion','>',120)
                    ->limit(3)
                    ->first();
                    //->get();*/
    //$peliculasLimit=Pelicula::where('duracion','>',120)->first();
    //$peliculaFile=Pelicula::find(50);
    return view('index',['peliculas'=>$peliculas]); //>>mandar parametro a una vista
    //return view('index',compact('peliculas','mostrar','message'));//>>mandar parametro a una vista
}
    /*Busca una película específica para mostrarla en un formulario de edición.
    Recibe un $id y usa un where para encontrar el primer registro coincidente.
    Incluye una validación if (!$pelicula) que redirige al inicio si alguien intenta buscar un ID que no existe, evitando que la página falle. */
    public function show($id){
    /*$miPelicula = Pelicula::where('nombrePelicula',$pelicula)->first();
    //dd($miPelicula);
    return view('show',['pelicula'=>$miPelicula]);*/
    // Buscamos la película manualmente en la tabla
    $pelicula = DB::table('peliculas')->where('id', $id)->first();

    // Si no existe, volvemos al index (evita el error de 'null')
    if (!$pelicula) {
        return redirect()->route('peliculas');
    }

    return view('show', compact('pelicula'));
}

    /*Simplemente retorna la vista donde el usuario escribe los datos de una nueva película. */
    public function create(){
        $message ='Mensaje desde el controlador';
        /*compact('message'): Envía una variable de mensaje a la vista para ser mostrada en una alerta o slot. */
    return view('create',compact('message'));   
    }

    /*Es el encargado de procesar la información del formulario de creación */
    public function store(Request $request){     
        //dd($request);//muestra informacion de la variable y frena el proceso de ejecucion  
        //return $request->method();
        //return $request->url();
        //return $request->all();

        /*para asegurar que el nombre, director y duración cumplan con reglas */
        $validated= $request->validate([
            'nombrePelicula'=>'required|string|max:255',
            'director'=>'required|string|max:150',
            'duracion'=>'required|integer|min:60'
        ]);

        /*Si la validación pasa, crea el registro automáticamente en la base de datos. */
        Pelicula::create($validated);

        return redirect()->route('peliculas');
        }

    /*Valida los nuevos datos y aplica los cambios al registro existente. */
    public function update(Request $request, Pelicula $pelicula){
        $required= $request->validate([
            'nombrePelicula'=>'required|string|max:255',
            'director'=>'required|string|max:150',
            'duracion'=>'required|integer|min:60'
        ]);

        $pelicula->update($required);    
        return redirect()->route('peliculas');
        }
    /*Elimina permanentemente la película seleccionada de la base de datos. */
    public function delete(Pelicula $pelicula){
        $pelicula->delete();
        return redirect()->route('peliculas');
    }
}
