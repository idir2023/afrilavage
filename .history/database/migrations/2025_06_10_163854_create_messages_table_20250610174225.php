<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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

}}