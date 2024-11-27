<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('agendamento', function (Blueprint $table) {
            $table->unsignedBigInteger('procedimento_id')->after('dentista_id')->nullable();
            $table->foreign('procedimento_id')->references('id')->on('procedimentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agendamento', function (Blueprint $table) {
            $table->dropForeign(['procedimento_id']);
            $table->dropColumn('procedimento_id');
        });
    }
};
