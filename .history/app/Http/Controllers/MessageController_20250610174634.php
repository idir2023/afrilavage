<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }


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

}
