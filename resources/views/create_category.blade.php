<!-- resources/views/create-category.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/create-category.css') }}" type="text/css">
    <title>Create Category</title>
</head>

<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <h1>Create New Category</h1>
        @include('nav_bar')

        <form class="category-form" action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <input type="hidden" name="user_id" value="{{Illuminate\Support\Facades\Auth::id()}}"> --}}
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-create">Create Category</button>
        </form>
    </div>
</body>

</html>
