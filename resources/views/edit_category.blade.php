<!-- resources/views/edit-category.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/edit-category.css') }}" type="text/css">
    <title>Edit category</title>
</head>

<body>
    <div class="container">
        <h1>Edit category</h1>
        @include('nav_bar')

        <form class="category-form" action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">category Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary btn-update">Update category</button>
        </form>
    </div>
</body>

</html>
