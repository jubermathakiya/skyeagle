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
        if (!Schema::hasColumn('enquiries', 'tour_details_id')) {
            Schema::table('enquiries', function (Blueprint $table) {
                $table->unsignedBigInteger('tour_details_id')->nullable()->after('id');
            });
        }

        if (Schema::hasTable('tour_details')) {
            try {
                Schema::table('enquiries', function (Blueprint $table) {
                    $table->foreign('tour_details_id')
                        ->references('id')
                        ->on('tour_details')
                        ->cascadeOnDelete();
                });
            } catch (\Throwable $e) {
                // Foreign key may already exist.
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiries', function (Blueprint $table) {
            try {
                $table->dropForeign(['tour_details_id']);
            } catch (\Throwable $e) {
                // Foreign key may not exist in some environments.
            }

            if (Schema::hasColumn('enquiries', 'tour_details_id')) {
                $table->dropColumn('tour_details_id');
            }
        });
    }
};
