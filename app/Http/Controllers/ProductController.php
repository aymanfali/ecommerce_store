<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'min:5'],
                'price' => ['required', 'numeric'],
                'description' => ['required', 'string', 'min:5'],
                'image' => ['nullable', 'image'],
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

    public function edit(Product $product)
    {
        return view('dashboard.shop.edit-product', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5'],
            'price' => ['required', 'numeric'],
            'description' => ['required', 'string', 'min:5'],
            'image' => ['nullable', 'image'],
        ]);

        $data = $request->only(['name', 'price', 'description']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $data['image'] = $path;
        }

        $product->update($data);

        Log::info('Admin updated a product price', [
            'user' => Auth::user()->name,
            'product_id' => $product->id,
            'new_price' => $request->price
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully!');
    }
}
