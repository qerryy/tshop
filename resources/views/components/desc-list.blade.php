@props(['bgColor' => 'bg-white'])

<div class="{{ $bgColor }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
    <dt class="text-sm font-medium text-gray-500">
        {{ $titleDesc }}
    </dt>
    <dd class="mt-1 text-sm text-gray-700 font-semibold sm:mt-0 sm:col-span-2">
        {{ $slot }}
    </dd>
</div>