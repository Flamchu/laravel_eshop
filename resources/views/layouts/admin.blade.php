<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100 text-gray-800">
    <nav class="bg-white shadow px-4 py-2 mb-6">
        <a href="{{ route('admin.categories.index') }}">Kategorie</a> |
        <a href="{{ route('admin.products.index') }}">Produkty</a> |
        <a href="{{ route('dashboard') }}">Domů</a>
    </nav>

    <main class="container mx-auto p-4">
        @yield('content')
    </main>
</body>

</html>