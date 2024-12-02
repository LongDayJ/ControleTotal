<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::table('agendamento', function (Blueprint $table) {
			$table->enum('status_temp', ['AGENDADO', 'CONCLUIDO', 'CANCELADO', 'CONFIRMADO'])->default('AGENDADO');
		});

		DB::statement('UPDATE agendamento SET status_temp = status');

		Schema::table('agendamento', function (Blueprint $table) {
			$table->dropColumn('status');
			$table->renameColumn('status_temp', 'status');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::table('agendamento', function (Blueprint $table) {
			$table->enum('status_temp', ['AGENDADO', 'CONCLUIDO', 'CANCELADO'])->default('AGENDADO');
		});

		DB::statement('UPDATE agendamento SET status_temp = status');

		Schema::table('agendamento', function (Blueprint $table) {
			$table->dropColumn('status');
			$table->renameColumn('status_temp', 'status');
		});
	}
};
