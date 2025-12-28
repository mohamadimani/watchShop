<?php

namespace App\Livewire\Web\Footer;

use App\Models\AboutUs;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {

        $aboutUs = AboutUs::first();
        return view('livewire.web.footer.index', compact('aboutUs'));
    }
}
