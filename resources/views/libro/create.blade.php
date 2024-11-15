{{-- resources/views/libro/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="h4 mb-0">Agregar Nuevo Libro</h1>
            </div>
            <div class="card-body">
                {{-- Incluye el formulario con el modo "Crear" --}}
                @include('libro.form', ['modo' => 'Crear'])
            </div>
        </div>
    </div>
@endsection

