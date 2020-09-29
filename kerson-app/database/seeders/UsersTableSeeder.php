<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
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
            'password' => bbcrypt('12345678'),

        ]);
    }
}
