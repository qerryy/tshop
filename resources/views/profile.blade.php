<x-app-layout>
    <x-slot name="header">
        Profile
    </x-slot>

    <x-container>

        <x-form-container>
            <x-slot name="titleForm">
                Profile Information
            </x-slot>

            <form action="{{ route('profile.update-information') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

                <x-form-section>
                    <div class="col-span-6">
                        <img 
                            src="{{ $user->photoProfile() }}" 
                            loading="lazy" 
                            alt="{{ $user->name }}"
                            class="rounded-full h-20 w-20 object-cover"
                        >

                        <x-input type="file" name="photo_profile" class="text-sm" />

                        @error('photo_profile')
                            <p class="text-sm text-red-500 italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <x-label for="name" value="Nama"/>
                        <x-input 
                            type="text" 
                            name="name" 
                            id="name" 
                            autocomplete="name" 
                            class="mt-1 block w-full"
                            value="{{ old('name', $user->name) }}"
                        />

                        @error('name')
                            <p class="text-sm text-red-500 italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <x-label for="email" value="E-mail Address"/>
                        <x-input 
                            type="text" 
                            name="email" 
                            id="email" 
                            autocomplete="email" 
                            class="mt-1 block w-full"
                            value="{{ old('email', $user->email) }}"
                        />

                        @error('email')
                            <p class="text-sm text-red-500 italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-slot name="buttonForm">
                        <x-button>
                            Simpan
                        </x-button>
                    </x-slot>
                </x-form-section>

            </form>
        </x-form-container>

        <div class="border-t my-8"></div>

        {{-- UPDATE PASSWORD --}}
        <x-form-container>
            <x-slot name="titleForm">
                Update Password
            </x-slot>

            <form action="{{ route('profile.update-password') }}" method="POST">
                @csrf
                @method("PUT")

                <x-form-section>
                    <div class="col-span-6">
                        <x-label for="current_password" value="{{ __('Current Password') }}" />
                        <x-input 
                            id="current_password" 
                            name="current_password" 
                            type="password" 
                            class="mt-1 block w-full" 
                            autocomplete="current-password" 
                        />
                        
                        @error('current_password')
                            <p class="text-sm text-red-500 italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <x-label for="password" value="{{ __('New Password') }}" />
                        <x-input 
                            id="password" 
                            name="password" 
                            type="password" 
                            class="mt-1 block w-full" 
                            autocomplete="new-password" 
                        />

                        @error('password')
                            <p class="text-sm text-red-500 italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-input 
                            id="password_confirmation" 
                            name="password_confirmation" 
                            type="password" 
                            class="mt-1 block w-full" 
                            autocomplete="new-password" 
                        />

                        @error('password_confirmation')
                            <p class="text-sm text-red-500 italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-slot name="buttonForm">
                        <x-button>
                            Simpan
                        </x-button>
                    </x-slot>
                </x-form-section>

            </form>
        </x-form-container>

    </x-container>

</x-app-layout>