<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCfixoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cfixo', function (Blueprint $table) {
            $table->id();
            $table->date()->nullable();
            $table->number('pro');
            $table->number('vis');
            $table->number('via');
            $table->number('cie');
            $table->number('int');
            $table->number('pla');
            $table->number('ate');
            $table->number('obs');
            $table->timestamps()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cfixo');
    }
}
