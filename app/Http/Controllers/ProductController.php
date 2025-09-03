<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("dashboard.shop.products", compact("products"));
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view("dashboard.shop.product-details", compact("product"));
    }
}
