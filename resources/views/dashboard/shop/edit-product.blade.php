<div>
    <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="">
            <label for="name">Product name: </label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="name">
        </div>
        <div class="">
            <label for="image">Product image: </label>
            <input type="file" name="image">
        </div>
        <div class="">
            <label for="price">Product price: </label>
            <input type="text" name="price" value="{{ old('price', $product->price) }}" placeholder="price">
        </div>
        <div class="">
            <label for="description">Product description: </label>
            <textarea name="description" placeholder="product description" cols="30" rows="10">{{ old('description', $product->description) }}</textarea>
        </div>

        <button type="submit" name="submit">Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>

    </form>
</div>
