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
        Schema::create('consulta_procedimentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consulta_id')->constrained('consulta')->onDelete('cascade');
            $table->foreignId('procedimento_id')->constrained('procedimentos')->onDelete('cascade');
            $table->decimal('preco', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulta_procedimentos');
    }
};
