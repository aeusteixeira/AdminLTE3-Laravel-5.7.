<?php

use App\Layout;
use Illuminate\Database\Seeder;

class LayoutsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Layout::insert([
            'name' => 'NOME | TELEFONE | EMAIL',
            'name_input' => 1,
            'email_input' => 1,
            'telephone_input' => 1
        ]);
    }
}
