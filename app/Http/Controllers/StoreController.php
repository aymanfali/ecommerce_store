<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $products = [
            [
                'name' => 'SmartPhone',
                'image' => 'assets/img/product-3.png',
                'price' => 34.99,
                'old_price' => 45.11,
                'on_sale' => true,
                'description' => 'SmartPhone with modern features and sleek design.',
            ],
            [
                'name' => 'Smart Camera',
                'image' => 'assets/img/product-4.png',
                'price' => 34.99,
                'old_price' => 46.11,
                'on_sale' => false,
                'description' => 'Smart Camera for high-quality photography.',
            ],
            [
                'name' => 'Camera Leance',
                'image' => 'assets/img/product-5.png',
                'price' => 45.99,
                'old_price' => 44.11,
                'on_sale' => true,
                'description' => 'Camera lens accessory for better zoom and clarity.',
            ],
        ];

        return view('shop.products', compact('products'));
    }

    public function about()
    {

        $aboutUs = [
            'title' => 'About Shoppatty',
            'description' => 'Shoppatty is a trusted platform offering high-quality electrical products at affordable prices. Our mission is to bring comfort, innovation, and energy efficiency to every home.',
            'rawHtml' => '<p><strong>Why Choose Us?</strong></p>
                  <ul>
                      <li>Wide range of electrical products</li>
                      <li>Affordable prices and frequent discounts</li>
                      <li>Trusted by thousands of customers</li>
                      <li>Fast and reliable delivery</li>
                  </ul>',
        ];

        return view('shop.about-us', compact('aboutUs'));
    }

    public function productDetails()
    {
        $productDetails = [
            'name' => 'SmartPhone',
            'image' => 'assets/img/product-3.png',
            'price' => 2.99,
            'old_price' => 4.11,
            'on_sale' => true,
            'description' => 'SmartPhone with modern features and sleek design.',
        ];

        return view('shop.product-details', compact('productDetails'));
    }

    public function cart()
    {
        return view('shop.cart');
    }

    public function contact()
    {
        return view('shop.contact');
    }
}
