<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->dropForeignIfExists('enquiries', 'enquiries_tour_details_id_foreign');

        Schema::table('enquiries', function (Blueprint $table) {
            $table->unsignedBigInteger('tour_details_id')->nullable()->change();
        });

        if (Schema::hasTable('tour_details')) {
            Schema::table('enquiries', function (Blueprint $table) {
                $table->foreign('tour_details_id')
                    ->references('id')
                    ->on('tour_details')
                    ->nullOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $this->dropForeignIfExists('enquiries', 'enquiries_tour_details_id_foreign');

        Schema::table('enquiries', function (Blueprint $table) {
            $table->unsignedBigInteger('tour_details_id')->nullable(false)->change();
        });

        if (Schema::hasTable('tour_details')) {
            Schema::table('enquiries', function (Blueprint $table) {
                $table->foreign('tour_details_id')
                    ->references('id')
                    ->on('tour_details')
                    ->cascadeOnDelete();
            });
        }
    }

    private function dropForeignIfExists(string $table, string $constraint): void
    {
        $database = DB::getDatabaseName();

        $exists = DB::table('information_schema.TABLE_CONSTRAINTS')
            ->where('CONSTRAINT_SCHEMA', $database)
            ->where('TABLE_NAME', $table)
            ->where('CONSTRAINT_NAME', $constraint)
            ->where('CONSTRAINT_TYPE', 'FOREIGN KEY')
            ->exists();

        if ($exists) {
            DB::statement("ALTER TABLE `{$table}` DROP FOREIGN KEY `{$constraint}`");
        }
    }
};
