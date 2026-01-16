<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Película - Cuevana FI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-sans min-h-screen flex flex-col items-center justify-center p-6">
    {{--Alertas, en caso de ser requeridas --}}
    {{--<div class="max-w-md w-full mb-4">
        <x-alert>
            <x-slot name="titulo">Notificación</x-slot>
            <x-slot name="message">{{ $message }}</x-slot>
        </x-alert>
    </div>--}}

    <div class="max-w-md w-full bg-gray-800 rounded-2xl shadow-2xl border border-gray-700 overflow-hidden">
        <div class="bg-gray-700 px-8 py-5 border-b border-gray-600">
            <h2 class="text-xl font-bold text-red-500 uppercase tracking-widest flex items-center gap-2">
                ➕ Añadir Película
            </h2>
        </div>

        <div class="p-8">
            {{-- action="{{ route('peli.store') }}": Envía los datos al método store del controlador --}}
            <form action="{{ route('peli.store') }}" method="POST" class="space-y-6">
                @csrf {{-- Protección obligatoria para peticiones POST --}}
                
                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-2 ml-1">Nombre de la película</label>
                    <input type="text" name="nombrePelicula" placeholder="Ej: Inception" required
                        class="w-full bg-gray-900 border border-gray-700 text-white rounded-xl p-3 focus:ring-2 focus:ring-red-500 focus:border-transparent outline-none transition duration-200 placeholder-gray-600">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-2 ml-1">Director</label>
                    <input type="text" name="director" placeholder="Ej: Christopher Nolan" required
                        class="w-full bg-gray-900 border border-gray-700 text-white rounded-xl p-3 focus:ring-2 focus:ring-red-500 focus:border-transparent outline-none transition duration-200 placeholder-gray-600">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-400 uppercase mb-2 ml-1">Duración (minutos)</label>
                    <input type="number" name="duracion" placeholder="120" required
                        class="w-full bg-gray-900 border border-gray-700 text-white rounded-xl p-3 focus:ring-2 focus:ring-red-500 focus:border-transparent outline-none transition duration-200 placeholder-gray-600">
                </div>

                <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-3 rounded-xl transition duration-300 transform hover:scale-[1.02] shadow-lg flex items-center justify-center gap-2">
                    Enviar Registro →
                </button>
            </form>

            <div class="mt-8 text-center border-t border-gray-700 pt-6">
                <a href="{{ route('peliculas') }}" class="text-gray-500 hover:text-red-400 text-sm font-medium transition duration-200">
                    ← Cancelar y volver
                </a>
            </div>
        </div>
    </div>

</body>
</html>

