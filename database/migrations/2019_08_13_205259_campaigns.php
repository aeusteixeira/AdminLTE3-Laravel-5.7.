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
            $table->unsignedBigInteger('layout_id')->nullable();
            $table->foreign('layout_id')->references('id')->on('layouts');
            $table->unsignedBigInteger('template_id')->nullable();
            $table->foreign('template_id')->references('id')->on('templates');
            $table->unsignedBigInteger('unit_id')->nullable();
            $table->foreign('unit_id')->references('id')->on('units');
            $table->boolean('redirect')->nullable();
            $table->string('goTo');
            $table->enum('status', ['active', 'paused' ,'finished']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
