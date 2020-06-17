<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LevelsTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(LayoutsTableSeed::class);
        $this->call(TemplatesTableSeed::class);
        //
        $this->call(RegistersTableSeed::class);
        $this->call(CampaginsTableSeed::class);
        $this->call(CampaignRegistersTabelSeed::class);
    }
}
