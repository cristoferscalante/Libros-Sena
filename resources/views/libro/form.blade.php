{{-- resources/views/libro/form.blade.php --}}
<form action="{{ $modo == 'Crear' ? route('libros.store') : route('libros.update', $libro->id ?? '') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @if($modo == 'Editar')
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="titulo" class="block text-gray-700 font-medium">Título</label>
        <input type="text" name="titulo" class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('titulo', $libro->titulo ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="autor" class="block text-gray-700 font-medium">Autor</label>
        <input type="text" name="autor" class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('autor', $libro->autor ?? '') }}" required>
    </div>

    <div class="form-group">
        <label for="url" class="block text-gray-700 font-medium">URL</label>
        <input type="url" name="url" class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('url', $libro->url ?? '') }}" placeholder="https://example.com">
    </div>

    <div class="form-group">
        <label for="imagen" class="block text-gray-700 font-medium">Imagen</label>
        <input type="file" name="imagen" class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-500">
        @if(isset($libro->imagen))
            <img src="{{ asset('storage/' . $libro->imagen) }}" class="mt-2 w-24 h-24 object-cover rounded-md" alt="Imagen del libro">
        @endif
    </div>

    <div class="flex items-center justify-between">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">{{ $modo }} Libro</button>
        <a href="{{ route('libros.index') }}" class="text-blue-500 hover:underline">Regresar</a>
    </div>
</form>

