<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Storage') }}
        </h2>
    </x-slot>

    <div class="py-2 flex-grow">
        <form action="{{route('storage.review')}}" method="post">
            @csrf
            @foreach ($storageItems as $storageItem)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                    <label class="">
                        <input type="checkbox" name="products[]" value="{{ $storageItem->id }}" class="hidden product-checkbox">
                        <div class="product-info cursor-pointer bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 relative">
                                @if ($storageItem->product->image)
                                <img src="/images/products/{{ $storageItem->product->image }}" alt="">{{ __($storageItem->product_name) }}
                                @else
                                <img src="/images/no-image.png" alt="">{{ __($storageItem->product_name) }}
                                @endif
                            </div>
                        </div>
                    </label>
                </div>
            @endforeach
            <div class="flex mt-4">
                <div class="flex-1 text-center">                
                    <x-primary-button name="action" value="shopping" class="flex-1">{{ __("Edit Selected Products") }}</x-primary-button>
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