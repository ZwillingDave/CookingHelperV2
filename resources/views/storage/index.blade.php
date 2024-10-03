<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Storage') }}
        </h2>
    </x-slot>

    <div class="py-2 flex-grow">
        @foreach ($storageItems as $storageItem)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                    <label class="">
                        <input type="checkbox" name="products[]" value="{{ $storageItem->id }}" class="hidden product-checkbox">
                        <div class="product-info cursor-pointer bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 relative">
                                {{ __($storageItem->product_name) }}
                            </div>
                        </div>
                    </label>
                </div>
            @endforeach
    </div>
</x-app-layout>
