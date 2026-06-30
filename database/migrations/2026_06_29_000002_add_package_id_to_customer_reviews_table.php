<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('customer_reviews') || Schema::hasColumn('customer_reviews', 'package_id')) {
            return;
        }

        Schema::table('customer_reviews', function (Blueprint $table) {
            $table->foreignId('package_id')
                ->nullable()
                ->after('id')
                ->constrained('packages')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('customer_reviews') || ! Schema::hasColumn('customer_reviews', 'package_id')) {
            return;
        }

        Schema::table('customer_reviews', function (Blueprint $table) {
            $table->dropConstrainedForeignId('package_id');
        });
    }
};
