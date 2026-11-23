@extends('layouts.app')

@section('title', 'Editar especie')

@section('content')

<div class="card">

    <div class="page-header">
        <div>
            <h1>Editar especie</h1>
            <p>Modificar los datos de la especie</p>
        </div>
    </div>

    <form
        method="POST"
        action="{{ route('species.update', $species['id']) }}"
    >

        @csrf
        @method('PUT')

        <div class="form-group">

            <label for="name">
                Nombre
            </label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name', $species['name']) }}"
                required
            >

            @error('name')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="form-actions">

            <button
                type="submit"
                class="btn btn-primary"
            >
                Actualizar
            </button>

            <a
                href="{{ route('species.index') }}"
                class="btn btn-secondary"
            >
                Cancelar
            </a>

        </div>

    </form>

</div>

@endsection
