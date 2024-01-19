<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientLogo extends Model
{
    use HasFactory;
    protected $table = "client_logos";
    protected $fillable = [
        'image'
       , 'url'
       , 'name'
       , 'status'
    ];
}
