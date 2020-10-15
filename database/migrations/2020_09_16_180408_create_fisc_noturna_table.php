<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFiscNoturnaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fisc_noturna', function (Blueprint $table) {
            $table->id();
            $table->timestamp('data');
            $table->integer('paralisacao_evento')->nullable();
            $table->integer('atendimento_denuncia')->nullable();
            $table->integer('comercio_ambulante')->nullable();
            $table->integer('atendimento_processos')->nullable();
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
        Schema::dropIfExists('fisc_noturna');
    }
}
