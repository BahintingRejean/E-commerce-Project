@if(auth()->check())
    <x-app-layout>
        @include('products.products', ['products' => $products])
    </x-app-layout>
@else
    <x-guest-layout1>
        @include('products.products', ['products' => $products])
    </x-guest-layout1>
@endif
