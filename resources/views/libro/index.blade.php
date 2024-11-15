{{-- resources/views/libro/index.blade.php --}}
@extends('layouts.app')
@section('content')

    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Libros</h1>

        {{-- Mensaje de sesión --}}
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('libros.create') }}" class="btn btn-primary">Añadir Nuevo Libro</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>URL</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($libros as $libro)
                        <tr>
                            <td>{{ $libro->id }}</td>
                            <td>{{ $libro->titulo }}</td>
                            <td>{{ $libro->autor }}</td>
                            <td>
                                @if($libro->url)
                                    <a href="{{ $libro->url }}" target="_blank" class="text-primary">{{ $libro->url }}</a>
                                @endif
                            </td>
                            <td>
                                @if($libro->imagen)
                                    <img src="{{ asset('storage/' . $libro->imagen) }}" alt="Imagen de {{ $libro->titulo }}" class="img-thumbnail" style="width: 80px; height: auto;">
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                                    <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este libro?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Paginación --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $libros->links('pagination::bootstrap-4') }}
        </div>
    </div>
    
@endsection

