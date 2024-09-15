<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shoppinglists') }}
        </h2>
    </x-slot>

    <div class="py-2">
        @foreach ($shoppinglists as $shoppinglist)
        @if ($shoppinglist->user_id == Auth::user()->id)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">         
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <x-dropdown-link :href="route('shoppinglists.show', $shoppinglist->id)">
                    <div class="p-6 text-gray-900">
                        {{ __('Shoppinglist from ' . $shoppinglist->created_at->format('d.m.Y')) }}
                    </div>
                </x-dropdown-link>
                </div>
            </div>
        @endif
        @endforeach
    </div>
</x-app-layout>

