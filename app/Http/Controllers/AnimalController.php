<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\AnimalServiceInterface;
use App\Contracts\SpeciesServiceInterface;

class AnimalController extends Controller
{
    public function __construct(
        private AnimalServiceInterface $animalService,
        private SpeciesServiceInterface $speciesService
    )
    {
    }

    /**
    Listado de animales
    */

    public function index()
    {
        $animals = $this->animalService->all();

        return view('animales.index', compact('animals'));

    }

    /**
     * Muestra el formulario para crear un animal.
     */
    public function create()
    {
        $species = $this->speciesService->all();
        return view('animales.create', compact('species'));
    }

    /**
     * Guarda un nuevo animal en la sesión.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'name' => 'required|string|max:100',
            'species_id' => 'required|exists:species,id',
            'age' => 'required|integer|min:0',
        ]);

        $this->animalService->create($datos);

        return redirect()
            ->route('animales.index')
            ->with('success', 'Animal registrado correctamente.');
    }

    /**
     * Muestra el formulario para editar un animal.
     */
    public function edit(Request $request, $id)
    {
        $species = $this->speciesService->all();
        $animal = $this->animalService->find($id);

        if ($animal === null) {
            abort(404);
        }

        return view('animales.edit', compact('animal', 'species'));
    }

    /**
     * Actualiza un animal existente.
     */
    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'name' => 'required|string|max:100',
            'species_id' => 'required|exists:species,id',
            'age' => 'required|integer|min:0',
        ]);

        $animal = $this->animalService->update($id, $datos);

        if ($animal === null) {
            abort(404);
        }

        return redirect()
            ->route('animales.index')
            ->with('success', 'Animal actualizado correctamente.');
    }

    /**
     * Elimina un animal de la sesión.
     */
    public function destroy(Request $request, $id)
    {
        $animal = $this->animalService->delete($id);

        if ($animal === null) {
            abort(404);
        }

        return redirect()
            ->route('animales.index')
            ->with('success', 'Animal eliminado correctamente.');
    }

}
