<!-- resources/views/edit-product.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/edit-product.css') }}" type="text/css">
    <title>Edit Product</title>
</head>

<body>
    <div class="container">
        <h1>Edit Product</h1>
        @include('nav_bar')

        <form class="product-form" action="{{ route('products.update', ['product' => $product->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}"
                    required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" required>{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01"
                    value="{{ $product->price }}" required>
            </div>
            <div class="form-element-file">
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" class="form-element" accept="image/*">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-select" name="category_id" aria-label="Default select example">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-update">Update Product</button>
        </form>
    </div>
</body>

</html>
