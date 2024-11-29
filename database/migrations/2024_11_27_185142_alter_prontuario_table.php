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
        Schema::table('prontuario', function (Blueprint $table) {
            $table->dropColumn(['historico', 'observacao']);
            $table->text('medicamento')->nullable();
            $table->text('metodo')->nullable();
            $table->text('cuidado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prontuario', function (Blueprint $table) {
            $table->text('historico')->nullable();
            $table->text('observacao')->nullable();
            $table->dropColumn(['medicamento', 'metodo', 'cuidado']);
        });
    }
};