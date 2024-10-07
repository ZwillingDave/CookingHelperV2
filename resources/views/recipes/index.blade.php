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
                    @if ($recipe->image)
                    <img src="/images/recipes/{{ $recipe->image }}" alt="">{{ __($recipe->name) }}
                    @else
                    <img src="/images/no-image.png" alt="">{{ __($recipe->name) }}
                    @endif
                </div>
                </x-dropdown-link>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>

