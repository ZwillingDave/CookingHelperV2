<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recipe: '. $recipe->name) }}
        </h2>
    </x-slot>
    
    <div class="p-2 flex-grow">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2 h-full">
            <div class="bg-white shadow-sm sm:rounded-lg h-full grid grid-cols-2 gap-4">
                <div class="image flex justify-center align-middle mt-4">
                    {{-- <img class="p-4 recipe-image" src="/images/recipe-1.jpg"> --}}
                    @if($recipe->image)
                    <img class="p-4 recipe-image" src="/images/recipes/{{ $recipe->image }}">
                    @else
                    <img class="p-4 recipe-image" src="/images/no-image.png">
                    @endif
                </div>
                <div class="ingredients">
                    <h1 class="text-2xl font-bold text-center mt-4">Ingredients</h1>
                    <hr>
                    <ul class="ingredient-list mt-4">
                        @foreach ($ingredients as $ingredient)
                            <li class="ms-4">{{ $ingredient->product->name }}</li>
                        @endforeach                  
                    </ul>
                </div>
                @if ($recipe->description)
                <div class="description">{{$recipe->description}}</div>
                @endif
                <div class="instruction">
                    <h1 class="text-2xl font-bold text-center mt-4">Instructions</h1>
                    <hr>
                    <ul class="instruction-list mt-4">
                        @foreach ($instructionsteps as $step)
                            <li class="ms-4 mb-4">{{ $step}}</li>
                        @endforeach
                    </ul>

                </div>  
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    hr{
        border: none;
        height: 2px;
        background-color: #333;
        width: 90%;
        margin: auto;
        
    }
    
    .description {
        grid-column: span 2;
    }
    .instruction {
        grid-column: span 2;
    }
    .ingredient-list{
        list-style-type: disc;
        width: 90%;
        margin: 16px auto;
    }
    .instruction-list{
        width: 90%;
        margin: 16px auto;
        list-style-type: numeric;
    }
    .recipe-image {
        width: 80%;
        aspect-ratio: 1/1;
        align-self: center
        object-fit: scale-down;
    }
    
</style>