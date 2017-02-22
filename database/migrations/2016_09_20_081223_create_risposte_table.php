<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRisposteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risposte', function ($table) {
            $table->increments('id');
            $table->integer('id_lab');
            $table->string('codice_fiscale_paziente', 20);
            $table->string('stringone_dati', 255);
            $table->string('nome', 100);
            $table->string('cognome', 100);
            $table->string('sesso', 1);
            $table->date('data_nascita');
            $table->boolean('scaricati');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('risposte');
    }
}
