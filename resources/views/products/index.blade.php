<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <form action="" method="post">
            @csrf
            @foreach ($products as $product)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                    <label class="">
                        <input type="checkbox" name="products[]" value="{{ $product->id }}" class="hidden product-checkbox">
                        <div class="product-info cursor-pointer bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 relative">
                                {{ __($product->name) }}
                            </div>
                        </div>
                    </label>
                </div>
            @endforeach
            
            <div class="flex mt-4">
                <div class="flex-1 text-center">                
                    <x-primary-button name="add_to_shoppinglist" class="flex-1">{{ __("Add to ShoppingList") }}</x-primary-button>
                </div>
                <div class="flex-1 text-center">
                    <x-primary-button name="add_to_storage" class="flex-1">{{ __("Add to StorageList") }}</x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>

<style>
    .product-info {
        border: 2px solid #ffffff;
        border-radius: 0.5rem;
    }
    .product-checkbox:checked + .product-info {
        border: 2px solid #003bee; /*Tailwind's blue-500*/
        border-radius: 0.5rem; /* Same as Tailwind's rounded-lg */
    }
    .product-info:hover{
        border-color: #a3a3a3;
    }
</style>

