<x-app-layout>

    <x-slot name="header">
        Detail Products
    </x-slot>

    <section class="text-gray-600 overflow-hidden">
        <div class="px-5 py-12 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="{{ $item->name }}" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ $item->getItemPhoto() }}">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-base text-gray-500 tracking-widest">{{ $item->store->name }}</h2>
                    <h1 class="text-gray-900 text-3xl font-medium mb-1">{{ $item->name }}</h1>
                    <div class="flex items-center mt-4 mb-6">
                        <span>Stok:</span>
                        <span class="ml-2">{{ $item->stock }}</span>
                    </div>
                    <div class="flex">
                        <span class="font-medium text-2xl text-gray-900">Rp. {{ $item->price }}</span>
                        <a href="{{ route('add-to-cart', $item) }}" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>    

