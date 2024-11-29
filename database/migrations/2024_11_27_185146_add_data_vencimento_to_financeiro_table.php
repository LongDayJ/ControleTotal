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
        Schema::table('financeiro', function (Blueprint $table) {
            $table->date(column: 'data_vencimento')->nullable();
            $table->date(column: 'data_pagamento')->nullable();
            $table->enum('status', ['PENDENTE', 'PAGO', 'CANCELADO'])->default('PENDENTE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('financeiro', function (Blueprint $table) {
            //
        });
    }
};
