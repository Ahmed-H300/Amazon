<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/category.css') }}" type="text/css">
    <title>{{ $category->name }}</title>
</head>

<body>
    <h1>Amazon</h1>
    @include('nav_bar')
    <div class="category-details">
        <h2>{{ $category->name }}</h2>
        <p>Created At: {{ $category->created_at->format('F j  Y H:i:s') }}</p>
        <p>Updated At: {{ $category->updated_at->format('F j  Y H:i:s') }}</p>
        <h3>Products in {{ $category->name }} category:</h3>
        <ul>
            @foreach($category->products as $product)
                <li><a class="category-link" href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="product-list">
    </div>
</body>

</html>
