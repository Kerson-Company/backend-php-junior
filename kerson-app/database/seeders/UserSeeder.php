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
            'name' => 'Osvaldo Souza',
            'email' => 'osvaldo@email.com',
            'cpf'   =>  '51442061235',
            'password' => bcrypt('12345678'),

        ]);
    }
}
