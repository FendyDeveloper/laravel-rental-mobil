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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id('id_transaction'); // Transaction ID as primary key
            $table->string('nik'); // Foreign key referencing members
            $table->string('license_plate', 10); // Foreign key referencing cars
            $table->date('booking_date'); // Booking date
            $table->date('pickup_date'); // Pickup date
            $table->date('return_date')->nullable(); // Return date
            $table->tinyInteger('driver')->default(0); // Driver status
            $table->decimal('total', 10, 2); // Total amount
            $table->decimal('downpayment', 10, 2); // Downpayment amount
            $table->decimal('balance_due', 10, 2); // Remaining balance
            $table->enum('status', ['booking', 'approved', 'picked_up', 'returned'])->default('booking'); // Transaction status
            $table->foreign('nik')->references('nik')->on('users')->onDelete('cascade'); // Foreign key to members table
            $table->foreign('license_plate')->references('license_plate')->on('cars')->onDelete('cascade'); // Foreign key to cars table
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
