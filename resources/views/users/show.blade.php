<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User: {{ $user->name }}
        </h2>
    </x-slot>

    <x-container>
        <x-card-section>

            <div class="border-y border-gray-200">
                <dl class="divide-y">
                    <x-desc-list>
                        <x-slot name="titleDesc">Full name</x-slot>
                        {{ $user->name }}
                    </x-desc-list>

                    <x-desc-list>
                        <x-slot name="titleDesc">Email Address</x-slot>
                        {{ $user->email }}
                    </x-desc-list>

                    <x-desc-list>
                        <x-slot name="titleDesc">Role</x-slot>
                        {{ $user->roles->first() ? $user->roles->first()->role_name : 'Customer' }}
                    </x-desc-list>

                    @if ($user->toko)
                        <x-desc-list>
                            <x-slot name="titleDesc">Nama Store</x-slot>
                            {{ $user->toko->name }}
                        </x-desc-list>
                    @endif
                </dl>
            </div>
  
        </x-card-section>
    </x-contain>
</x-app-layout>
