<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::with('category')->latest()->paginate(12);

        return view('shop.index', compact('categories', 'products'));
    }

    public function category(Category $category)
    {
        $categories = $category->children()->get();
        $products = $category->products()->latest()->paginate(12);

        $breadcrumbs = $category->ancestors()->push($category);

        return view('shop.category', compact('category', 'categories', 'products', 'breadcrumbs'));
    }


    public function show(Product $product)
    {
        return view('shop.show', compact('product'));
    }
}
