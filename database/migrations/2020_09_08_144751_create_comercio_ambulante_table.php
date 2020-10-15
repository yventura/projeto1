<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComercioAmbulanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Criação do Banco de dados da Ocorrencia de Comercio Ambulante
        Schema::create('comercio_ambulante', function (Blueprint $table) {
            $table->id();
            $table->timestamp('data');
            $table->integer('valor_ca_01');
            $table->integer('valor_ca_02');
            $table->integer('valor_ca_03');
            $table->integer('desc_03');
            $table->integer('valor_ca_04');
            $table->integer('valor_ca_05');
            $table->integer('valor_ca_06');
            $table->integer('desc_06');
            $table->integer('valor_ca_07');
            $table->integer('desc_07');
            $table->integer('valor_ca_08');
            $table->integer('desc_08');
            $table->integer('valor_ca_09');
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
        Schema::dropIfExists('comercio_ambulante');
    }
}
