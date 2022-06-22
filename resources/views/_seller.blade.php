@if (Auth::user()->toko->name)
    <x-card-section>
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold">
                {{ Auth::user()->toko->name }}
            </h3>
            
            <x-anchor href="{{ route('items.create') }}">
                Tambah Barang
            </x-anchor>
        </div>
    </x-card-section>

    <x-card-section>
        Daftar Barang
    </x-card-section>

    <x-table>
        <x-slot name="thead">
            <x-th>Nama</x-th>
            <x-th>Harga</x-th>
            <x-th>Jumlah</x-th>
            <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">Edit</span>
            </th>
        </x-slot>

        @foreach (Auth::user()->toko->items as $item)
            <tr>
                <x-td class="text-sm font-medium text-gray-700">
                    {{ $item->name }}
                </x-td>

                <x-td class="text-sm text-gray-900">
                    {{ $item->price }}
                </x-td>

                <x-td class="text-sm text-gray-900">
                    {{ $item->stock }}
                </x-td>

                <x-td class="text-sm font-medium">
                    <div class="flex items-center justify-end">
                        <a 
                            href="{{ route('items.edit', $item) }}" 
                            class="text-indigo-600 hover:text-indigo-900">
                            Edit
                        </a>

                        <form action="{{ route('items.destroy', $item) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4">
                                Hapus
                            </button>
                        </form>
                    </div>
                </x-td>
            </tr>
        @endforeach

    </x-table>
@endif