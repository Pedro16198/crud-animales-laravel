@extends('layouts.app')

@section('title', 'Listado de Animales')

@section('content')

```
<h2>Listado de Animales</h2>

@if (session('success'))
    <div class="mensaje-exito">
        {{ session('success') }}
    </div>
@endif

@if (empty($animales))
    <p>No hay animales registrados.</p>
@else
    <ul class="lista-animales">
        @foreach ($animales as $animal)
            <li class="animal">

                <strong>{{ $animal['nombre'] }}</strong>
                - {{ $animal['especie'] }}
                - {{ $animal['edad'] }} años

                <div class="acciones">
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
                </div>

            </li>
        @endforeach
    </ul>
@endif

<a
    href="{{ route('animales.create') }}"
    class="boton-principal"
>
    Registrar nuevo animal
</a>
```

@endsection
