<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Registers extends Migration
{

    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('telephone');
            $table->boolean('city')->nullable();
            $table->boolean('district')->nullable();
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->foreign('unit_id')->references('id')->on('units');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('slot')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registers');
    }
}
