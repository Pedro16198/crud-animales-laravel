@extends('layouts.app')

@section('title', 'Editar Animal')

@section('content')

<h2>Editar Animal</h2>

@if ($errors->any())
    <div>
        <strong>Se encontraron los siguientes errores:</strong>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('animales.update', $animal['id']) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="nombre">Nombre:</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ $animal['name'] }}"
            required
        >
    </div>

    <br>

    <div>
        <label for="especie">Especie:</label>
        <input
            type="text"
            id="species"
            name="species"
            value="{{ $animal['species'] }}"
            required
        >
    </div>

    <br>

    <div>
        <label for="edad">Edad:</label>
        <input
            type="number"
            id="age"
            name="age"
            value="{{ $animal['age'] }}"
            min="0"
            required
        >
    </div>

    <br>

    <button type="submit">Actualizar Animal</button>
</form>

<br>

<a href="{{ route('animales.index') }}">Volver al listado</a>

@endsection
