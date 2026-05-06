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
        Schema::create('user_temps', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 80);
            $table->string('last_name', 80)->nullable();
            $table->string('email', 191)->index();
            $table->string('phone', 20)->index();
            $table->string('password');
            $table->string('otp', 6);
            $table->timestamp('otp_expires_at');
            $table->timestamp('verified_at')->nullable();
            $table->unsignedSmallInteger('attempt_count')->default(0);
            $table->timestamp('last_otp_sent_at')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
            $table->index(['email', 'otp']);
            $table->index(['phone', 'otp']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_temps');
    }
};
