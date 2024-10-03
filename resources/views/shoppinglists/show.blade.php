<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shoppinglist from ' . $shoppinglist->created_at->format('d.m.Y')) }}
        </h2>
    </x-slot>
    
    <div class="py-2">
        <form action="{{ route('shoppinglists.add-or-update', ['id' => $shoppinglist->id])}}" method="POST">
            @csrf
            @method('patch')
        @foreach ($shoppinglistItems as $shoppinglistItem)

            @if($shoppinglistItem->is_purchased == 0)
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                    <label class="">
                        <input type="checkbox" name="selected[]" value="{{ $shoppinglistItem->id }}" class="hidden product-checkbox">
                        <div class="product-info cursor-pointer bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 relative flex">
                                <input name="products[{{ $shoppinglistItem->id }}][product_id]" value="{{$shoppinglistItem->product_id}}" type="hidden" readonly>
                                <span class="flex-1">{{ __($shoppinglistItem->product_name) }}</span>
                                @foreach ($units as $unit)
                                    @if ($unit->id == $shoppinglistItem->unit_id)
                                    <input name="products[{{ $shoppinglistItem->id }}][unit]" value="{{$shoppinglistItem->unit_id}}" type="hidden" readonly>
                                    <input name="products[{{ $shoppinglistItem->id }}][amount]" value="{{$shoppinglistItem->quantity}}" type="hidden" readonly>
                                    <span class="flex-1 text-center"><span>{{ __($shoppinglistItem->quantity) }}</span> <span name="products[{{ $shoppinglistItem->id }}][unit]">{{ __($unit->name) }}</span></span>
                                    @endif
                                @endforeach
                                <span class="flex-1 text-right"></span>
                            </div>
                        </div>
                    </label>
                </div>
            @else
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">         
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-500 flex">      
                        <span class="flex-1">{{ __($shoppinglistItem->product_name) }}</span>
                        @foreach ($units as $unit)
                            @if ($unit->id == $shoppinglistItem->unit_id)
                            <span class="flex-1">{{ __($shoppinglistItem->quantity) . ' ' . __($unit->name) }}</span>
                            @endif
                        @endforeach
                        <span class="flex-1 text-right">{{ __('purchased') }}</span>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @if ($notAllPurchased)
            <div class="flex-1 text-center">
                <x-primary-button name="action" value="storage" class="flex-1">{{ __("Add to Storage") }}</x-primary-button>
            </div>
            @endif
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