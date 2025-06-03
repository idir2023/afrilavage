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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users')->onDelete('cascade');
            $table->string('license_number', 50)->unique();
            $table->string('vehicle_type')->nullable();
            $table->boolean('is_available')->default(true);
            $table->enum('current_neighborhood', ['anfa', 'oulfa', 'maarif', 'centre_ville', 'ain_diab'])->nullable();
            $table->decimal('rating', 3, 2)->default(0.00);
            $table->integer('total_deliveries')->default(0);
            $table->timestamps();

            $table->index(['is_available']);
            $table->index(['current_neighborhood']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
