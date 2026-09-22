<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();

            $table->foreignId('property_id')
                ->constrained('properties')
                ->cascadeOnDelete();

            $table->string('unit_number');
            $table->string('unit_type');
            $table->string('floor')->nullable();

            $table->decimal('area', 10, 2)->nullable();
            $table->decimal('monthly_rent', 12, 2);

            $table->enum('status', [
                'available',
                'rented',
                'maintenance'
            ])->default('available');

            $table->text('description')->nullable();

            $table->timestamps();

            $table->unique([
                'property_id',
                'unit_number'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};