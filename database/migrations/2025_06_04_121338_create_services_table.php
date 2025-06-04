 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');                 // Nom du service (affiché)
            $table->string('route')->unique();       // Slug pour l'URL (ex: car-complete)
            $table->string('category')->nullable();  // Catégorie (ex: pressing, car, pack)
            $table->string('icon')->nullable();      // Icône FontAwesome (ex: fas fa-car)
            $table->string('badge')->nullable();     // Badge (ex: Premium, Populaire)
            $table->text('description')->nullable(); // Description du service
            $table->json('features')->nullable();    // Liste des fonctionnalités (JSON)
            $table->decimal('price', 8, 2);          // Prix (ex: 150.00)
            $table->string('unit')->nullable();      // Unité (ex: véhicule, 5 vêtements)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}
