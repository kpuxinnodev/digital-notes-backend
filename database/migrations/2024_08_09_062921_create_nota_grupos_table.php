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
        Schema::create('nota_grupos', function (Blueprint $table) {
            $table->bigInteger('idgrupos')->unsigned();
            $table->bigInteger('idnotas')->unsigned();

            $table->foreign('idgrupos')->references('id')->on('grupos');
            $table->foreign('idnotas')->references('id')->on('notas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_grupos');
    }
};
