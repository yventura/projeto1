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
            $table->integer('valor_cf_01');
            $table->integer('valor_cf_02');
            $table->integer('valor_cf_03');
            $table->integer('valor_cf_04');
            $table->integer('valor_cf_05');
            $table->integer('valor_cf_06');
            $table->integer('valor_cf_07');
            $table->integer('valor_cf_08');
            $table->integer('desc_08');
            $table->integer('valor_cf_09');
            $table->integer('desc_09');
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
