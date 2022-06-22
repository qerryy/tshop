@extends('layouts.main-layout')

@section('content')

    <div class="min-h-screen bg-gray-100 text-gray-800">
        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl text-gray-700 leading-tight">
                        {{ $header }}
                    </h2>
                </div>
            </header>
        @endisset

        <main>
            {{ $slot }}
        </main>
    </div>
    
@endsection
