<x-app-layout>
    <x-slot name="header">
        {{ __('Roles') }}
    </x-slot>

    <x-container>

        <x-anchor href="{{ route('roles.create') }}" class="mb-4">
            Tambah Role
        </x-anchor>

        <x-table>
            <x-slot name="thead">
                <x-th>Nama Role</x-th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </x-slot>

            @forelse ($roles as $role)
                <tr>
                    <x-td class="text-gray-800 capitalize">
                        {{ $role->role_name }}
                    </x-td>
                    <x-td class="text-sm font-medium">
                        <div class="flex items-center justify-end">
                            <a 
                                href="{{ route('roles.edit', $role) }}" 
                                class="text-indigo-600 hover:text-indigo-900">
                                Edit
                            </a>

                            <form action="{{ route('roles.destroy', $role) }}" method="POST">
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
  
    </x-container>
</x-app-layout>
