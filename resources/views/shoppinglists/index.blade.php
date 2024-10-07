<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shoppinglists') }}
        </h2>
    </x-slot>

    <div class="py-2 flex-grow">
        @foreach ($shoppinglists as $shoppinglist)
        @if ($shoppinglist->user_id == Auth::user()->id)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">         
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <x-dropdown-link :href="route('shoppinglists.show', $shoppinglist->id)">
                        <div class="flex">
                            @if (!$shoppinglist['notAllPurchased'])
                            <div class="p-6 text-gray-500 flex-1">
                                {{ __('Shoppinglist from ' . $shoppinglist->created_at->format('d.m.Y')) }}
                            </div>
                            <div class="p-6 flex-1 text-gray-500 text-right">{{ __("Purchased") }}</div>
                            @else
                            <div class="p-6 text-gray-900 flex-1">
                                {{ __('Shoppinglist from ' . $shoppinglist->created_at->format('d.m.Y')) }}
                            </div>
                            @endif
                        </div>
                </x-dropdown-link>
                </div>
            </div>
            
            
        @endif
        @endforeach
    </div>
</x-app-layout>

