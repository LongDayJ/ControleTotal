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
        Schema::create('agendamento', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->time('hora');
            $table->enum('status', ['AGENDADO', 'CONCLUIDO', 'CANCELADO'])->default('AGENDADO');
            $table->text('observacao');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('dentista_id')->constrained('dentista')->onDelete('cascade');
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamento');
    }
};
