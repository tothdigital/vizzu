<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesAgendamentoTableRev002 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vizzu_clientes_agendamento', function (Blueprint $table) {
            //
            $table->bigInteger('id_servico')->unsigned()->after('id_cliente');
            $table->foreign('id_servico')->references('id')->on('vizzu_servicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vizzu_clientes_agendamento', function (Blueprint $table) {
            //
        });
    }
}
