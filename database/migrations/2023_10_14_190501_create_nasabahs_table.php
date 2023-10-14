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
      Schema::create('nasabahs', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('nameCabang');
        $table->string('cif')->nullable;
        $table->string('wa');
        $table->unsignedBigInteger('hadiah_id')->nullable();
        // $table->unsignedBigInteger('wilayah_id')->nullable();
        $table->timestamps();

        $table->foreign('hadiah_id')->references('id')->on('hadiahs');
        // $table->foreign('wilayah_id')->references('id')->on('wilayahs');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nasabahs');
    }
};
