<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol1 = new Role();
        $rol1->nombre = "Administrativo";
        $rol1->save();

        $rol2 = new Role();
        $rol2->nombre = "Profesor";
        $rol2->save();

        $rol3 = new Role();
        $rol3->nombre = "Estudiante";
        $rol3->save();
        
    }
}
