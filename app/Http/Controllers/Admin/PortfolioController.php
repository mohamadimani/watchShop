<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('admin.portfolio.index');
    }

    public function feedback(Portfolio $portfolio)
    {
        return view('admin.portfolio.feedback', compact('portfolio'));
    }
}
