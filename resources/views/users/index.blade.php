<x-app-layout>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>

    <x-container>
 
        <x-table>
            <x-slot name="thead">
                <x-th>Nam</x-th>
                <x-th>Role</x-th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </x-slot>

            @forelse ($users as $user)
                <tr>
                    <x-td>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img 
                                    class="h-10 w-10 rounded-full" 
                                    src="{{ $user->photoProfile() }}" 
                                    alt="{{ $user->name }}"
                                >
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $user->name }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $user->email }}
                                </div>
                            </div>
                        </div>
                    </x-td>

                    <x-td class="text-sm text-gray-700 capitalize">
                        {{ $user->roles->first() ? $user->roles->first()->role_name : 'Customer' }}
                    </x-td>

                    <x-td class="text-sm font-medium">
                        <div class="flex items-center justify-end">
                            <a 
                                href="{{ route('users.show', $user) }}" 
                                class="text-blue-600 hover:text-blue-900">
                                Detail
                            </a>
                            <a 
                                href="{{ route('users.edit', $user) }}" 
                                class="text-indigo-600 hover:text-indigo-900 ml-4">
                                Edit
                            </a>
    
                            <form action="{{ route('users.destroy', $user) }}" method="POST">
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
