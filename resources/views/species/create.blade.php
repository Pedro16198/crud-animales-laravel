@extends('layouts.app')

@section('title', 'Nueva especie')

@section('content')

<div class="card">

    <div class="page-header">
        <div>
            <h1>Nueva especie</h1>
            <p>Registrar una nueva especie</p>
        </div>
    </div>

    <form
        method="POST"
        action="{{ route('species.store') }}"
    >

        @csrf

        <div class="form-group">

            <label for="name">
                Nombre
            </label>

            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                placeholder="Ingrese el nombre de la especie"
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
                Guardar
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
