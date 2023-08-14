<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <title>contact Us</title>
</head>

<body>
    <h1>Amazon</h1>
    @include('nav_bar')
    <h1>Contact Us</h1>
    <div style="margin: 10px;">
        <p>Phone: 123-456-7890</p>
        <p>Address: 123 Main Street, Somewhere, NY 10001</p>
    </div>
</body>

</html>
