<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modelo Pelicula
 * * Representa la estructura de la tabla 'peliculas' en la base de datos.
 * Laravel utiliza Eloquent (ORM) para interactuar con esta tabla de forma sencilla.
 */
class Pelicula extends Model
{
    /**
     * HasFactory: Permite generar datos de prueba (factories) para este modelo.
     */
    use HasFactory;

    /**
     * $fillable: Lista de atributos que pueden ser asignados de forma masiva.
     * Es una medida de seguridad que define qué campos se pueden llenar
     * mediante el método Pelicula::create() o el método update() en el controlador.
     * Esto evita que usuarios malintencionados inserten datos en columnas no permitidas.
     */
    protected $fillable = ['nombrePelicula', 'director', 'duracion'];

    /**
     * Nota: Laravel asume automáticamente que:
     * 1. La tabla se llama 'peliculas' (el plural del nombre del modelo).
     * 2. El modelo tiene campos 'created_at' y 'updated_at' a menos que se indique lo contrario.
     */
}
