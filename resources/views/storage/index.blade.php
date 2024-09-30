<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Storage') }}
        </h2>
    </x-slot>

    <div class="py-2">
        @foreach ($storages as $storage)
            @if ($storage->user_id == Auth::user()->id)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <x-dropdown-link :href="route('storages.show', $storage->id)">
                            <div class="p-6 text-gray-900">
                                {{ __('Storage: ' . $storage->name . ' (Capacity: ' . $storage->capacity . ')') }}
                            </div>
                        </x-dropdown-link>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</x-app-layout>
