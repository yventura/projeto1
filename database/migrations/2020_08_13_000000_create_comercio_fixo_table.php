<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComercioFixoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comercio_fixo', function (Blueprint $table) {
            $table->id();
            $table->timestamp('data');
            $table->integer('vistoria_processos');
            $table->integer('vistoria_vre');
            $table->integer('viabilidade_vre');
            $table->integer('ciencia');
            $table->integer('intimacao');
            $table->integer('plantao_interno');
            $table->integer('atendimento_guiche');
            $table->string('observacao')->nullable();
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
        Schema::dropIfExists('comercio_fixo');
    }
}
