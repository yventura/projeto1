<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laudos', function (Blueprint $table) {
            $table->id();
            $table->integer('created_user_id');
            $table->integer('departamento_id');
            $table->integer('secretaria_id');
            $table->integer('tecnico_ti_id')->nullable(); // Atual : Marcelo
            $table->integer('gestor_ti_id')->nullable(); // Atual: Wilson
            $table->integer('tipo_laudo_id');
            $table->integer('num_chamado')->unsigned();
            $table->integer('num_laudo')->unsigned();
            $table->integer('ano_laudo')->unsigned();
            $table->string('tipo_identificacao', 30);
            $table->string('identificacao', 100);
            $table->string('email_solicitante');
            $table->string('enviado', 30)->nullable();
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
        Schema::dropIfExists('laudos');
    }
}
