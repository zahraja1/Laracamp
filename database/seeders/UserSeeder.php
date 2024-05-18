<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            array(
                'name' => 'Admin',
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make("1234"),
                'role' => 1
            ),
            array(
                'name' => 'Mentor',
                'username' => 'Mentor',
                'email' => 'mentor@gmail.com',
                'password' => Hash::make("1234"),
                'role' => 2
            ),
            array(
                'name' => 'peserta',
                'username' => 'peserta',
                'email' => 'peserta@gmail.com',
                'password' => Hash::make("1234"),
                'role' => 3
            ),
            
        ));
    }
}
