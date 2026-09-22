<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('contract_id')
                ->constrained('contracts')
                ->restrictOnDelete();

            $table->decimal('amount', 12, 2);

            $table->date('due_date');
            $table->date('payment_date')->nullable();

            $table->enum('status', [
                'pending',
                'paid',
                'overdue',
                'partial'
            ])->default('pending');

            $table->string('payment_method')->nullable();

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};