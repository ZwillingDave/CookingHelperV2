<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shoppinglist from ' . $shoppinglist->created_at->format('d.m.Y')) }}
        </h2>
    </x-slot>

    <div class="py-2">
        @foreach ($shoppinglistItems as $shoppinglistItem)
        @if ($shoppinglistItem->shoppinglist->user->is(Auth::user()))
        @if ($shoppinglistItem->shoppinglist->id == $id)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">         
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{ __($shoppinglistItem->name) }}
                </div>
            </div>
        </div>
        @endif
        @endif
        @endforeach
    </div>
</x-app-layout>

