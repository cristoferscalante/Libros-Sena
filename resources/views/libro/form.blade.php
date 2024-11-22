{{-- resources/views/libro/form.blade.php --}}
<form action="{{ $modo == 'Crear' ? route('libros.store') : route('libros.update', $libro->id ?? '') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
    @csrf
    @if($modo == 'Editar')
        @method('PUT')
    @endif

    <!-- Título -->
    <div>
        <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
        <input type="text" name="titulo" id="titulo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('titulo', $libro->titulo ?? '') }}" required>
    </div>

    <!-- Autor -->
    <div>
        <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
        <input type="text" name="autor" id="autor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('autor', $libro->autor ?? '') }}" required>
    </div>

    <!-- URL -->
    <div>
        <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
        <input type="url" name="url" id="url" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" value="{{ old('url', $libro->url ?? '') }}" placeholder="https://example.com">
    </div>

    <!-- Imagen -->
    <div>
        <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
        <input type="file" name="imagen" id="imagen" class="mt-1 block w-full text-gray-700 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        @if(isset($libro->imagen))
            <div class="mt-4">
                <img src="{{ asset('storage/' . $libro->imagen) }}" class="w-36 h-auto rounded-md shadow-md" alt="Imagen del libro">
            </div>
        @endif
    </div>

    <!-- Botones -->
    <div class="flex justify-between mt-6">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
            {{ $modo }} Libro
        </button>
        <a href="{{ route('libros.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
            Regresar
        </a>
    </div>
</form>
