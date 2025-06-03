<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'driver_id',

        'service_category',
        'service_type',
        'status',

        // Informations client
        'fullname',
        'phone',
        'address',
        'city',
        'zip',
        'delivery_instructions',

        // Programmation
        'scheduled_date',
        'time_slot',

        // Détails service
        'items',
        'service_options',
        'special_instructions',

        // Détails voiture
        'car_type',
        'car_model',

        // Détails pack
        'pack_people',
        'pack_frequency',

        // Tarification
        'base_price',
        'options_price',
        'discount_amount',
        'total_price',
        'promo_code',

        // Paiement
        'payment_method',
        'payment_status',

        // Dates clés
        'collected_at',
        'completed_at',
    ];


    protected $casts = [
        'items' => 'array',
        'scheduled_date' => 'date',
        'collected_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id');
    }
}
