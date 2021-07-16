<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicosTableRev001 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vizzu_servicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->float('valor', 8, 2)->nullable();
            $table->time('tempo_execucao')->nullable();
            $table->bigInteger('id_subcategoria')->unsigned();
            $table->bigInteger('id_profissional')->unsigned();
            $table->foreign('id_subcategoria')->references('id')->on('vizzu_subcategorias');
            $table->foreign('id_profissional')->references('id')->on('vizzu_profissionais');
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
        Schema::dropIfExists('vizzu_servicos');
    }
}
