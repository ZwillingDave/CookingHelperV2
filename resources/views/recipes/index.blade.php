<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recipes') }}
        </h2>
    </x-slot>

    <div class="py-2 flex-grow">
        @foreach ($recipes as $recipe)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-dropdown-link :href="route('recipes.show', $recipe->id)">
                <div class="p-6 text-gray-900">
                    {{ __($recipe->name) }}
                </div>
                </x-dropdown-link>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>

