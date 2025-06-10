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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};

// database/migrations/2025_06_10_000000_create_messages_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('name');                                    // Nom complet
            $table->string('email');                                   // Email
            $table->string('phone')->nullable();                       // Téléphone (optionnel)
            $table->enum('subject', [                                  
                'service-information',
                'order-question',
                'price-quote',
                'feedback',
                'complaint',
                'partnership',
                'other'
            ]);                                                        // Sujet
            $table->text('message');                                   // Corps du message
            $table->boolean('privacy')->default(true);                 // Consentement RGPD
            $table->timestamps();                                      // created_at / updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
}

