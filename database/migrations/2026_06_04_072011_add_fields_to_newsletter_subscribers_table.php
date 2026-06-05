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
        Schema::table('newsletter_subscribers', function (Blueprint $table) {
            $table->enum('status', ['ACTIVE','UNSUBSCRIBED','BLOCKED'
            ])->default('ACTIVE')->after('email');
            $table->string('source', 50)->default('website')->after('status');
            $table->timestamp('subscribed_at')->nullable()->after('source');
            $table->timestamp('unsubscribed_at')->nullable()->after('subscribed_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('newsletter_subscribers', function (Blueprint $table) {
            $table->dropColumn(['status', 'source', 'subscribed_at', 'unsubscribed_at']);
        });
    }
};
