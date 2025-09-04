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

    public function create()
    {
        return view("dashboard.shop.create-product");
    }

    public function store(Request $request){
        $request->validate(
            [
                'name' => ['required', 'string', 'min:5'],
                'price' => ['required', 'numeric'],
                'description' => ['required', 'string', 'min:5'],
                'image' => ['nullable', 'image', 'min:5'],
            ],
            [
                'image.image' => 'image must be image',
            ]
        );
        $path = null;
        $path = $request->file('image')->store('images');

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $path;
        $product->save();

        return redirect()->route('products.index')->with('success', 'product added successfully!');
    }
}
