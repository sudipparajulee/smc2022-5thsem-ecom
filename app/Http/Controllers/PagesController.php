<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        $latestproducts = Product::latest()->limit(4)->get();
        return view('welcome',compact('latestproducts'));
    }

    public function categoryprouducts($catid)
    {
        $category = Category::find($catid);
        $products = Product::where('category_id', $catid)->get();
        return view('categoryproduct', compact('products', 'category'));
    }
}
