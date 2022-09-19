<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        // Ejecutamos Seeder RoleSeeder
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
