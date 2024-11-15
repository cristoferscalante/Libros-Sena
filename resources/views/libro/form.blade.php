{{-- resources/views/libro/form.blade.php --}}
<form action="{{ $modo == 'Crear' ? route('libros.store') : route('libros.update', $libro->id ?? '') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($modo == 'Editar')
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $libro->titulo ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="autor" class="form-label">Autor</label>
        <input type="text" name="autor" class="form-control" value="{{ old('autor', $libro->autor ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="url" class="form-label">URL</label>
        <input type="url" name="url" class="form-control" value="{{ old('url', $libro->url ?? '') }}" placeholder="https://example.com">
    </div>

    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" name="imagen" class="form-control">
        @if(isset($libro->imagen))
            <div class="mt-2">
                <img src="{{ asset('storage/' . $libro->imagen) }}" class="img-thumbnail" style="width: 150px; height: auto;" alt="Imagen del libro">
            </div>
        @endif
    </div>

    <div class="d-flex justify-content-between mt-4">
        <button type="submit" class="btn btn-success">{{ $modo }} Libro</button>
        <a href="{{ route('libros.index') }}" class="btn btn-secondary">Regresar</a>
    </div>
</form>
