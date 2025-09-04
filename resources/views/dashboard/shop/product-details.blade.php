<div>
    <h1>product details</h1>

    <h3>name</h3>
    <p>{{ $product->name }}</p>
    <h3>price</h3>
    <p>{{ $product->price }}</p>
    <h3>description</h3>
    <p>{!! product->description !!}</p>
    <h3>image</h3>
    <img src={{ $product->image }} alt={{ $product->name }}>
</div>
