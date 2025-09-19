<?php

namespace App\Exceptions;

use Exception;

class ProductNotFoundException extends Exception
{
    public function render($request)
    {
        // Redirect back to products list with error message
        return redirect()->route('products.index')
            ->with('error', 'Product not found.');
    }
}
