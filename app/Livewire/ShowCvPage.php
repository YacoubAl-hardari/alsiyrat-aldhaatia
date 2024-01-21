<?php

namespace App\Livewire;

use App\Models\Header;
use App\Models\MyWork;
use App\Models\Review;
use App\Models\AboutMe;
use App\Models\Counter;
use Livewire\Component;
use App\Models\ContactMe;
use App\Models\ClientLogo;
use App\Models\MyWorkCategory;
use App\Models\EducationAndSkill;

class ShowCvPage extends Component
{
    public function render()
    {
        // create empty array for store all the models in it.
        $data =[];
        $data["Header"] = Header::first();
        $data["AboutMe"] = AboutMe::first();
        $data["EducationAndSkill"] = EducationAndSkill::first();
        $data["Counter"] = Counter::latest()->take(3)->get();
        $data["Review"] = Review::latest()->get();
        $data["MyWorkCategory"] = MyWorkCategory::latest()->has('my_works')->get();
        $data["MyWork"] = MyWork::latest()->with('categories')->get();
        $data["ClientLogo"] = ClientLogo::latest()->where('status',true)->get();
        $data["ContactMe"] = ContactMe::first();
        return view('livewire.show-cv-page',$data);
    }
}
