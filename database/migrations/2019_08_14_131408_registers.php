<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Registers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email');
            $table->string('age')->default('');
            $table->string('date_of_birth')->default('');
            $table->string('telephone');
            $table->string('telephone2')->default('')->nullable();
            $table->unsignedBigInteger('unit_id');
            $table->foreign('unit_id')->references('id')->on('units');

            // Aqui verifica se o Workshop já foi pago: 1 = SIM | 2 = NÃO
            $table->integer('status_workshop_payment')->default('2')->nullable();

            // Aqui verifica qual dia foi agendado o Workshop, caso o pagamento foi feito
            $table->dateTime('date_workshop_payment')->nullable();

            // Interesses pessoais do registro
            $table->longText('personal_interests')->nullable();

            // Endereço do usuário
            $table->string('address')->default('');

            // Se o usuário ja estudou com a gente
            $table->enum('study', [0, 1])->default(0);

            //Descrição interna
            $table->longText('description')->nullable();

            $table->enum('status', [
            'in_attendance',
            'user_has_no_interest',
            'user_already_a_student',
            'user_became_a_registration',
            'finished'
            ])->default('in_attendance');

            $table->enum('notification', [0, 1])->default(0);
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
        Schema::dropIfExists('registers');
    }
}
