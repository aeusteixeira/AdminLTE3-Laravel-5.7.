<?php

use App\Campaign;
use Illuminate\Database\Seeder;

class CampaginsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Campaign::class, 3)->create();
    }
}
