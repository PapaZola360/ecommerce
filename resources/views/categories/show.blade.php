<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @include('partials.tailwind-css')
</head>

<div class="container mx-auto">
    <div class="bg-white shadow rounded-lg p-4">
        <img class="w-full h-48 object-cover rounded" src="{{$category->image_url}}" alt="{{$category->name}}">
        <h5 class="text-lg font-bold">{{$category->name}}</h5>
        <p class="text-gray-700">{{ $category->desctipion }}</p>
        <a href="{{route('categories.index')}}">View All Categories</a>
    </div>
    </div>