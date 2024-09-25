<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Selected Products') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <form action="" method="post">
            @csrf
            @foreach ($products as $product)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2" id="product-row-{{ $product->id }}">
                        <div class=" bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 relative flex items-center gap-6">
                               <span class="flex-1 font-medium text-center">{{ __($product->name) }}</span>
                               <input class="flex-1 number-input" type="number" name="products[{{ $product->id }}][amount]" min="1" required>
                               <select class="flex-1" name="products[{{ $product->id }}][unit]" id="" >
                                   @foreach ($units as $unit)
                                       <option value="{{ $unit->id }}">{{ __($unit->name) }}</option>
                                   @endforeach
                               </select>
                               <x-secondary-button type="button" onclick="removeProductRow({{ $product->id }})">
                                {{ __('Remove') }}
                                </x-secondary-button>
                            </div>
                        </div>
                </div>
            @endforeach
            {{-- Todo need to implement addOrUpdate to list and add to storage --}}
            <div class="flex mt-4">
                <div class="flex-1 text-center">                
                    <x-primary-button name="add" class="flex-1">{{ __("Add") }}</x-primary-button>
                </div>
                {{-- <div class="flex-1 text-center">
                    <x-primary-button name="add_to_storage" class="flex-1">{{ __("Add to StorageList") }}</x-primary-button>
                </div> --}}
            </div>
        </form>
    </div>
</x-app-layout>

<style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
    }
    .number-input {
        width: 50%;
    }
</style>

<script>
    function removeProductRow(productId) {
        var productRow = document.getElementById('product-row-' + productId);
        if (productRow) {
            productRow.remove();
        }
    }
</script>