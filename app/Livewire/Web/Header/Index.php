<?php

namespace App\Livewire\Web\Header;

use App\Models\Menu;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $menus = Menu::active()->get();
        return view('livewire.web.header.index', compact('menus'));
    }
}
