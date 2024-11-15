{{-- resources/views/libro/edit.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Editar Libro</h1>

    @include('libro.form', ['modo' => 'Editar'])
@endsection
