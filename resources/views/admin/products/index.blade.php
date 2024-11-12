<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <a href="{{ route('admin.products.create') }}" class="bg-blue-500 border border-blue-500 text-black font-bold py-2 px-4 rounded">
                            Add Product
                        </a>
                    <table class="border-collapse border border-slate-400" id="datatable">
                        <thead>
                            <tr>
                                <th class="border border-slate-300">ID</th>
                                <th class="border border-slate-300">Product Name</th>
                                <th class="border border-slate-300">Product Quantity</th>
                                <th class="border border-slate-300">Product Price</th>
                                <th class="border border-slate-300">Product Description</th>
                                <th class="border border-slate-300">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->qty }}</td>
                                    <td>₱ {{ $product->price }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>
                                        <!-- View Icon -->
                                        <!-- <a href="{{ route('admin.products.index', $product->id) }}" title="View">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 hover:text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12m-9.75 9.75c.98.98 2.24 1.5 3.75 1.5s2.77-.52 3.75-1.5M15 12m-9.75-9.75C6.02 2.52 7.28 2 8.75 2s2.77.52 3.75 1.5"/>
                                            </svg>
                                        </a> -->
                                        <a href="{{route('admin.products.getProductbyId', $product->id) }}">
                                            <button class="bg-yellow-500 text-black border border-yellow-500 font-bold py-2 px-4 rounded">
                                                Edit
                                            </button>
                                        </a>
                                        <a href="{{ route('admin.products.deleteProduct', $product->id) }}" 
                                                onclick="event.preventDefault(); 
                                                if(confirm('Are you sure you want to delete this product?')) {
                                                    window.location.href='{{ route('admin.products.deleteProduct', $product->id) }}';
                                                }">
                                                    <button class="bg-yellow-500 text-black border border-yellow-500 font-bold py-2 px-4 rounded">
                                                        Delete
                                                    </button>
                                                </a>



                                        <!-- Edit/Update Icon -->
                                        <!-- <a href=" {{ route('admin.products.index', $product->id) }}" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500 hover:text-yellow-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 2m-7.5 7.5c0 3.75 3.75 7.5 7.5 7.5s7.5-3.75 7.5-7.5c0-3.75-3.75-7.5-7.5-7.5M19 7l-7 7"/>
                                            </svg>
                                        </a> -->

                                        <!-- Delete Icon -->
                                        <!-- <form action="{{ route('admin.products.index', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');"> -->
                                            <!-- @csrf
                                            @method('DELETE')
                                            <button type="submit" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 hover:text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6m-9.24-.26C5.26 5.76 5.24 11.2 6.5 16.26"/>
                                                </svg>
                                            </button> -->
                                        <!-- </form> -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
