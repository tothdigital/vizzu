<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesEndTableRev001 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vizzu_clientes_end', function (Blueprint $table) {
            $table->id();
            $table->string('cep');
            $table->string('cidade');
            $table->string('uf');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('referencia')->nullable();
            $table->bigInteger('id_cliente')->unsigned();
            $table->string('status');
            $table->timestamps();
            $table->foreign('id_cliente')->references('id')->on('vizzu_clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vizzu_clientes_end');
    }
}
