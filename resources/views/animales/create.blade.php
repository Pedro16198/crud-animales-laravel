
@extends('layouts.app')

@section('title', 'Registrar Animal')

@section('content')

<div class="card">

    <div class="page-header">
        <div>
            <h1>Registrar animal</h1>
            <p>Completar los datos del nuevo animal</p>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-error">
            <strong>Revisá los siguientes errores:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('animales.store') }}"
        method="POST"
    >
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                placeholder="Ingrese el nombre del animal"
                required
            >

            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="species">Especie</label>

            <select
                id="species_id"
                name="species_id"
                class="form-control"
                required
            >
                <option value="">Seleccione una especie</option>
                @foreach ($species as $specie)
                    <option value="{{ $specie['id'] }}" {{ old('species_id') == $specie['id'] ? 'selected' : '' }}>
                        {{ $specie['name'] }}
                    </option>
                @endforeach
            </select>

            @error('species_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="age">Edad</label>

            <input
                type="number"
                id="age"
                name="age"
                class="form-control"
                value="{{ old('age') }}"
                min="0"
                placeholder="Ingrese la edad"
                required
            >

            @error('age')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                Guardar animal
            </button>

            <a
                href="{{ route('animales.index') }}"
                class="btn btn-secondary"
            >
                Cancelar
            </a>
        </div>
    </form>

</div>

@endsection
