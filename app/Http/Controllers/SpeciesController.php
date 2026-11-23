<?php

namespace App\Http\Controllers;

use App\Contracts\SpeciesServiceInterface;
use App\Exceptions\SpeciesAlreadyExistsException;
use Illuminate\Http\Request;

class SpeciesController extends Controller
{
    public function __construct(
        protected SpeciesServiceInterface $speciesService
    ) {
    }

    public function index()
    {
        $species = $this->speciesService->all();

        return view('species.index', compact('species'));
    }

    public function create()
    {
        return view('species.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $this->speciesService->create($data);

            return redirect()
                ->route('species.index')
                ->with('success', 'Especie creada correctamente.');

        } catch (SpeciesAlreadyExistsException $e) {

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function edit(int $id)
    {
        $species = $this->speciesService->find($id);

        if ($species === null) {
            abort(404);
        }

        return view('species.edit', compact('species'));
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {
            $species = $this->speciesService->update($id, $data);

            if ($species === null) {
                abort(404);
            }

            return redirect()
                ->route('species.index')
                ->with('success', 'Especie actualizada correctamente.');

        } catch (SpeciesAlreadyExistsException $e) {

            return back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function destroy(int $id)
    {
        $deleted = $this->speciesService->delete($id);

        if (!$deleted) {
            abort(404);
        }

        return redirect()
            ->route('species.index')
            ->with('success', 'Especie eliminada correctamente.');
    }

}
