<x-app-layout>
    <x-slot name="header">
        Update Role: <span class="capitalize">{{ $role->role_name }}</span>
    </x-slot>

    <x-container>
        
        <x-form-container>
            <x-slot name="titleForm">
                Role & Permission
            </x-slot>

            <form action="{{ route('roles.update', $role) }}" method="POST">
                @csrf
                @method("PUT")

                <x-form-section>
                    <div class="col-span-6">
                        <x-label for="role_name" value="Nama Role" />
                        <x-input 
                            type="text" 
                            name="role_name" 
                            id="role_name" 
                            autocomplete="role_name" 
                            class="mt-1 block w-full" 
                            value="{{ old('role_name', $role->role_name) }}"
                        />

                        @error('role_name')
                            <p class="text-xs text-red-500 italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <x-label value="Permissions" />
        
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                            @foreach ($permissions as $permission)
                                <label for="permission_{{ $permission->id }}" class="col-span-1">
                                    <input
                                        type="checkbox"
                                        class="checkbox-form"
                                        id="permission_{{ $permission->id }}"
                                        name="permission_{{ $permission->id }}"
                                        value="{{ $permission->id }}"
                                        @foreach ($role->permissions as $role_permission)
                                            {{ $role_permission->id == $permission->id ? 'checked' : '' }}
                                        @endforeach
                                    />
        
                                    <span class="ml-1">
                                        {{ $permission->permission_name }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>


                    <x-slot name="buttonForm">
                        <x-anchor-secondary href="{{ route('roles.index') }}">
                            Batal
                        </x-anchor-secondary>
                        <x-button class="ml-2">
                            Simpan
                        </x-button>
                    </x-slot>
                </x-form-section>

            </form>
        </x-form-container>

    </x-container>
</x-app-layout>
