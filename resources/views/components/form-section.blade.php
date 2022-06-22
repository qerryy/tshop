<div class="shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 bg-white sm:p-6">
        <div class="grid grid-cols-6 gap-6">
            {{ $slot }}
        </div>
    </div>
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
        {{ $buttonForm }}
    </div>
</div>