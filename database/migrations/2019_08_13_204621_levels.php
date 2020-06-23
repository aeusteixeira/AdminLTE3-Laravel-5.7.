<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Levels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

            // Sector
            $table->enum('marketing', [0, 1])->nullable();
            $table->enum('sales', [0, 1])->nullable();
            $table->enum('administrative', [0, 1])->nullable();
            $table->enum('units', [0, 1])->nullable();

            $table->text('description')->nullable();

            // User
            $table->enum('create_user', [0, 1])->nullable();
            $table->enum('update_user', [0, 1])->nullable();
            $table->enum('delete_user', [0, 1])->nullable();

            //Register
            $table->enum('create_register', [0, 1])->nullable();
            $table->enum('update_register', [0, 1])->nullable();
            $table->enum('delete_register', [0, 1])->nullable();

            //Level
            $table->enum('create_level', [0, 1])->nullable();
            $table->enum('update_level', [0, 1])->nullable();
            $table->enum('delete_level', [0, 1])->nullable();

            //Unit
            $table->enum('create_unit', [0, 1])->nullable();
            $table->enum('update_unit', [0, 1])->nullable();
            $table->enum('delete_unit', [0, 1])->nullable();

            //Layouts
            $table->enum('create_layout', [0, 1])->nullable();
            $table->enum('update_layout', [0, 1])->nullable();
            $table->enum('delete_layout', [0, 1])->nullable();

            //Campaign
            $table->enum('create_campaign', [0, 1])->nullable();
            $table->enum('update_campaign', [0, 1])->nullable();
            $table->enum('delete_campaign', [0, 1])->nullable();

            //Email
            $table->enum('create_email', [0, 1])->nullable();
            $table->enum('delete_email', [0, 1])->nullable();

            //Post
            $table->enum('create_post', [0, 1])->nullable();
            $table->enum('update_post', [0, 1])->nullable();
            $table->enum('delete_post', [0, 1])->nullable();

            //Messages
            $table->enum('create_message', [0, 1])->nullable();
            $table->enum('update_message', [0, 1])->nullable();
            $table->enum('delete_message', [0, 1])->nullable();

            //Spreadsheet
            $table->enum('spreadsheet_generate', [0, 1])->nullable();
            $table->enum('spreadsheet_import', [0, 1])->nullable();

            //PrintScreen and Printer
            $table->enum('print_screen', [0, 1])->nullable();
            $table->enum('printer', [0, 1])->nullable();

            //PrintScreen and Printer
            $table->enum('administrator', [0, 1])->nullable();

            //GOD
            $table->enum('god', [0, 1])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
    }
}
