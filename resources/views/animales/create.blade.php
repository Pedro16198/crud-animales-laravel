@extends('layouts.app')

@section('title', 'Crear Animal')

@section('content')

<h2>Registrar Animal</h2>

@if ($errors->any())
    <div class="errores">
        <strong>Se encontraron los siguientes errores:</strong>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('animales.store') }}" method="POST">
    @csrf

    <div class="campo">
        <label for="nombre">Nombre:</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name') }}"
            required
        >
    </div>

    <div class="campo">
        <label for="especie">Especie:</label>
        <input
            type="text"
            id="species"
            name="species"
            value="{{ old('species') }}"
            required
        >
    </div>

    <div class="campo">
        <label for="edad">Edad:</label>
        <input
            type="number"
            id="age"
            name="age"
            value="{{ old('age') }}"
            min="0"
            required
        >
    </div>

    <button type="submit">
        Guardar Animal
    </button>
</form>

<br>

<a href="{{ route('animales.index') }}">
    Volver al listado
</a>

@endsection
