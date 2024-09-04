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
        Schema::create('generas', function (Blueprint $table) {
            $table->bigInteger('idnotas')->unsigned();
            $table->bigInteger('idusuario')->unsigned();

            $table->foreign('idnotas')->references('id')->on('notas');
            $table->foreign('idusuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generas');
    }
};
