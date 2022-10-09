<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Dan Hermes',
            'email' => 'danhermes@mgail.com',
            'empresa' => 'Fussion México',
            'cargo' => 'Programador',
            'pais' => 'México',
            'estado' => 'Estado de México',
            'codigo_postal' => '54485',
            'telefono' => '5554709648',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
        ]);

        $user1->assignRole(1);

        $user1->createAsStripeCustomer();
       
        $user2 = User::create([
            'name' => 'Dinorah',
            'email' => 'dtobias@fussionmexico.com',
            'empresa' => 'Fussion México',
            'cargo' => 'Investigación',
            'pais' => 'México',
            'estado' => 'Ciudad de México',
            'codigo_postal' => '54485',
            'telefono' => '5576636448',
            'password' => Hash::make('123456789'),
            'email_verified_at' => now(),
        ]);

        $user2->assignRole(1);

        $user2->createAsStripeCustomer();
    }
}
