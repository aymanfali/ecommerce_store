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
                        <td></td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
