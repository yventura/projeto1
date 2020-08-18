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
            $table->string('vistoria_processos');
            $table->string('vistoria_vre');
            $table->string('viabilidade_vre');
            $table->string('ciencia');
            $table->string('intimacao');
            $table->string('plantao_interno');
            $table->string('atendimento_guiche');
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
