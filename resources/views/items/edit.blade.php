<x-app-layout>
    <x-slot name="header">
        Update Barang: {{ $item->name }}
    </x-slot>

    <x-container>
        <x-form-container>

            <x-slot name="titleForm">
                Item Information
            </x-slot>

            <form action="{{ route('items.update', $item) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")

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
                        <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                        <x-input 
                            type="text" 
                            name="nama_barang" 
                            id="nama_barang" 
                            autocomplete="nama_barang" 
                            class="mt-1 block w-full"
                            value="{{ old('nama_barang', $item->name) }}"
                        />

                        @error('nama_barang')
                            <p class="text-sm text-red-500 italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="col-span-full lg:col-span-3">
                        <x-label for="harga">Harga</x-label>
                        <x-input 
                            type="number" 
                            name="harga" 
                            id="harga" 
                            autocomplete="harga" 
                            class="mt-1 w-full"
                            value="{{ old('harga', $item->price) }}"
                        />

                        @error('harga')
                            <p class="text-sm text-red-500 italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
    
                    <div class="col-span-full lg:col-span-3">
                        <x-label for="jumlah">Jumlah</x-label>
                        <x-input 
                            type="number" 
                            name="jumlah" 
                            id="jumlah" 
                            autocomplete="jumlah" 
                            class="mt-1 w-full"
                            value="{{ old('jumlah', $item->stock) }}"
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
                            Update
                        </x-button>
                    </x-slot>
                </x-form-section>

            </form>

        </x-form-contain>
    </x-container>
</x-app-layout>
