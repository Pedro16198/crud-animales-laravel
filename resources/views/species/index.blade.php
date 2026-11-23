@extends('layouts.app')

@section('title', 'Especies')

@section('content')

<div class="card">

    <div class="page-header">

        <div>
            <h1>Especies</h1>
            <p>Administración de especies registradas</p>
        </div>

        <a
            href="{{ route('species.create') }}"
            class="btn btn-primary"
        >
            + Nueva especie
        </a>

    </div>

    @if (count($species) > 0)

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>

                @foreach ($species as $specie)

                    <tr>

                        <td>
                            {{ $specie['id'] }}
                        </td>

                        <td>
                            {{ $specie['name'] }}
                        </td>

                        <td>

                            <div class="actions">

                                <a
                                    href="{{ route('species.edit', $specie['id']) }}"
                                    class="btn btn-warning"
                                >
                                    Editar
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route('species.destroy', $specie['id']) }}"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('¿Está seguro de eliminar esta especie?')"
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

    @else

        <p>
            No hay especies registradas.
        </p>

    @endif

</div>

@endsection
