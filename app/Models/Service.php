<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'icon',
        'icon_bg_color',
        'icon_text_color',
        'title',
        'description',
        'order',
    ];
}
