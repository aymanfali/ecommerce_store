<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('admin.products') }}">Products</a></li>
            <li><a href="{{ route('admin.categories') }}">Categories</a></li>
        </ul>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>
