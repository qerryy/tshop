<x-app-layout>
    <x-slot name="header">
        {{ __('Stores') }}
    </x-slot>

    <x-container>

        <x-table>
            <x-slot name="thead">
                <x-th>Nama Toko</x-th>
                <x-th>Owner</x-th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </x-slot>

            @forelse ($stores as $toko)
                <tr>
                    <x-td>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img 
                                    class="h-10 w-10 rounded-full" 
                                    src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" 
                                    alt=""
                                >
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $toko->name }}
                                </div>
                            </div>
                        </div>
                    </x-td>

                    <x-td class="text-sm text-gray-700">
                        {{ $toko->user->name }}
                    </x-td>

                    <x-td class="text-right text-sm font-medium">
                        <div class="flex items-center justify-end">
                            <a 
                                href="{{ route('stores.show', $toko) }}" 
                                class="text-indigo-600 hover:text-indigo-900">
                                Detail
                            </a>

                            <form action="{{ route('stores.destroy', $toko) }}" method="POST">
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

    </x-contain>
</x-app-layout>
