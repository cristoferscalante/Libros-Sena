{{-- resources/views/libro/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Agregar Nuevo Libro</h1>

        {{-- Incluye el formulario con el modo "Crear" --}}
        @include('libro.form', ['modo' => 'Crear'])
    </div>
@endsection
