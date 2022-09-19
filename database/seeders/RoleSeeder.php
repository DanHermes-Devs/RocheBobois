<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        // Creamos los roles, pueden ser cuantos se requieran
        $admin = Role::create(['name' => 'admin']);
        $cliente = Role::create(['name' => 'cliente']);
    }
}
