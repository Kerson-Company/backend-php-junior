<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\User;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            User::create([
            'name' => 'Oscar Lima',
            'email' => 'oscar@email.com',
            'cpf'   =>  '11442061238',
            'password' => bcrypt('12345671'),


        ]);


        User::create([
            'name' => 'Liana Lima',
            'email' => 'liana@email.com',
            'cpf'   =>  '51443061238',
            'password' => bcrypt('12345671'),


        ]);

        User::create([
            'name' => 'Monica Soares',
            'email' => 'monica@email.com',
            'cpf'   =>  '81443061238',
            'password' => bcrypt('12345678'),


        ]);
    }
}
