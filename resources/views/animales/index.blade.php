@extends('layouts.app')

@section('title', 'Listado de Animales')

@section('content')

```
<h2>Listado de Animales</h2>

@if (session('success'))
    <p>
        {{ session('success') }}
    </p>
@endif

@if (empty($animales))
    <p>No hay animales registrados.</p>
@else
    <ul>
        @foreach ($animales as $animal)
            <li>
                {{ $animal['nombre'] }} -
                {{ $animal['especie'] }} -
                {{ $animal['edad'] }} años

                <a href="{{ route('animales.edit', $animal['id']) }}">
                    Editar
                </a>

                <form
                    action="{{ route('animales.destroy', $animal['id']) }}"
                    method="POST"
                    style="display: inline;"
                    onsubmit="return confirm('¿Está seguro de eliminar este animal?');"
                >
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Eliminar
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
@endif

<br>

<a href="{{ route('animales.create') }}">
    Registrar nuevo animal
</a>
```

@endsection
