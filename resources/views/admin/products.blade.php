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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold mb-4">Manage Products</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($products as $product)
                        <div class="text-white border rounded-lg p-4 flex flex-col items-center">
                                <img class="w-full h-48 object-cover rounded" src="{{$product->image_url}}" alt="{{$product->name}}">
                                <h5 class="text-lg font-bold">{{$product->title}}</h5>
                                <p>{{ $product->description }}</p>
                                <p class=" font-bold">{{ $product->price }}</p>
                                <a href="{{route('products.show', $product->id)}}">View Product</a>
                                @if(Auth::check() && Auth::user()->is_admin)
                                <a href="{{route('admin.products.edit', $product->id)}}">Edit Product</a>
                            <form action="{{ route('admin.products.destroy', $product->id)}}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete Product</button>
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
