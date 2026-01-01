<?php

namespace App\Livewire\Web\Footer;

use App\Models\AboutUs;
use App\Models\Menu;
use App\Models\Social;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {

        $aboutUs = AboutUs::first();
        $socials = Social::active()->get();
        return view('livewire.web.footer.index', compact('aboutUs', 'socials'));
    }
}
