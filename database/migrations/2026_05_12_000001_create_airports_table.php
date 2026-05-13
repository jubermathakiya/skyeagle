<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->id();
            $table->string('iata_code', 3)->unique();
            $table->string('icao_code', 4)->nullable();
            $table->string('name',150);
            $table->string('city',100);
            $table->string('country',100);
            $table->string('timezone')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['city', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('airports');
    }
};
