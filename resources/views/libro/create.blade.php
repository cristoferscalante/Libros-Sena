{{-- resources/views/libro/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-3xl bg-white shadow-md rounded-lg">
            <div class="bg-blue-600 text-white p-4 rounded-t-lg">
                <h1 class="text-lg font-semibold">Agregar Nuevo Libro</h1>
            </div>
            <div class="p-6">
                {{-- Incluye el formulario con el modo "Crear" --}}
                @include('libro.form', ['modo' => 'Crear'])
            </div>
        </div>
    </div>
@endsection
