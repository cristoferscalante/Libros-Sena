<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::paginate(10);
        return view('libro.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Muestra el formulario para crear un nuevo libro
        return view('libro.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'url' => 'nullable|url|max:255', // Validación para el campo URL
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Guardar los datos del libro, incluyendo la imagen si se subió
        $datosLibro = $request->only(['titulo', 'autor', 'url']); // Incluir el campo url
        if ($request->hasFile('imagen')) {
            $datosLibro['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }

        // Crear el nuevo registro en la base de datos
        Libro::create($datosLibro);

        return redirect()->route('libros.index')->with('success', 'Libro agregado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        // Muestra el formulario para editar el libro
        return view('libro.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        // Validar los datos actualizados
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'url' => 'nullable|url|max:255', // Validación para el campo URL
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Actualizar los datos del libro, incluyendo la imagen si se subió una nueva
        $datosLibro = $request->only(['titulo', 'autor', 'url']); // Incluir el campo url
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($libro->imagen) {
                Storage::delete('public/' . $libro->imagen);
            }
            $datosLibro['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }

        $libro->update($datosLibro);

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        // Eliminar la imagen asociada si existe
        if ($libro->imagen) {
            Storage::delete('public/' . $libro->imagen);
        }

        // Eliminar el libro de la base de datos
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente');
    }
}
