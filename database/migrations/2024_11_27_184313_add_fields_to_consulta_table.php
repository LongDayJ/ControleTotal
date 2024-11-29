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
        Schema::table('consulta', function (Blueprint $table) {
            $table->text('queixa')->nullable();
            $table->text('medicacao_pre_consulta')->nullable();
            $table->text('alergia')->nullable();
            $table->text('cirurgia')->nullable();
            $table->text('sangramento')->nullable();
            $table->text('cicatrizacao')->nullable();
            $table->text('falta_ar')->nullable();
            $table->text('gestante')->nullable();
            $table->text('semanas')->nullable();
            $table->text('observacao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consulta', function (Blueprint $table) {
            $table->dropColumn([
                'queixa',
                'medicacao_pre_consulta',
                'alergia',
                'cirurgia',
                'sangramento',
                'cicatrizacao',
                'falta_ar',
                'gestante',
                'semanas',
                'observacao'
            ]);
        });
    }
};