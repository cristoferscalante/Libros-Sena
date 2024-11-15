{{-- resources/views/libro/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Lista de Libros</h1>

        {{-- Mensaje de sesión --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('libros.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Añadir Nuevo Libro</a>
        </div>

        <table class="w-full table-auto border-collapse bg-white shadow rounded-lg">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-4 text-left">ID</th>
                    <th class="py-3 px-4 text-left">Título</th>
                    <th class="py-3 px-4 text-left">Autor</th>
                    <th class="py-3 px-4 text-left">URL</th>
                    <th class="py-3 px-4 text-left">Imagen</th>
                    <th class="py-3 px-4 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm font-light">
                @foreach($libros as $libro)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-4">{{ $libro->id }}</td>
                        <td class="py-3 px-4">{{ $libro->titulo }}</td>
                        <td class="py-3 px-4">{{ $libro->autor }}</td>
                        <td class="py-3 px-4">
                            @if($libro->url)
                                <a href="{{ $libro->url }}" target="_blank" class="text-blue-500 hover:underline">{{ $libro->url }}</a>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            @if($libro->imagen)
                                <img src="{{ asset('storage/' . $libro->imagen) }}" alt="Imagen de {{ $libro->titulo }}" class="w-16 h-16 object-cover rounded">
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex space-x-2">
                                <a href="{{ route('libros.edit', $libro->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Editar</a>
                                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este libro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Paginación --}}
        <div class="mt-6">
            {{ $libros->links() }}
        </div>
    </div>
@endsection
