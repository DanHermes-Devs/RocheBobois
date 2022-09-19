<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Dan Hermes',
                'email' => 'danhermes@mgail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$TRhlrlmi21q41ZQF8zfmfuElrfopDVFh22Lm7tamBNtd4Zr4ik9vq',
                'remember_token' => NULL,
                'created_at' => '2022-09-19 06:10:34',
                'updated_at' => '2022-09-19 06:10:34',
            ),
        ));
        
        
    }
}