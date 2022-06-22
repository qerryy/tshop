<x-app-layout>
    <x-slot name="header">
        Checkout
    </x-slot>

    <x-container>
        <x-card-section>
            {{ $trolley->item->name }}
            :
            Rp. {{ $trolley->item->price }}
        </x-card-section>

        <x-card-section>
            <form action="{{ route('trolleys.update', $trolley) }}" method="POST">
                @csrf
                @method("PUT")

                <div class="flex items-center">
                    <label for="uangku" class="mr-2 text-xl">Uangku</label>
                    <x-input 
                        type="number" 
                        name="uangku"
                        id="uangku"
                        required 
                    />

                    <x-button class="ml-2">Checkout</x-button>
                </div>

            </form>
        </x-card-section>
    </x-container>
</x-app-layout>