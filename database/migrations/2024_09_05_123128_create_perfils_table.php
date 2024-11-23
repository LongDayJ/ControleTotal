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
        Schema::create('perfils', function (Blueprint $table) {
        
            $table->id();
            $table->enum('nome', ['ADM', 'COLABORADOR' , 'CLIENTE', 'PROFISSIONAL_DE_SAUDE'])->default('CLIENTE');
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perfils');
    }
};
