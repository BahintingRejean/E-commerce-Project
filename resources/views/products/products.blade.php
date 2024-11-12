<!-- resources/views/products.blade.php -->

<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden my-4">
                {{-- <img class="w-full h-64 object-cover object-center" src="{{ $product->image_url }}" alt="{{ $product->name }}"> --}}
                <img class="w-full h-64 object-cover object-center" src="{{ asset('image/product_placeholder.jpg') }}" alt="{{ $product->name }}">

                <div class="p-4">
                    <h2 class="text-gray-900 text-lg font-semibold">{{ $product->name }}</h2>
                    <p class="text-gray-600 mt-2">{{ $product->description }}</p>

                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-gray-900 font-bold text-xl">${{ number_format($product->price, 2) }}</span>

                        <form method="POST" action="{{ route('cart.add', $product->id) }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
