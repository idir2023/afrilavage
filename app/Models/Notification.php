<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    // Si ta table s'appelle 'notifications', cette ligne est optionnelle
    protected $table = 'notifications';

    // Champs autorisés en mass assignment
    protected $fillable = [
        'user_id',
        'order_id',
        'type',
        'title',
        'message',
        'is_read',
    ];

    // Relation vers l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Relation vers la commande (optionnelle)
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
