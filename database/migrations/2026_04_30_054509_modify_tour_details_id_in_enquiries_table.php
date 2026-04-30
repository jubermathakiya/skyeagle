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
        Schema::table('enquiries', function (Blueprint $table) {
            $table->dropForeign(['tour_details_id']);
            $table->unsignedBigInteger('tour_details_id')->nullable()->change();
            $table->foreign('tour_details_id')
                ->references('id')
                ->on('tour_details')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enquiries', function (Blueprint $table) {
            $table->dropForeign(['tour_details_id']);
            $table->unsignedBigInteger('tour_details_id')->nullable(false)->change();
            $table->foreign('tour_details_id')
                ->references('id')
                ->on('tour_details')
                ->cascadeOnDelete();
        });
    }
};
