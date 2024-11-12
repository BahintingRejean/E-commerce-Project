<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.products.updateProduct') }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <div>
                            <label for="name">Product</label>
                            <input type="text" name="name" id="name" value="{{ $product->name }}" class="block mt-1 w-full">
                        </div>
                        <div>
                            <label for="qty">Quantity</label>
                            <input type="number" name="qty" id="qty" value="{{ $product->qty }}" class="block mt-1 w-full">
                        </div>
                        <div>
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" value="{{ $product->price }}" class="block mt-1 w-full">
                        </div>
                        <div>
                            <label for="price">Description</label>
                            <input type="text" name="description" id="description" value="{{ $product->description }}" class="block mt-1 w-full">
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 border border-blue-500 hover:bg-blue-700 text-black py-2 px-4 rounded">
                                Save Changes
                            </button>
                        </div>

                    </form>
                    <div class="mt-4">
                        <a href="{{ route('admin.products.index') }}">
                        <button type="submit" class="bg-blue-500 border width-full border-blue-500 hover:bg-blue-700 text-black py-2 px-4 rounded">
                                Cancel
                            </button>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
