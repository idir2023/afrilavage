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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('driver_id')->nullable()->constrained('users')->onDelete('set null');

            // Service principal (pressing, car, pack)
            $table->enum('service_category', ['pressing', 'car', 'pack']);

            // Type de service spécifique
            $table->enum('service_type', [
                // Pressing
                'pressing_standard',
                'pressing_express',
                'pressing_luxe',
                // Car
                'car_exterior',
                'car_interior',
                'car_complete',
                // Pack
                'pack_family',
                'pack_premium',
                'pack_business'
            ]);

            $table->enum('status', [
                'pending',
                'confirmed',
                'collected',
                'in_progress',
                'ready',
                'delivered',
                'completed',
                'cancelled'
            ])->default('pending');

            // Informations client
            $table->string('fullname');
            $table->string('phone');
            $table->text('address');
            $table->string('city');
            $table->string('zip');
            $table->text('delivery_instructions')->nullable();

            // Programmation
            $table->date('scheduled_date');
            $table->string('time_slot', 50);

            // Détails spécifiques selon le service
            $table->json('items')->nullable(); // Pour pressing: articles et quantités
            $table->json('service_options')->nullable(); // Options supplémentaires (céramique, etc.)
            $table->text('special_instructions')->nullable();

            // Détails voiture (si applicable)
            $table->string('car_type')->nullable(); // city-car, sedan, suv, etc.
            $table->string('car_model')->nullable();

            // Détails pack (si applicable)
            $table->string('pack_people')->nullable(); // 1-2, 3-4, 5+
            $table->enum('pack_frequency', ['once', 'weekly', 'biweekly', 'monthly'])->nullable();

            // Pricing
            $table->decimal('base_price', 10, 2);
            $table->decimal('options_price', 10, 2)->default(0);
            $table->decimal('discount_amount', 10, 2)->default(0);
            $table->decimal('total_price', 10, 2);
            $table->string('promo_code')->nullable();

            // Paiement
            $table->enum('payment_method', ['card', 'cash', 'mobile']);
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');

            // Timestamps
            $table->timestamp('collected_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            // Index pour les requêtes fréquentes
            $table->index(['user_id']);
            $table->index(['status']);
            $table->index(['service_category']);
            $table->index(['service_type']);
            $table->index(['scheduled_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
