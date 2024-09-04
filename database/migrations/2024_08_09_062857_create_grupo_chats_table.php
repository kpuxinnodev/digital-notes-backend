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
        Schema::create('grupo_chats', function (Blueprint $table) {
            $table->bigInteger('idgrupos')->unsigned();
            $table->bigInteger('idchats')->unsigned();

            $table->foreign('idgrupos')->references('id')->on('grupos');
            $table->foreign('idchats')->references('id')->on('chats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_chats');
    }
};
