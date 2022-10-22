<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrador = Role::create(['name' => 'administrador', "guard_name" => "sanctum"]);
        $tecnico = Role::create(['name' => 'tecnico', "guard_name" => "sanctum"]);
        $docente = Role::create(['name' => 'docente', "guard_name" => "sanctum"]);
        $alumno = Role::create(['name' => 'alumno', "guard_name" => "sanctum"]);
    }
}
