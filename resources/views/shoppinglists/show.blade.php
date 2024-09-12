<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shoppinglist from') }}
        </h2>
    </x-slot>

    <div class="py-2">
        @foreach ($shoppinglistItems as $shoppinglistItem)
        @if ($shoppinglistItem->shopping_list_id == $shoppinglist->id)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">         
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __($shoppinglistItem->name) }}
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</x-app-layout>

