<x-card-section>
    <div class="flex items-center justify-start">
        Keranjang
    </div>
</x-card-section>

<x-table>
    <x-slot name="thead">
        <x-th>Nama</x-th>
        <x-th>Harga</x-th>
        <x-th>Status</x-th>
        <th scope="col" class="relative px-6 py-3">
            <span class="sr-only">Edit</span>
        </th>
    </x-slot>

    @forelse (Auth::user()->trolleys as $trolley)
        <tr>
            <x-td>
                <div class="text-sm font-medium text-gray-900">
                    {{ $trolley->item->name }}
                </div>
            </x-td>
            <x-td>
                <div class="text-sm text-gray-900">
                    {{ $trolley->item->price }}
                </div>
            </x-td>
            <x-td>
                <span class="text-sm text-gray-800">
                    {{ $trolley->status }}
                </span>
            </x-td>
            <x-td class="text-sm font-medium">
                <div class="flex items-center justify-end">
                    <a href="{{ route('trolleys.edit', $trolley) }}" class="text-indigo-600 hover:text-indigo-900">Checkout</a>
    
                    <form action="{{ route('trolleys.destroy', $trolley) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        
                        <button type="submit" class="text-red-600 hover:text-red-900 ml-4">
                            Hapus
                        </button>
                    </form>
                </div>
            </x-td>
        </tr>
    
    @empty
        <tr>
            <x-td class="text-sm text-gray-500">Tidak ada data.</x-td>
        </tr>
        
    @endforelse


</x-table>