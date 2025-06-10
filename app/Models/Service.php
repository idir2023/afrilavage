<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'title',
        'route',
        'category',
        'icon',
        'badge',
        'description',
        'features',
        'price',
        'unit',
    ];

    protected $casts = [
        'features' => 'array', // Le champ JSON sera automatiquement converti en tableau PHP
        'price' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
