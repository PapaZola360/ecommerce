
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
    <h1>Create Category</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <form action="{{route('admin.categories.store')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Category Name</label>
                <input type="text" name="name" id="name" class="w-full border rounded p-2">
            </div>
            <div class="mb-4">
                <label for="desctipion" class="block text-gray-700">Description</label>
                <textarea name="desctipion" id="desctipion" class="w-full border rounded p-2"></textarea>
            </div>         
            <div class="mb-4">
                <label for="image_url" class="block text-gray-700">Image URL</label>
                <input type="text" name="image_url" id="image_url" class="w-full border rounded p-2">
            </div>    
            <button type="submit">Create Category</button>
        </form>
    </div>
</div>
