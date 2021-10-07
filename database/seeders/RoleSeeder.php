<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleUser = Role::create(['name' => 'user']);

        Permission::create(['name' => 'crearGeneral'])->assignRole($roleAdmin);
        Permission::create(['name' => 'editarGeneral'])->assignRole($roleAdmin);
        Permission::create(['name' => 'mostrarGeneral'])->assignRole($roleAdmin);
        Permission::create(['name' => 'eliminarGeneral'])->assignRole($roleAdmin);

        Permission::create(['name' => 'crearReserva'])->assignRole($roleUser);
        Permission::create(['name' => 'editarReserva'])->assignRole($roleUser);
        Permission::create(['name' => 'mostrarReserva'])->assignRole($roleUser);
        Permission::create(['name' => 'eliminarReserva'])->assignRole($roleUser);

    }
}
