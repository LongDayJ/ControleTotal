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
        Schema::create('prontuario', function (Blueprint $table) {
            $table->id();
            $table->text('medicamento');
            $table->text( 'metodo');
            $table->text('cuidado');
            $table->foreignId('consulta_id')->constrained('consulta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prontuario');
    }
};
