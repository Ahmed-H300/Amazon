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
    <title>{{ $product->name }}</title>
</head>

<body>
    <h1>Amazon</h1>
    @include('nav_bar')
    <div class="product-details">
        <h2>{{ $product->name }}</h2>
        <p>ID: {{ $product->id }}</p>
        <p>Description: {{ $product->description }}</p>
        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
        <p>Price: ${{ $product->price }}</p>
        <p>Created At: {{ $product->created_at->format('F j  Y H:i:s') }}</p>
        <p>Updated At: {{ $product->updated_at->format('F j  Y H:i:s') }}</p>
        <p>Category:  {{$product->category?$product->category->name :"No category" }}</p>
    </div>
</body>

</html>
