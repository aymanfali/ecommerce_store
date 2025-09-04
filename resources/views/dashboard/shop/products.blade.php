<div>
    <h1>prodcuts list</h1>
    <table>
        <thead>
            <th>name</th>
            <th>price</th>
            <th>image</th>
            <th>crated at</th>
            <th>actions</th>
        </thead>
        <tbody>
            @unless (count($products))
                <div class="col-12 text-center my-5">
                    <h4>No products currently available</h4>
                </div>
            @else
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td><img src={{ $product->image }} alt={{ $product->name }} style="width:100px; height:100px;"></td>
                        <td>{{ $product->created_at }}</td>
                        <td><a href="{{ route('products.edit', $product->id) }}">Edit</a></td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline-block;"
                                onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
