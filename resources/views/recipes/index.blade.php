<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recipes') }}
        </h2>
    </x-slot>

    <div class="py-2 flex-grow">
        <div class="recipegrid">
        @foreach ($recipes as $recipe)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-dropdown-link :href="route('recipes.show', $recipe->id)">
                <div class="p-6 text-gray-900">
                    @if ($recipe->image)
                    {{ __($recipe->name) }}<div class="imgdiv"><img src="/images/recipes/{{ $recipe->image }}" alt=""></div>
                    @else
                    {{ __($recipe->name) }}<div><img src="/images/no-image.png" alt=""></div>
                    @endif
                </div>
                </x-dropdown-link>
            </div>
        </div>
        @endforeach
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-dropdown-link :href="route('recipes.create')">
                <div class="p-6 text-gray-900">
                    
                    {{ __("Add Recipe") }}<div class="imgdiv"><img src="/images/add.png" alt=""></div>
                    
                </div>
                </x-dropdown-link>
            </div>
        </div>
        </div>
    </div>
</x-app-layout>

<style>
    .recipegrid{
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        
    }
    .imgdiv{
        height: 200px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        
    }
    div img{
        min-width: 200px;
        max-width: 200px;
        object-fit: scale-down;
        border-radius: 10px;
        
    }

    @media (max-width: 900px) {
        .recipegrid{
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }
    @media (max-width: 600px) {
        .recipegrid{
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }
    }
</style>