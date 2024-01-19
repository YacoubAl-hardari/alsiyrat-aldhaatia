<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContacForm extends Model
{
    use HasFactory;
    protected $table = "contac_forms";
    protected $fillable = [
        'name'
        ,'email'
        ,'message'
    ];
}
