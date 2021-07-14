<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesAgendamentoTableRev001 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vizzu_clientes_agendamento', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_profissional')->unsigned();
            $table->bigInteger('id_cliente')->unsigned();
            $table->text('horario_inicio');
            $table->text('horario_fim');
            $table->date('data');
            $table->text('status');
            $table->timestamps();
            $table->foreign('id_profissional')->references('id')->on('vizzu_profissionais');
            $table->foreign('id_cliente')->references('id')->on('vizzu_clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vizzu_clientes_agendamento');
    }
}
