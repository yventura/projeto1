<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeiraLivreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feira_livre', function (Blueprint $table) {
            $table->id();
            $table->timestamp('data');
            $table->integer('desc_01');
            $table->integer('valor_fl_02');
            $table->integer('valor_fl_03');
            $table->integer('valor_fl_04');
            $table->integer('valor_fl_05');
            $table->integer('valor_fl_06');
            $table->integer('desc_06');
            $table->integer('valor_fl_07');
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
        Schema::dropIfExists('feira_livre');
    }
}
