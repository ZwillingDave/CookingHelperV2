<script>let quantitys = [];</script>
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
                    <img class="recipe-image" src="/images/recipes/{{ $recipe->image }}">
                    @else
                    <img class="recipe-image" src="/images/no-image.png">
                    @endif
                </div>
                
                <form class="ingredients flex flex-col" action="{{route('recipes.store', ['id' => $recipe->id])}}" method="post">
                    @csrf
                    @method("patch")
                    <h1 class="upper text-2xl font-bold text-center mt-4">Ingredients<hr></h1>
                    <ul class="ingredient-list m-4">
                        @foreach ($ingredients as $ingredient)
                            <li class="ms-4"><span class="ingredient-quantity">{{ $ingredient->quantity }}</span> <span>{{ $ingredient->unit->abbr }}</span> <span>{{ $ingredient->product->name }}</span></li>
                            <input type="hidden" name="ingredients[{{$ingredient->id}}][product_id]" value="{{ $ingredient->product_id }}">
                            <input type="hidden" name="ingredients[{{$ingredient->id}}][quantity]" value="{{ $ingredient->quantity }}">
                            <input type="hidden" name="ingredients[{{$ingredient->id}}][unit_id]" value="{{ $ingredient->unit_id }}">
                            <script>quantitys.push({{ $ingredient->quantity }});console.log(quantitys);</script>
                        @endforeach                  
                    </ul>
                    <div class="submitbox flex justify-center mt-4">
                        <x-primary-button class="button justify-center ms-2 me-2">{{ __("Add to ShoppingList") }}</x-primary-button>
                        <div class="flex portions ms-2 me-2 flex-col justify-center">
                            <span class="text-sm">Portions</span>
                            <select name="portions" id="portions">
                                @for ($amount = 1; $amount <= 10; $amount++)
                                    <option value="{{$amount}}">{{$amount}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </form>
                    
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

<script>

    let portions = document.getElementById("portions");
    const ingredientQuantitys = document.querySelectorAll(".ingredient-quantity");

    portions.addEventListener("change", function() {
        let portionValue = portions.options[portions.selectedIndex].value;
        ingredientQuantitys.forEach((element, index) => {
            element.textContent = quantitys[index] * portionValue;
        });

    });


</script>

<style>
    hr{
        border: none;
        height: 2px;
        background-color: #333;
        width: 90%;
        margin: auto;
        
    }
    .submitbox{
        width: 90%;
        margin: auto;
        flex: 2;
    }
    .button{
        flex: 3;
    }
    .portions{
        flex: 2;

    }
    .portions select{
        border-radius: 5px;
    }
    .upper{
        flex:2;
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
        flex: 12;
    }
    .instruction-list{
        width: 90%;
        margin: 16px auto;
        list-style-type: numeric;
    }
    .recipe-image {
        width: 80%;
        align-self: center;
        object-fit: scale-down;
        border-radius: 10px;
    }
    @media only screen and (max-width: 768px) {
        .ingredients{
            grid-column: span 2;
        }
        .image{
            grid-column: span 2;
        }
    }
    
</style>