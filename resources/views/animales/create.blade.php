@extends('layouts.app')

@section('title', 'Crear Animal')

@section('content')

```
<h2>Registrar Animal</h2>

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

<form action="{{ route('animales.store') }}" method="POST">
    @csrf

    <div>
        <label for="nombre">Nombre:</label>
        <input
        type="text"
        id="nombre"
        name="nombre"
        value="{{ old('nombre') }}"
        required
    >
    </div>

    <br>

    <div>
        <label for="especie">Especie:</label>
        <input
        type="text"
        id="especie"
        name="especie"
        value="{{ old('especie') }}"
        required
    >
    </div>

    <br>

    <div>
        <label for="edad">Edad:</label>
        <input
        type="number"
        id="edad"
        name="edad"
        value="{{ old('edad') }}"
        min="0"
        required
    >
    </div>

    <br>

    <button type="submit">Guardar Animal</button>
</form>

<br>

<a href="{{ route('animales.index') }}">Volver al listado</a>
```

@endsection
