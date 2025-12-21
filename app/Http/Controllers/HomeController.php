<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Feedback;
use App\Models\Menu;
use App\Models\Service;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

    public function contactUs()
    {
        return view('contactUs.index');
    }

    public function contactUsStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'mobile' => 'required|string|min:11',
            'message' => 'required|string|min:5',
        ]);
       $res =  ContactUs::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'message' => $request->message,
        ]);
        if($res){
            return Redirect()->route('contact-us.index')->with('success', 'با موفقیت ثبت شد');
        }
        return Redirect()->route('contact-us.index')->with('error', 'مشکل در ثبت');
    }
}
