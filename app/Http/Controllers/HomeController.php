<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Feedback;
use App\Models\Menu;
use App\Models\Service;
use App\Models\Social;

class HomeController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();
        $services = Service::active()->orderBy('id', 'DESC')->get();
        $menus = Menu::active()->get();
        $socials = Social::active()->get();
        $feedbacks = Feedback::active()->get();
        return view('home.index', compact('services', 'about', 'menus', 'socials', 'feedbacks'));
    }
}
