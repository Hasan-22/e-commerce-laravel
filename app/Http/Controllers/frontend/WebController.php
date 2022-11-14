<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $popularProducts = Product::where('popular', '1')->take(6)->get();
        $carouselProducts = Product::latest()->take(3)->get();
        $popularCategories = Category::latest()->where('popular', '1')->take(3)->get();
        return view('frontend.index', compact('popularProducts', 'carouselProducts', 'popularCategories'));
    }

    public function showCategories()
    {
        $categories = Category::where('status', '1')->get();
        return view('frontend.categories', compact('categories'));
    }
}