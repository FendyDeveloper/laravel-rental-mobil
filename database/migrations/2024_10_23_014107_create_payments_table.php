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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('id_payment'); // Payment ID as primary key
            $table->unsignedBigInteger('id_return'); // Foreign key referencing returns
            $table->date('payment_date'); // Payment date
            $table->decimal('total_payment', 10, 2); // Total payment amount
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid'); // Payment status
            $table->foreign('id_return')->references('id_return')->on('returns')->onDelete('cascade'); // Foreign key to returns table
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
