<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandingSetting extends Model
{
    protected $fillable = [
        'hero_badge',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'whatsapp_number',
        'whatsapp_text',
        'rating_text',
        'rating_subtext',
        'marquee_items',
    ];

    protected $casts = [
        'marquee_items' => 'array',
    ];
}
