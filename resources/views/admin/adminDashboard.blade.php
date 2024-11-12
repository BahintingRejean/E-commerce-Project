<x-app-layout>
    <x-slot name="header">
    <h1 class="font-semibold text-lg mb-4">Welcome to Admin Dashboard</h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <!-- Sidebar -->
                    <div class="w-1/4 bg-gray-200 p-4">
                        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                        <a href="{{ route('admin.products.create') }}" class="text-blue-500 hover:text-blue-700">Add </a>
                        <a href="{{ route('admin.products.index') }}" class="text-blue-500 hover:text-blue-700">View </a>
                        </h1>
                        
                    </div>

                    <!-- Main Content Area -->
                    <div class="flex-1 p-6 text-gray-900">
                        <!-- Blank space left for content -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
