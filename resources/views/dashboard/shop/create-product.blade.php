<div>
    <form action="{{ route('product.store') }}" method="post"  enctype="multipart/form-data">
        @csrf
        <div class="">
            <label for="name">Product name: </label>
            <input type="text" name="name" placeholder="name">
        </div>
        <div class="">
            <label for="image">Product image: </label>
            <input type="file" name="image">
        </div>
        <div class="">
            <label for="price">Product price: </label>
            <input type="text" name="price" placeholder="price">
        </div>
        <div class="">
            <label for="description">Product description: </label>
            <textarea name="description" placeholder="product description" cols="30" rows="10"></textarea>
        </div>

        <button type="submit" name="submit">Save</button>
    </form>
</div>
