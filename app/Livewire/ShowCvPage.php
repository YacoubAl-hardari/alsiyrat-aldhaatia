<?php

namespace App\Livewire;

use App\Models\Header;
use App\Models\AboutMe;
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
        return view('livewire.show-cv-page',$data);
    }
}
