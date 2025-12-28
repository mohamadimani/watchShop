<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        $brands =  Brand::active()->get();
        $categories = Category::active()->get();
        $colors = Color::active()->get();
        return view('admin.products.create', compact('brands', 'categories', 'colors'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'count' => $request->count ?? 0,
            'is_active' => true,
            'guaranty' => $request->guaranty,
            'brand_id' => $request->brand_id ?? 0,
            'created_by' => user()->id,
            'is_economy' => $request->is_economy == 'yes' ? true : false,
        ]);

        if ($product) {
            $product->colors()->attach($request->colors);
            return redirect()->back()->withSuccess('با موفقیت ثبت شد');
        }
        return redirect()->back()->withError('مشکل در ثبت');
    }

    public function edit(Product $product)
    {
        $brands = Brand::active()->get();
        $categories = Category::active()->get();
        $colors = Color::active()->get();
        return view('admin.products.edit', compact('brands', 'categories', 'product', 'colors'));
    }

    public function update(Request $request, Product $product)
    {
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->count = $request->count;
        $product->guaranty = $request->guaranty;
        $product->brand_id = $request->brand_id ?? 0;
        $product->active_by = user()->id;
        $product->is_economy = $request->is_economy == 'yes' ? true : false;
        if ($product->save()) {
            if ($request->colors) {
                $product->colors()->sync($request->colors);
            }
            return redirect()->back()->withSuccess('با موفقیت ثبت شد');
        }
        return redirect()->back()->withError('مشکل در ثبت');
    }

    public function galleryIndex(Product $product)
    {
        return view('admin.products.gallery-index', compact('product'));
    }

    public function galleryStore(Request $request, Product $product)
    {
        $imageName = null;
        $imageName = SaveImage($request->image, 'products/gallery');

        $productGallery = ProductGallery::create([
            'product_id' => $product->id,
            'title' => $request->title,
            'image' => $imageName,
            'created_by' => user()->id,
        ]);

        if ($productGallery) {
            return redirect()->back()->withSuccess('با موفقیت ثبت شد');
        }
        return redirect()->back()->withError('مشکل در ثبت');
    }
}
