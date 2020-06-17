<?php

use App\Template;
use Illuminate\Database\Seeder;

class TemplatesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Template::insert([
            'name' => 'Template simples',
            'address' => 'default',
            'description' => 'Templtes padrão'
        ]);
    }
}
