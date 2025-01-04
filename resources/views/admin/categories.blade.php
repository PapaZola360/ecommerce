<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Admin Dashboard
            </h2>
            <nav class="space-x-6 text-white font-lg">
                <a  href="{{ route('admin.products.index')}}">Product</a>
                <a href="{{ route('admin.categories.index')}}">Categories</a>
                <a  href="{{ route('admin.orders.index')}}">Orders</a>
                <a  href="{{ route('admin.users.index')}}">Users</a>
            </nav>
        </div>
        

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4">Manage Categories</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($categories as $category)
                            <div class="shadow rounded-lg p-4 flex flex-col items-center">
                                <img class="w-full h-48 object-cover rounded" src="{{$category->image_url}}" alt="{{$category->name}}">
                                <h5 class="text-lg font-bold">{{$category->name}}</h5>
                                <p >{{ $category->desctipion }}</p>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
