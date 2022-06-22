<div class="max-w-2xl lg:max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

        @foreach ($items as $item)
            <div class="group relative border bg-white hover:shadow">
                <div class="w-full min-h-80 bg-red-300 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                    <img 
                        src="{{ $item->getItemPhoto() }}" 
                        alt="{{ $item->name }}" 
                        class="w-full h-full object-center object-cover lg:w-full lg:h-full"
                    >
                </div>

                <div class="p-4 flex justify-between">
                    <div>
                        <h3 class="text-base text-gray-800">
                            <a href="{{ route('detail', $item) }}">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $item->name }}
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Stok: {{ $item->stock }}
                        </p>
                    </div>
                    <p class="text-base font-medium text-gray-900">
                        Rp. {{ $item->price }}
                    </p>
                </div>
            </div>
        @endforeach

    </div>
</div>
