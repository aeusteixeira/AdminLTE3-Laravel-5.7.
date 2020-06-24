<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Layouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

            // Public
            $table->boolean('name_input')->nullable();
            $table->boolean('email_input')->nullable();
            $table->boolean('telephone_input')->nullable();
            $table->boolean('unit_input')->nullable();
            $table->boolean('city_input')->nullable();
            $table->boolean('district_input')->nullable();
            $table->boolean('courses_input')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('layouts');
    }
}
