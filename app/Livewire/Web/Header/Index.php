<?php

namespace App\Livewire\Web\Header;

use App\Models\AboutUs;
use App\Models\Menu;
use Database\Seeders\About;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $menus = Menu::active()->get();
        return view('livewire.web.header.index', compact('menus'));
    }
}
