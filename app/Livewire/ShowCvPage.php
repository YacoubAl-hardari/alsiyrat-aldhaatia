<?php

namespace App\Livewire;

use App\Models\Header;
use App\Models\Review;
use App\Models\AboutMe;
use App\Models\Counter;
use Livewire\Component;
use App\Models\EducationAndSkill;

class ShowCvPage extends Component
{
    public function render()
    {
        $data =[];
        $data["Header"] = Header::first();
        $data["AboutMe"] = AboutMe::first();
        $data["EducationAndSkill"] = EducationAndSkill::first();
        $data["Counter"] = Counter::latest()->take(3)->get();
        $data["Review"] = Review::latest()->get();
        return view('livewire.show-cv-page',$data);
    }
}
