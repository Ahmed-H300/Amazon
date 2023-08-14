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
    <title>categories</title>
</head>

<body>
    <h1>Amazon</h1>
    @include('nav_bar')

    <div class="create-button-container">
        <a class="btn-create" href="{{ route('categories.create') }}">Create New category</a>
    </div>

    <table class="category-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Added By</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td> {{ $category->user ? $category->user->name : 'No one is recorded' }}</td>
                    <td><a class="btn-show"
                            href="{{ route('categories.show', ['category' => $category->id]) }}">Show</a>
                    </td>
                    @can('edit-category', $category)
                        <td><a class="btn-edit"
                                href="{{ route('categories.edit', ['category' => $category->id]) }}">Edit</a>
                        @else
                        <td>UnAuthorized to Edit</td>
                    @endcan
                    </td>
                    @can('edit-category', $category)
                        <td><a class="btn-delete"
                                href="{{ route('categories.delete', ['category' => $category->id]) }}">Delete</a></td>
                    @else
                        <td>UnAuthorized to Delete</td>
                    @endcan
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
