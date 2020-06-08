<?php

use App\Level;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::insert([
            'name' => 'Suporte',
            'description' => 'Usuários com esse nível pode truncar o sistema.',
            'god' => 1,
        ]);
    }
}
