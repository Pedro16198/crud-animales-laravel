<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
    Listado de animales
    */

    public function index(Request $request)
    {
        $animales = $request->session()->get('animales', []);

        return view('animales.index', compact('animales'));
    }

    /**
     * Muestra el formulario para crear un animal.
     */
    public function create()
    {
        return view('animales.create');
    }

    /**
     * Guarda un nuevo animal en la sesión.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:100',
            'especie' => 'required|string|max:100',
            'edad' => 'required|integer|min:0',
        ]);

        $animales = $request->session()->get('animales', []);

        $ultimoId = empty($animales)
        ? 0
        : max(array_column($animales, 'id'));

        $animal = [
            'id' => $ultimoId + 1,
            'nombre' => $datos['nombre'],
            'especie' => $datos['especie'],
            'edad' => $datos['edad'],
        ];

        $animales[] = $animal;

        $request->session()->put('animales', $animales);

        return redirect()
            ->route('animales.index')
            ->with('success', 'Animal registrado correctamente.');
    }

    /**
     * Muestra el formulario para editar un animal.
     */
    public function edit(Request $request, $id)
    {
        $animales = $request->session()->get('animales', []);

        foreach ($animales as $animal) {
            if ($animal['id'] == $id) {
                return view('animales.edit', compact('animal'));
            }
        }

        return redirect()->route('animales.index');
    }

    /**
     * Actualiza un animal existente.
     */
    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:100',
            'especie' => 'required|string|max:100',
            'edad' => 'required|integer|min:0',
        ]);

        $animales = $request->session()->get('animales', []);

        foreach ($animales as $key => $animal) {
            if ($animal['id'] == $id) {
                $animales[$key]['nombre'] = $datos['nombre'];
                $animales[$key]['especie'] = $datos['especie'];
                $animales[$key]['edad'] = $datos['edad'];

                break;
            }
        }

        $request->session()->put('animales', $animales);

        return redirect()
            ->route('animales.index')
            ->with('success', 'Animal actualizado correctamente.');
    }

    /**
     * Elimina un animal de la sesión.
     */
    public function destroy(Request $request, $id)
    {
        $animales = $request->session()->get('animales', []);

        foreach ($animales as $key => $animal) {
            if ($animal['id'] == $id) {
                unset($animales[$key]);
                break;
            }
        }

        $request->session()->put('animales', array_values($animales));

        return redirect()
            ->route('animales.index')
            ->with('success', 'Animal eliminado correctamente.');
    }

}
