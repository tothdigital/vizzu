<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfRelCatTableRev001 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vizzu_prof_rel_cat', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vizzu_subcategorias_id')->unsigned();
            $table->bigInteger(' vizzu_profissionais_id ')->unsigned();
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
        Schema::dropIfExists('vizzu_prof_rel_cat');
    }
}
