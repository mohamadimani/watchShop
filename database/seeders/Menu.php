<?php

namespace Database\Seeders;

use App\Models\Menu as ModelsMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Menu extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        if (ModelsMenu::first()) {
            return false;
        }

        ModelsMenu::create([
            'title' => 'صفحه اصلی',
            'link' => '/',
            'icon' => 'fa fa-home',
            'is_active' => true,
            'created_by' => '1',
        ]);
    }
}
