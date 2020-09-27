<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 25)->create();

        // create a static default user
        if(\App\User::whereEmail('test@example.com')->get()->isEmpty()){
            \App\User::create([
                'name' => 'Programador Backend PHP Júnior',
                'email' => 'test@example.com',
                'cpf' => '12345678901',
                'password' => Hash::make('password'), // password
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
