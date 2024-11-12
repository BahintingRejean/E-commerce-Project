<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Add Product Form -->
                    <form method="post" action="{{ route('admin.products.create') }}">
                        @csrf
                        <!-- Product Name -->
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">Product Name</label>
                            <input type="text" name="name" id="name" class="block mt-1 w-full" required>
                        </div>

                        <!-- QTY -->
                        <div class="mb-4">
                            <label for="qty" class="block font-medium text-sm text-gray-700">Quantity</label>
                            <input type="number" name="qty" id="qty" class="block mt-1 w-full" required>
                        </div>

                        <!-- Product Price -->
                        <div class="mb-4">
                            <label for="price" class="block font-medium text-sm text-gray-700">Product Price</label>
                            <input type="number" name="price" id="price" class="block mt-1 w-full" required>
                        </div>

                        <!-- Product Description -->
                        <div class="mb-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                            <textarea name="description" id="description" class="block mt-1 w-full" required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-4">
                            <button type="submit" class="custom-blue-btn text-black py-2 px-4 rounded ">
                                Add Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <style>
            .custom-blue-btn {
            background-color: blue; /* Set background color */
            color: white; /* Set text color */
            padding: 8px 16px;
            border-radius: 8px;
        }

        .custom-blue-btn:hover {
            background-color: darkblue; /* Change background on hover */
        }
        </style>
    </div>
</x-app-layout>
