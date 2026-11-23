<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animals = [
            ['name' => 'Milo', 'species_id' => 1, 'age' => 5],
            ['name' => 'Luna', 'species_id' => 2, 'age' => 2],
            ['name' => 'Paco', 'species_id' => 3, 'age' => 12],
        ];

        foreach ($animals as $a) {
         DB::insert( 'INSERT INTO animals (name, species_id, age) VALUES (?, ?, ?)',
         [$a['name'], $a['species_id'], $a['age']]
         );
        }

    }
}
