<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Insertion des utilisateurs
        DB::table('users')->insertOrIgnore([
            [
                'username' => 'Admin Afrilavage',
                'email' => '@afrilavage.maadmin',
                'password' => Hash::make('password'), // remplacer 'password' par le vrai mdp si besoin
                'role' => 'admin',
                'phone' => '+212612345678',
                'address' => 'Casablanca, Maroc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'Client Test',
                'email' => 'client@test.ma',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'phone' => '+212612345679',
                'address' => 'Anfa, Casablanca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insertion d'une commande exemple (user_id 2 correspond au deuxième utilisateur)
        DB::table('orders')->insertOrIgnore([
            [
                'user_id' => 2,
                'service_type' => 'laundry_express',
                'address' => '123 Rue Anfa, Casablanca',
                'time_slot' => '09:00-12:00',
                'scheduled_date' => now()->toDateString(),
                'total_price' => 45.00,
                'payment_method' => 'cash',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Insertion d'une notification exemple
        DB::table('notifications')->insertOrIgnore([
            [
                'user_id' => 2,
                'order_id' => 1,
                'type' => 'order_created',
                'title' => 'Commande créée',
                'message' => 'Votre commande de pressing express a été créée avec succès.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
