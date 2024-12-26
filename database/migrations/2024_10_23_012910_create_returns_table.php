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
        Schema::create('returns', function (Blueprint $table) {
            $table->id('id_return'); // Return ID as primary key
            $table->unsignedBigInteger('id_transaction'); // Foreign key referencing transactions
            $table->date('return_date'); // Return date
            $table->text('car_condition')->nullable(); // Car condition
            $table->decimal('fine', 10, 2)->default(0); // Fine amount
            $table->foreign('id_transaction')->references('id_transaction')->on('transactions')->onDelete('cascade'); // Foreign key to transactions table
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('returns');
    }
};
