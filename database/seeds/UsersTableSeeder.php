<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Matheus Teixeira',
            'email' => 'contato.matheusteixeira@gmail.com',
            'password' => bcrypt('123456789'),
            'CPF' => '17686992756',
            'telephone' => '21994282445',
            'thumbnail' => 'default.png',
            'level_id' => 1,
            'unit_id' => 1
        ]);
    }
}
