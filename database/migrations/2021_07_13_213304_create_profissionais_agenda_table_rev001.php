<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissionaisAgendaTableRev001 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vizzu_profissionais_agenda', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_profissional');
            $table->text('dia_semana');
            $table->text('horario_entrada')->nullable();
            $table->text('horario_pausa')->nullable();
            $table->text('horario_retorno')->nullable();
            $table->text('horario_saida')->nullable();
            $table->text('status');
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
        Schema::dropIfExists('vizzu_profissionais_agenda');
    }
}
