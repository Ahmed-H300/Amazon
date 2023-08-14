@php
    use App\Http\Controllers\ProductController;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/product.css') }}" type="text/css">
    <title>Products</title>
</head>

<body>
    <h1>Amazon</h1>
    @include('nav_bar')

    <div class="create-button-container">
        <a class="btn-create" href="{{ route('products.create') }}">Create New Product</a>
    </div>

    <table class="product-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <a class="category-link"
                            href="{{ $product->category ? route('categories.show', $product->category->id) : '#' }}">
                            {{ $product->category ? $product->category->name : 'No Category' }}
                        </a>
                    </td>
                    <td><a class="btn-show" href="{{ route('products.show', ['product' => $product->id]) }}">Show</a>
                    </td>
                    <td><a class="btn-edit" href="{{ route('products.edit', ['product' => $product->id]) }}">Edit</a>
                    </td>
                    <td><a class="btn-delete"
                            href="{{ route('products.delete', ['product' => $product->id]) }}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
