<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Editar Película</title>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">

    <div class="max-w-md w-full bg-gray-800 p-8 rounded-xl border border-gray-700">
        <h2 class="text-2xl font-bold text-red-500 mb-6 text-center uppercase">Gestionar Película</h2>
        
        {{-- Formulario de Actualizar --}}
        <form action="{{ route('peli.update', $pelicula->id) }}" method="POST" class="space-y-4">
            {{-- @csrf: Token de seguridad para proteger el formulario --}}
            @csrf
            {{-- @method('PATCH'): Indica a Laravel que esta petición es para actualizar datos --}}
            @method('PATCH')

            <label class="block text-gray-400">Nombre de la película</label>
            <input type="text" name="nombrePelicula" value="{{ $pelicula->nombrePelicula }}" class="w-full bg-gray-700 rounded p-2 border border-gray-600">

            <label class="block text-gray-400">Director</label>
            <input type="text" name="director" value="{{ $pelicula->director }}" class="w-full bg-gray-700 rounded p-2 border border-gray-600">

            <label class="block text-gray-400">Duración (min)</label>
            <input type="number" name="duracion" value="{{ $pelicula->duracion }}" class="w-full bg-gray-700 rounded p-2 border border-gray-600">

            <button type="submit" class="w-full bg-green-600 hover:bg-green-700 py-2 rounded font-bold">Guardar Cambios</button>
        </form>

        {{-- Formulario de Eliminar --}}
        <form action="{{ route('peli.delete', $pelicula->id) }}" method="POST" class="mt-4">
            @csrf
            {{-- @method('DELETE'): Indica a Laravel que se desea borrar el registro --}}
            @method('DELETE')
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 py-2 rounded font-bold">Eliminar Película</button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('peliculas') }}" class="text-gray-500 text-sm">← Volver al listado</a>
        </div>
    </div>
</body>
</html>