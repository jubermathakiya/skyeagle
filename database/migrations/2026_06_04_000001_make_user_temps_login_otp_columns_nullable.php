<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_temps', function (Blueprint $table) {
            $table->string('first_name', 80)->nullable()->change();
            $table->string('email', 191)->nullable()->change();
            $table->string('phone', 20)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('user_temps', function (Blueprint $table) {
            $table->string('first_name', 80)->nullable(false)->change();
            $table->string('email', 191)->nullable(false)->change();
            $table->string('phone', 20)->nullable(false)->change();
        });
    }
};
