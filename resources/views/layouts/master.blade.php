<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="shadow px-20 py-2 flex justify-between items-center">
        <img src="https://smc.edu.np/wp-content/uploads/2023/11/smc-logo-circle-150x150.png" alt="" class="h-20">
        <div class="flex gap-4">
            <a href="/" class="text-gray-600">Home</a>
            @php
                $categories = \App\Models\Category::orderBy('priority')->get();
            @endphp
            @foreach($categories as $category)
             <a href="" class="text-gray-600">{{$category->name}}</a>
            @endforeach
            <a href="{{route('login')}}" class="text-gray-600">Login</a>
        </div>
    </nav>
    @yield('content')
    <footer class="bg-blue-800 text-white text-center py-4 mt-10">
        <p>&copy; 2025 SMC | All Rights Reserved</p>
    </footer>
</body>
</html>
