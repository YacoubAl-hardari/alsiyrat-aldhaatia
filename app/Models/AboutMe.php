<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;
    protected $table = "aboutmes";
    protected $fillable = [
        'section_title'
        ,'name'
        ,'description'
        ,'download_cv'
        ,'info'
    ];
}
