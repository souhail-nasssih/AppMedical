<?php

namespace Database\Seeders;

use App\Models\Medecin;
use App\Models\Patient;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Créer 10 médecins avec des utilisateurs associés
        Medecin::factory(10)->create();

        // Créer 50 patients avec des utilisateurs associés
        Patient::factory(50)->create();
    }
}
