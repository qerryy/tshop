<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $store->name }}
        </h2>
    </x-slot>

    <x-container>
        <x-card-section>

            <div class="border-y border-gray-200">
                <dl class="divide-y">
                    <x-desc-list>
                        <x-slot name="titleDesc">Nama Store</x-slot>
                        {{ $store->name }}
                    </x-desc-list>

                    <x-desc-list>
                        <x-slot name="titleDesc">Nama Owner</x-slot>
                        {{ $store->user->name }}
                    </x-desc-list>

                    <x-desc-list>
                        <x-slot name="titleDesc">Jumlah Jualan</x-slot>
                        {{ $store->items->count() }}
                    </x-desc-list>
                </dl>
            </div>
  
        </x-card-section>
    </x-contain>
</x-app-layout>
