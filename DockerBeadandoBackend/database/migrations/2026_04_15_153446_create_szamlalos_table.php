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
        Schema::create('szamlalos', function (Blueprint $table) {
            $table->id();
            $table->string('nev');
            $table->integer('ertek_a')->default(0);
            $table->integer('ertek_b')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('szamlalos');
    }
};
