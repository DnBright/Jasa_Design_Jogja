<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    protected $fillable = [
        'name',
        'description',
        'original_price',
        'promo_price',
        'features',
        'is_popular',
        'popular_badge',
        'cta_text',
        'cta_link',
        'bg_color',
        'text_color',
        'order',
    ];

    protected $casts = [
        'features' => 'array',
        'is_popular' => 'boolean',
    ];
}
