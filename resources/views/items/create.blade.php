<x-app-layout>
    <x-slot name="header">
        {{ __('Tambah barang') }}
    </x-slot>

    <x-container>
        <x-form-container>

            <x-slot name="titleForm">
                Item Information
            </x-slot>

            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <x-form-section>
                    <div class="col-span-6">
                        <x-label for="foto_barang" value="Foto Barang" />
                        <x-input 
                            type="file" 
                            name="foto_barang" 
                            id="foto_barang" 
                            class="mt-1 block w-full"
                        />

                        @error('foto_barang')
                            <p class="text-sm text-red-500 italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <x-label for="nama_barang" value="Nama Barang"/>
                        <x-input 
                            type="text" 
                            name="nama_barang" 
                            id="nama_barang" 
                            autocomplete="nama_barang" 
                            class="mt-1 block w-full"
                            value="{{ old('nama_barang') }}"
                        />

                        @error('nama_barang')
                            <p class="text-sm text-red-500 italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="col-span-full lg:col-span-3">
                        <x-label for="harga" value="Harga" />
                        <x-input 
                            type="number" 
                            name="harga" 
                            id="harga" 
                            autocomplete="harga" 
                            class="mt-1 w-full"
                            value="{{ old('harga') }}"
                        />

                        @error('harga')
                            <p class="text-sm text-red-500 italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="col-span-full lg:col-span-3">
                        <x-label for="jumlah" value="Jumlah" />
                        <x-input 
                            type="number" 
                            name="jumlah" 
                            id="jumlah" 
                            autocomplete="jumlah" 
                            class="mt-1 w-full"
                            value="{{ old('jumlah') }}"
                        />

                        @error('jumlah')
                            <p class="text-sm text-red-500 italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-slot name="buttonForm">
                        <x-anchor-secondary href="{{ route('dashboard') }}">
                            Batal
                        </x-anchor-secondary>
                        <x-button class="ml-2">
                            Simpan
                        </x-button>
                    </x-slot>
                </x-form-section>

            </form>

        </x-form-contain>
    </x-container>
</x-app-layout>
