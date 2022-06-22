<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <x-container>

            @if (Auth::user()->roles->first())
                @if (Auth::user()->roles->first()->role_name === 'seller')
                    @include('_seller')

                @elseif (Auth::user()->roles->first()->role_name === 'superadmin')
                    <x-card-section>
                        Hellow, Chief.
                    </x-card-section>

                @endif

            @else
                @include('_customer')

            @endif

    </x-container>
</x-app-layout>
