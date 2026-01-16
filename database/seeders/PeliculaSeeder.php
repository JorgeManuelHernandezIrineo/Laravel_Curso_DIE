<?php

namespace Database\Seeders;

use App\Models\Pelicula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*DB::table('peliculas')->insert([
            'nombrePelicula'=> 'Your name',
            'director'=>'Takashi Miyamoto',
            'duracion'=>120,
            'created_at' => now(),
            'updated_at' => now()
        ]);*/
        Pelicula::factory(70)->create();
    }
}
