
@extends('layouts.app')

@section('title', 'Animales')

@section('content')

<div class="card">

    <div class="page-header">

        <div>
            <h1>Animales</h1>
            <p>Administración de animales registrados</p>
        </div>

        <a
            href="{{ route('animales.create') }}"
            class="btn btn-primary"
        >
            + Registrar animal
        </a>

    </div>

    @if (count($animals) > 0)

        <div class="table-container">
            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Edad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($animals as $animal)

                        <tr>
                            <td>{{ $animal['id'] }}</td>

                            <td>{{ $animal['name'] }}</td>

                            <td>{{ $animal['species_id'] }}</td>

                            <td>{{ $animal['age'] }} años</td>

                            <td>
                                <div class="actions">

                                    <a
                                        href="{{ route('animales.edit', $animal['id']) }}"
                                        class="btn btn-warning"
                                    >
                                        Editar
                                    </a>

                                    <form
                                        action="{{ route('animales.destroy', $animal['id']) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Está seguro de eliminar este animal?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger"
                                        >
                                            Eliminar
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @endforeach
                </tbody>

            </table>
        </div>

    @else

        <p>No hay animales registrados.</p>

    @endif

</div>

@endsection
