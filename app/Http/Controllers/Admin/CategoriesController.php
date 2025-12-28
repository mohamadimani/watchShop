<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create([
            'title' => $request->title,
        ]);
        if ($category) {
            return redirect()->back()->withMessage('با موفقیت ثبت شد');
        }
        return redirect()->back()->withErrors('مشکل در ثبت');
    }
}
