<?php

namespace App\Services;

use App\Contracts\SpeciesServiceInterface;
use App\Exceptions\SpeciesAlreadyExistsException;
use Illuminate\Support\Facades\DB;

class SQLSpeciesService implements SpeciesServiceInterface
{
    public function all(): array
    {
        return DB::table('species')
            ->get()
            ->map(fn ($species) => (array) $species)
            ->toArray();
    }

    public function find(int|string $id): ?array
    {
        $species = DB::table('species')
            ->where('id', $id)
            ->first();

        return $species ? (array) $species : null;
    }

    public function create(array $data): array
    {
        $exists = DB::table('species')
            ->where('name', $data['name'])
            ->exists();

        if ($exists) {
            throw SpeciesAlreadyExistsException::forName($data['name']);
        }

        $id = DB::table('species')->insertGetId([
            'name' => $data['name'],
        ]);

        return $this->find($id);
    }

    public function update(int|string $id, array $data): ?array
    {
        $exists = DB::table('species')
            ->where('name', $data['name'])
            ->where('id', '<>', $id)
            ->exists();

        if ($exists) {
            throw SpeciesAlreadyExistsException::forName($data['name']);
        }

        $updated = DB::table('species')
            ->where('id', $id)
            ->update([
                'name' => $data['name'],
            ]);

        if ($updated === 0) {
            return null;
        }

        return $this->find($id);
    }

    public function delete(int|string $id): bool
    {
        return DB::table('species')
            ->where('id', $id)
            ->delete() > 0;
    }

    public function reset(): void
    {
        DB::table('species')->truncate();

        DB::statement(
         "DELETE FROM sqlite_sequence WHERE name = 'species'"
         );


    }
}
