<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('package_attributes')) {
            Schema::create('package_attributes', function (Blueprint $table) {
                $table->id();
                $table->string('type');
                $table->string('name');
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('status')->default(true);
                $table->timestamps();
                $table->softDeletes();

                $table->index(['status', 'type', 'sort_order']);
            });
        }

        if (!Schema::hasTable('package_attribute_package')) {
            Schema::create('package_attribute_package', function (Blueprint $table) {
                $table->id();
                $table->foreignId('package_attribute_id')
                    ->constrained('package_attributes')
                    ->cascadeOnDelete();
                $table->foreignId('package_id')
                    ->constrained('packages')
                    ->cascadeOnDelete();
                $table->timestamps();

                $table->unique(['package_attribute_id', 'package_id']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('package_attribute_package');
        Schema::dropIfExists('package_attributes');
    }
};
