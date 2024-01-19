<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationAndSkill extends Model
{
    use HasFactory;
    protected $table = "education_and_skills";
    protected $fillable = [
        ,'section_title'
        ,'skills'
        ,'educations'
        ,'skill_and_tools'
    ];
}
