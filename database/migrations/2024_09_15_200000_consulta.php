<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consulta', function (Blueprint $table) {
            $table->id();
            $table->text('queixa');
            $table->text('medicacao_pre_consulta');
            $table->text('alergia');
            $table->text('cirurgia');
            $table->text('sangramento');
            $table->text('cicatrizacao');
            $table->text('falta_ar');
            $table->text('gestante');
            $table->text('semanas');
            $table->text('observacao');
            $table->string('condigoConsulta');
            $table->foreignId('agendamento_id')->constrained('agendamento')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta');
    }
};
