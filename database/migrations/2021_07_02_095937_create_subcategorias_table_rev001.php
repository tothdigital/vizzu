<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriasTableRev001 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vizzu_subcategorias', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->string('descricao')->nullable();
            $table->string('status');
            $table->bigInteger('pai_id')->unsigned();
            $table->foreign('pai_id')->references('id')->on('vizzu_categorias')->onDelete('cascade');
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
        Schema::dropIfExists('vizzu_subcategorias');
    }
}
