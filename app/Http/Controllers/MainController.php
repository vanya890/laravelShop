<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        $categories = Category::get();
        return view('index', compact('categories'));
    }
    public function categories() {
        $categories = Category::get();
        return view('categories', compact('categories'));
    }
    public function category($code) {
        $category = Category::where('code', $code)->first();
        $products = Product::where('category_id',$category->id)->get();
        return view('category', compact('category', 'products'));
    }
    public function product($categoryCode, $productCode) {
        $product = Product::where('code',$productCode)->first();
        $category = Category::where('code', $categoryCode)->first();
        return view('product', compact('product', 'category'));
    }
    public function sbros() {
        session()->flush();
        return redirect()->route('index');
    }



}
