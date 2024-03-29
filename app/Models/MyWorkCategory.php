<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyWorkCategory extends Model
{
    use HasFactory;
    protected $table = "my_work_categories";
    protected $fillable = [
        'name'
        ,'status'
    ];

    public function my_works()
    {
        return $this->hasMany(MyWork::class,'category_id');
    }
}
