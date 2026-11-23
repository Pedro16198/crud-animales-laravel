
@extends('layouts.app')

@section('title', 'Editar Animal')

@section('content')

<div class="card">

    <div class="page-header">
        <div>
            <h1>Editar animal</h1>
            <p>Modificar los datos del animal seleccionado</p>
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
        action="{{ route('animales.update', $animal['id']) }}"
        method="POST"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre</label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name', $animal['name']) }}"
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
                    <option value="{{ $specie['id'] }}" {{ old('species_id', $animal['species_id']) == $specie['id'] ? 'selected' : '' }}>
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
                value="{{ old('age', $animal['age']) }}"
                min="0"
                required
            >

            @error('age')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                Actualizar animal
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
