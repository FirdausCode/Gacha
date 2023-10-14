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
        Schema::create('hadiahs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable;
            $table->string('img');
            $table->unsignedBigInteger('wilayah_id')->nullable();
            $table->timestamps();
    
            $table->foreign('wilayah_id')->references('id')->on('wilayahs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hadiahs');
    }
};
