<?php

namespace App\Models;

use App\Models\MyWorkCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyWork extends Model
{
    use HasFactory;
    protected $table = "my_works";
    protected $fillable = [
        'category_id'
       , 'title'
       , 'url'
       , 'image'
       , 'status'
    ];

    public function categories()
    {
        return $this->belongsTo(MyWorkCategory::class,'category_id');
    }
}
