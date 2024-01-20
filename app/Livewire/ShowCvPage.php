<?php

namespace App\Livewire;

use App\Models\Header;
use App\Models\AboutMe;
use Livewire\Component;

class ShowCvPage extends Component
{
    public function render()
    {
        $data =[];
        $data["Header"] = Header::first();
        $data["AboutMe"] = AboutMe::first();
        return view('livewire.show-cv-page',$data);
    }
}
