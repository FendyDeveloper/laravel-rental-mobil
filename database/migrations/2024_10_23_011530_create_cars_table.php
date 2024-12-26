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
        Schema::create('cars', function (Blueprint $table) {
            $table->id('id_car');
            $table->string('license_plate', 10)->unique(); // Nopol
            $table->string('brand', 50);         // Brand
            $table->string('type', 50);          // Type
            $table->year('year');           // Tahun
            $table->decimal('price', 10, 2); // Harga
            $table->string('image')->nullable(); // Image
            $table->enum('status', ['available', 'unavailable'])->default('available'); // Status
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
