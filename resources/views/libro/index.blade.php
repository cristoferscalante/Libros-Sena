@extends('layouts.app')

@section('content')

    <style>
        .horizontal-scroll {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            padding-bottom: 10px;
            margin-bottom: 20px;
            scrollbar-width: thin; /* Para navegadores como Firefox */
        }

        .horizontal-scroll::-webkit-scrollbar {
            height: 8px; /* Altura del scroll en Chrome */
        }

        .horizontal-scroll::-webkit-scrollbar-thumb {
            background-color: #777777;
            border-radius: 10px;
        }

        .horizontal-scroll .libro-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .horizontal-scroll .libro-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
    </style>

    <div class="container mx-auto bg-gray-900 p-6 rounded-lg">
        <h1 class="text-center text-white text-2xl mb-6">Lista de Libros</h1>

        {{-- Mensaje de sesión --}}
        @if(session('success'))
            <div class="mb-4 bg-green-500 text-white text-center py-2 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-6">
            <a href="{{ route('libros.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Añadir Nuevo Libro</a>
        </div>

        {{-- Carrusel horizontal dinámico --}}
        <div class="horizontal-scroll">
            @foreach($libros as $libro)
                <div class="libro-card bg-white rounded-lg shadow-md mx-4" style="width: 18rem;">
                    @if($libro->imagen)
                        <img src="{{ asset('storage/' . $libro->imagen) }}" class="rounded-t-lg w-full h-64 object-cover" alt="Imagen de {{ $libro->titulo }}">
                    @endif
                    <div class="p-4">
                        <h5 class="text-lg font-bold text-gray-800">{{ $libro->titulo }}</h5>
                        <p class="text-gray-600 mt-2">
                            Autor: {{ $libro->autor }} <br>
                            @if($libro->url)
                                <a href="{{ $libro->url }}" target="_blank" class="text-blue-500 hover:underline">Leer más</a>
                            @endif
                        </p>
                        <div class="flex justify-between items-center mt-4">
                            <a href="{{ route('libros.edit', $libro->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 text-sm">Editar</a>
                            <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este libro?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Paginación (opcional) --}}
        <div class="flex justify-center mt-6">
            {{ $libros->links('pagination::simple-tailwind') }}
        </div>
    </div>
@endsection
