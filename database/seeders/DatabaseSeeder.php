<?php

namespace Database\Seeders;

use App\Models\Habitacione;
use App\Models\Reserva;
use App\Models\ReservaHabitacione;
use App\Models\TipoHabitacione;
use App\Models\TipoReserva;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        
        TipoReserva::factory(5)->create();
        TipoHabitacione::factory(5)->create();
        Habitacione::factory(5)->create();
        Reserva::factory(5)->create();
        ReservaHabitacione::factory(5)->create();

        $this->call(RoleSeeder::class);

        User::create([
            'name' => 'Jose Luis Panta Acosta',
            'email' => 'josepanta63@gmail.com',
            'password' => bcrypt('pokemon01'),
        ])->assignRole('admin');
    }
}
