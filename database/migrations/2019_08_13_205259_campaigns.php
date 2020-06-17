<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Campaigns extends Migration
{

    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_private');
            $table->text('description_private')->nullable();
            $table->string('name_public');
            $table->text('information_public')->nullable();
            $table->string('slug');
            $table->text('default_whatsapp_message')->nullable();
            $table->text('default_email_message')->nullable();
            $table->unsignedBigInteger('layout_id');
            $table->foreign('layout_id')->references('id')->on('layouts');

            $table->unsignedBigInteger('template_id');
            $table->foreign('template_id')->references('id')->on('templates');

            $table->unsignedBigInteger('unit_id')->nullable();
            $table->foreign('unit_id')->references('id')->on('units');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('level_id')->nullable();
            $table->foreign('level_id')->references('id')->on('levels');

            $table->boolean('redirect')->nullable();
            $table->string('redirectTo')->nullable();;
            $table->enum('status', ['active', 'paused' ,'finished']);
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
