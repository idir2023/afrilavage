<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'category' => 'pressing',
                'title' => 'Pressing Standard',
                'description' => 'Un service de nettoyage professionnel pour tous vos vêtements du quotidien avec livraison en 48h.',
                'features' => json_encode([
                    'Nettoyage et repassage soignés',
                    'Traitement des taches légères',
                    'Emballage protecteur',
                    'Livraison sous 48h'
                ]),
                'price' => 50,
                'unit' => '5 vêtements',
                'badge' => 'Populaire',
                'icon' => 'fas fa-tshirt',
                'route' => 'standard',
            ],
            [
                'category' => 'pressing express',
                'title' => 'Pressing Express',
                'description' => 'Service prioritaire avec traitement accéléré et livraison en 24h pour les besoins urgents.',
                'features' => json_encode([
                    'Traitement prioritaire',
                    'Nettoyage et repassage premium',
                    'Traitement anti-taches avancé',
                    'Livraison sous 24h'
                ]),
                'price' => 80,
                'unit' => '5 vêtements',
                'badge' => 'Express',
                'icon' => 'fas fa-bolt',
                'route' => 'express',
            ],
            [
                'category' => 'pressing premium',
                'title' => 'Pressing Luxe',
                'description' => 'Service haut de gamme pour vos vêtements délicats et de luxe avec traitement personnalisé.',
                'features' => json_encode([
                    'Traitement textile délicat',
                    'Repassage à la main',
                    'Protection anti-UV et anti-mites',
                    'Emballage premium et parfumé'
                ]),
                'price' => 120,
                'unit' => '5 vêtements',
                'badge' => 'Premium',
                'icon' => 'fas fa-gem',
                'route' => 'luxe',
            ],
            [
                'category' => 'car',
                'title' => 'Lavage Auto Extérieur',
                'description' => 'Nettoyage complet de l\'extérieur de votre véhicule avec produits professionnels.',
                'features' => json_encode([
                    'Lavage carrosserie haute pression',
                    'Nettoyage des jantes et pneus',
                    'Séchage à la microfibre',
                    'Nettoyage des vitres'
                ]),
                'price' => 80,
                'unit' => 'véhicule',
                'badge' => null,
                'icon' => 'fas fa-car',
                'route' => 'car-exterior',
            ],
            [
                'category' => 'car',
                'title' => 'Lavage Auto Intérieur',
                'description' => 'Nettoyage profond de l\'intérieur de votre véhicule pour un habitacle comme neuf.',
                'features' => json_encode([
                    'Aspiration complète',
                    'Nettoyage tableau de bord et plastiques',
                    'Traitement des sièges et tissus',
                    'Désodorisation de l\'habitacle'
                ]),
                'price' => 100,
                'unit' => 'véhicule',
                'badge' => null,
                'icon' => 'fas fa-car-side',
                'route' => 'car-interior',
            ],
            [
                'category' => 'car premium',
                'title' => 'Lavage Auto Complet',
                'description' => 'Combinaison des services extérieur et intérieur pour un nettoyage intégral de votre véhicule.',
                'features' => json_encode([
                    'Tous les services extérieur et intérieur',
                    'Traitement céramique (protection)',
                    'Lustrage et polissage carrosserie',
                    'Traitement cuir et plastiques premium'
                ]),
                'price' => 150,
                'unit' => 'véhicule',
                'badge' => 'Premium',
                'icon' => 'fas fa-car-alt',
                'route' => 'car-complete',
            ],
            [
                'category' => 'pack',
                'title' => 'Pack Famille',
                'description' => 'Solution économique pour les familles avec une grande quantité de vêtements.',
                'features' => json_encode([
                    'Pressing standard pour 15 vêtements',
                    'Traitement spécial taches enfants',
                    'Service de raccommodage basique',
                    'Livraison gratuite'
                ]),
                'price' => 150,
                'unit' => 'pack',
                'badge' => 'Économique',
                'icon' => 'fas fa-box',
                'route' => 'pack-family',
            ],
            [
                'category' => 'pack premium express',
                'title' => 'Pack Premium All-In',
                'description' => 'Notre service le plus complet combinant pressing et lavage auto avec traitement premium.',
                'features' => json_encode([
                    'Pressing Luxe pour 10 vêtements',
                    'Lavage Auto Complet',
                    'Service prioritaire express',
                    'Livraison VIP programmée'
                ]),
                'price' => 250,
                'unit' => 'pack',
                'badge' => 'Tout inclus',
                'icon' => 'fas fa-crown',
                'route' => 'pack-premium',
            ],
        ];

        foreach ($services as $service) {
            DB::table('services')->insert([
                'category' => $service['category'],
                'title' => $service['title'],
                'description' => $service['description'],
                'features' => $service['features'],
                'price' => $service['price'],
                'unit' => $service['unit'],
                'badge' => $service['badge'],
                'icon' => $service['icon'],
                'route' => $service['route'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
