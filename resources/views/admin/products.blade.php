@extends('admin.dashboard')
@section('content')
    <h1>Products</h1>
    @php
        $products = \App\Models\Product::all();
    @endphp
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
