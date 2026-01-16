<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuevana FI - Mis Películas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-sans">

    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-red-500 tracking-wider uppercase">CineApp</h1>
            
            {{-- 
                Botón para redirigir al formulario de creación.
                Se usa la función route() para llamar a la ruta por su nombre 'peli.create'.
            --}}
            <a href="{{ route('peli.create') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-lg transition duration-300 shadow-lg">
                + Agregar Película
            </a>
        </div>

        <div class="bg-gray-800 shadow-2xl rounded-xl overflow-hidden border border-gray-700">
            <table class="w-full text-left">
                <thead class="bg-gray-700 text-gray-300 uppercase text-sm">
                    <tr>
                        <th class="px-6 py-4">Título</th>
                        <th class="px-6 py-4">Director</th>
                        <th class="px-6 py-4 text-center">Duración</th>
                        <th class="px-6 py-4 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    {{-- 
                        Directiva @foreach: 
                        Recorre la colección $peliculas enviada desde el controlador.
                        Cada registro se convierte en un objeto temporal llamado $pelicula.
                    --}}
                    @foreach ($peliculas as $pelicula)
                    <tr class="hover:bg-gray-700 transition duration-200">
                        {{-- Acceso a propiedades del objeto: Se usa la flecha -> para obtener los datos de la columna --}}
                        <td class="px-6 py-4 font-medium">{{ $pelicula->nombrePelicula }}</td>
                        <td class="px-6 py-4 text-gray-400">{{ $pelicula->director }}</td>
                        <td class="px-6 py-4 text-center">
                            <span class="bg-gray-900 text-gray-300 py-1 px-3 rounded-full text-xs border border-gray-600">
                                {{ $pelicula->duracion }} min
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            {{-- 
                                Enlace a detalles: 
                                Se pasa el ID de la película como segundo parámetro para que la ruta sepa cuál buscar.
                            --}}
                            <a href="{{ route('peli.show', $pelicula->id) }}" class="text-blue-400 hover:text-blue-300 font-semibold transition">
                                Ver detalles →
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>