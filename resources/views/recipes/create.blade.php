<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Recipe') }}
        </h2>
    </x-slot>

    <div class="py-2 flex-grow"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('recipes.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="w-100 grid grid-cols-2 gap-4">

                        <div class="flex flex-col items-center col-span-2 sm:col-span-2 md:col-span-1 sm:order-1">
                            <div class="w-4/5 my-2">
                                <label class="block font-medium text-sm text-gray-700">Name</label>
                                <input class="w-full m-auto" name="name" type="text" required>
                            </div>
                            <div class="w-4/5 my-4">
                                <label class="block font-medium text-sm text-gray-700">Description</label>
                                <textarea class="w-full m-auto resize-none" name="description" cols="20" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="flex flex-col items-center col-span-2 sm:col-span-2 md:col-span-1 sm:order-2">
                            <div class="w-4/5 my-2">
                                <label class="block font-medium text-sm text-gray-700">Image</label>
                                <input class="m-auto block 
                                    w-full text-sm text-gray-500
                                    file:me-4 file:py-2 file:px-4
                                    file:rounded-lg file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-600 file:text-white
                                    hover:file:bg-blue-700
                                    file:disabled:opacity-50 file:disabled:pointer-events-none
                                    dark:text-neutral-500
                                    dark:file:bg-blue-500
                                    dark:hover:file:bg-blue-400" 
                                id="" name="image" type="file" accept="image/png, image/jpeg, image/jpg" onchange="changePreview(event)">
                            </div>
                            <div class="w-4/5 imgcontainer">
                                <img src="" name="img" class="max-h-40 mx-auto rounded-md" alt="">
                            </div>
                        </div>

                        <div class="flex flex-col items-center col-span-2 sm:col-span-2 lg:col-span-1 order-4 sm:order-4 lg:order-3">
                            <div class="self-center">
                                <h2 class="font-bold text-2xl">Instructions</h2>
                            </div>
                            <div class="w-4/5 my-4 flex flex-col">
                                <div id="instructions">
                                    <div>
                                        <label class="block font-medium text-sm text-gray-700">Step 1</label><textarea class="w-full mb-2 resize-none" name="instructions[]" cols="50" rows="2" required></textarea>
                                    </div>

                                </div>
                                <div class="flex">
                                    <div class="flex-1">
                                        <div type="button" class="w-fit px-4 mx-auto my-4 rounded-full bg-gray-200 h-8 text-center text-2xl" id="instructionremovebtn">Remove Last</div>
                                    </div>
                                    <div class="flex-1">
                                        <div type="button" class=" w-fit mx-auto my-4 rounded-full bg-gray-200" id="instructionaddbtn"><img class="h-8" src="/images/add.png" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col col-span-2 sm:col-span-2 lg:col-span-1 order-3 sm:order-3 lg:order-4">
                            <div class="self-center">
                                <h3 class="font-bold text-2xl">Ingredients</h3>
                            </div>
                            <div class="flex flex-col w-full mt-4">
                                <div class="self-center w-4/5" id="ingredients"></div>

                                <div class="self-center">
                                    <div class="mx-auto my-4 rounded-full bg-gray-200" id="ingredientaddbtn"><img class="h-8" src="/images/add.png" alt=""></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="flex justify-center">
                        <x-primary-button class="my-4 ">Add Recipe</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    
    let instructions = document.getElementById("instructions");
    let instructionaddbtn = document.getElementById("instructionaddbtn");
    let instructionremovebtn = document.getElementById("instructionremovebtn");
    

    instructionaddbtn.addEventListener("click", function() {
        let instruction = document.createElement("div");
        let label = document.createElement("label");
        let text = document.createElement("textarea");

        label.classList.add("block", "font-medium", "text-sm", "text-gray-700");
        label.innerHTML = "Step " + (instructions.children.length + 1);
        
        text.classList.add("w-full", "mb-2", "resize-none");
        text.setAttribute("name", "instructions[]");
        text.setAttribute("required", "");
        
        instructions.appendChild(instruction);
        instruction.appendChild(label);
        instruction.appendChild(text);
    });

    instructionremovebtn.addEventListener("click", function() {
        if (instructions.children.length > 1) {
            instructions.lastElementChild.remove();
        }
    });

    let ingredients = document.getElementById("ingredients");
    let ingredientaddbtn = document.getElementById("ingredientaddbtn");
    let ingredientId = 1;

    ingredientaddbtn.addEventListener("click", function() {

        let ingredient = document.createElement("div");

        let product = document.createElement("select");
        let quantity = document.createElement("input");
        let unit = document.createElement("select");
        let remove = document.createElement("div");
        

        ingredient.classList.add("flex", "mb-2")
        
        product.classList.add("w-full", "p-2", "me-1");
        product.setAttribute("name", "ingredients[" + ingredientId + "][product_id]");
        
        quantity.classList.add("w-2/6", "p-2", "me-1", "[appearance:textfield]","text-right");
        quantity.setAttribute("placeholder", "1");
        quantity.setAttribute("name", "ingredients[" + ingredientId + "][amount]");
        quantity.setAttribute("required", "");
        
        unit.classList.add("w-2/6", "p-2", "me-1");
        unit.setAttribute("name", "ingredients[" + ingredientId + "][unit_id]");
        
        remove.classList.add("p-2", "rounded-full", "bg-gray-200", "aspect-square");
        remove.innerHTML = "-";
        remove.onclick = function() {
            if(ingredients.children.length > 1) {
                ingredient.remove();
            }
        }

        ingredients.appendChild(ingredient);
        ingredient.appendChild(product);
        ingredient.appendChild(quantity);
        ingredient.appendChild(unit);
        ingredient.appendChild(remove);
        
        product.innerHTML = "@foreach ($products as $product) <option value=\"{{ $product->id }}\">{{ $product->name }}</option> @endforeach";
        unit.innerHTML = "@foreach ($units as $unit) <option value=\"{{ $unit->id }}\">{{ $unit->abbr }}</option> @endforeach";
        
        ingredientId++;
    });

   
    function changePreview(event) {

        let file = event.target.files[0];
        let reader = new FileReader();
        reader.onload = function() {
            let img = document.querySelector(".imgcontainer img");
            img.src = reader.result;
        };
        reader.readAsDataURL(file);
        console.log(file);
    };
</script>
<style>
    /* input[type="file"]{
        display: none;
    } */
    
</style>