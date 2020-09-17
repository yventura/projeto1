<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePraiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Criação do Banco de dados da Ocorrencia de Ambulantes
        Schema::create('praias', function (Blueprint $table) {
            $table->id();
            $table->timestamp('data');
            $table->integer('localidade');
            $table->integer('cadeiras');
            $table->integer('animais');
            $table->integer('bicicletas');
            $table->integer('guardasol');
            $table->integer('camping');
            $table->integer('churrasco');
            $table->integer('vistoriadas');
            $table->integer('irregulares');
            $table->integer('covid');
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
        Schema::dropIfExists('praias');
    }
}
