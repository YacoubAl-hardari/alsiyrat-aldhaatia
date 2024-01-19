<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory,HasTranslations;

    public $translatable = ['social_links','color','meta_title','meta_description','meta_keywords'];

    protected $table = "settings";
    
    protected $fillable = [
        'favicon',
        'email',
        'phone',
        'location',
        'footerlogo',
        'social_links',
        'color',
        'maintenance',
        'meta_title','meta_image','meta_keywords','meta_description'
    ];

    protected $casts=[
        'meta_keywords'=>'array',
        'social_links'=>'json',
        'color'=>'json',
    ];
}
