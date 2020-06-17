<?php

use App\Register;
use Illuminate\Database\Seeder;

class RegistersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Register::class, 1000)->create();
    }
}
