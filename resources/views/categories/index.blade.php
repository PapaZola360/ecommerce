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
    <h1>Categories</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($categories as $category)
        <div class="bg-white shadow rounded-lg p-4 flex flex-col items-center">
            <img class="w-full h-48 object-cover rounded" src="{{$category->image_url}}" alt="{{$category->name}}">
            <h5 class="text-lg font-bold">{{$category->name}}</h5>
            <p class="text-gray-700">{{ $category->desctipion }}</p>
            <a href="{{route('categories.show', $category->id)}}">View Category</a>
            @if(Auth::check() && Auth::user()->is_admin)
            <a href="{{route('admin.categories.edit', $category->id)}}">Edit Category</a>
            <form action="{{ route('admin.categories.destroy', $category->id)}}" method="POST" >
                @csrf
                @method('DELETE')
                <button type="submit">Delete Category</button>
            </form>
            @endif
        </div>
    @endforeach
    </div>
</div>
